<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    /**
     * Tampilkan daftar surat.
     */
    public function index()
    {
        $surat = Document::all();
        return view('surat.home', compact('surat'));
    }

    /**
     * Form tambah surat baru.
     */
    public function create()
    {
        $preview_id = DB::table('information_schema.tables')
            ->select('AUTO_INCREMENT')
            ->where('TABLE_SCHEMA', DB::getDatabaseName())
            ->where('TABLE_NAME', 'document')
            ->first()?->AUTO_INCREMENT ?? 1;
        $cat = Category::all();
        return view('surat.tambah', compact('cat','preview_id'));
    }

    /**
     * Simpan surat baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_surat'    => 'required|string|max:255',
            'cat_id'    => 'required', // asumsinya foreign key ke tabel category
            'judul_surat' => 'required|string|max:255',
            'file_pdf'    => 'required|mimes:pdf|max:5120', // 5 MB
        ]);

        // Siapkan data
        $data = [
            'no_surat'    => $request->no_surat,
            'cat_id' => $request->cat_id, // foreign key
            'judul_surat' => $request->judul_surat,
            'created_at'  => now(),
            'updated_at'  => now(),
        ];

        // Upload file PDF
        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads/surat'), $filename);
            $data['file_path'] = $filename;
        }

        // Simpan ke database
        Document::create($data);

        return redirect()->route('surat.home')->with('success', 'Surat berhasil disimpan.');
    }


    /**
     * Tampilkan detail surat tertentu.
     */
    public function show($id)
    {
        $surat = Document::with('category')->findOrFail($id);
        return view('surat.detail', compact('surat'));
    }

    /**
     * Form edit surat.
     */
    public function edit($id)
    {
        $surat = Document::findOrFail($id);
        $cat = Category::all();
        return view('surat.edit', compact('surat','cat'));
    }

    /**
     * Update surat.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'no_surat'    => 'required|string|max:255',
                'cat_id'      => 'required|integer',
                'judul_surat' => 'required|string|max:255',
                'file_pdf'    => 'nullable|mimes:pdf|max:5120', // file opsional
            ]);

            // Siapkan data update
            $data = [
                'no_surat'    => $validated['no_surat'],
                'cat_id'      => $validated['cat_id'],
                'judul_surat' => $validated['judul_surat'],
                'updated_at'  => now(),
            ];

            $document = Document::findOrFail($id);

            // Jika ada file baru, upload dan hapus file lama
            if ($request->hasFile('file_pdf')) {
                $file = $request->file('file_pdf');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('uploads/surat'), $filename);

                // hapus file lama jika ada
                if ($document->file_path && file_exists(public_path('uploads/surat/' . $document->file_path))) {
                    unlink(public_path('uploads/surat/' . $document->file_path));
                }

                $data['file_path'] = $filename;
            }

            // Update ke DB
            $document->update($data);

            return redirect()->route('surat.home')
                            ->with('success', 'Data berhasil diperbarui.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('surat.home')
                            ->with('error', 'Dokumen tidak ditemukan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                            ->withErrors($e->errors())
                            ->withInput();
        } catch (\Exception $e) {
            \Log::error('Update Document Error: '.$e->getMessage());

            return redirect()->route('surat.home')
                            ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }



    /**
     * Hapus surat.
     */
    public function destroy($id)
    {
        $surat = Document::findOrFail($id);
        $currentFile = $surat->file_path;

        $filePath = public_path('uploads/surat/' . $currentFile);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $surat->delete();

        return redirect()->route('surat.home')
                        ->with('success', 'Surat berhasil dihapus.');
    }

    public function download($id)
    {
        $surat = Document::findOrFail($id);

        $filePath = public_path('uploads/surat/' . $surat->file_path);

        if (file_exists($filePath)) {
            // paksa browser download + tampilkan dialog Save As
            return response()->download($filePath, $surat->file_path, [
                'Content-Type' => 'application/octet-stream',
                'Content-Disposition' => 'attachment; filename="'.$surat->file_path.'"'
            ]);
        }

        abort(404, 'File tidak ditemukan.');
    }

    public function search(Request $request)
    {
        $query = $request->input('q'); 

        $surat = Document::query()
            ->when($query, function ($qBuilder) use ($query) {
                $qBuilder->where('judul_surat', 'like', "%{$query}%")
                         ->orWhere('file_path', 'like', "%{$query}%")
                         ->orWhere('no_surat','like',"%{$query}%");
            })
            ->paginate(10);

        return view('surat.home', compact('surat', 'query'));
    }
    
}
