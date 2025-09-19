<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('kategori.home', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $preview_id = DB::table('information_schema.tables')
            ->select('AUTO_INCREMENT')
            ->where('TABLE_SCHEMA', DB::getDatabaseName())
            ->where('TABLE_NAME', 'category')
            ->first()?->AUTO_INCREMENT ?? 1;

        return view('kategori.tambah', compact('preview_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $data = $request->validate([
            'nama_kategori'   => 'required|string',
            'judul_kategori'   => 'required|string',
        ]);

        // 3. Buat record baru
        Category::create([
            'nama_kategori'      => $data['nama_kategori'],
            'judul_kategori'        => $data['judul_kategori'],
            'created_at' => now(),
            'updated_at' => now(), // opsional, bisa juga biarkan Laravel otomatis
        ]);

        // 4. Redirect dengan notifikasi sukses
        return redirect()->route('kategori.home')
                        ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('kategori.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // 1. Validasi input
        $data = $request->validate([
            'nama_kategori'  => 'required|string',
            'judul_kategori' => 'required|string',
        ]);

        // 2. Cari kategori yang akan diupdate
        $category = Category::findOrFail($id);

        // 3. Update record
        $category->update([
            'nama_kategori'  => $data['nama_kategori'],
            'judul_kategori' => $data['judul_kategori'],
            'updated_at'     => now(),
        ]);

        // 4. Redirect dengan notifikasi sukses
        return redirect()->route('kategori.home')
                        ->with('success', 'Kategori berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Category::findOrFail($id);
        $kategori->delete();
        
        return redirect()->route('kategori.home')
                         ->with('success', 'Kategori Berhasil Dihapus!');
    }

    public function search(Request $request)
    {
        $query = $request->input('q'); // ambil keyword dari input "q"

        $category = Category::query()
            ->when($query, function ($qBuilder) use ($query) {
                $qBuilder->where('nama_kategori', 'like', "%{$query}%");
            })
            ->paginate(10); // bisa pakai ->get() kalau tidak ingin pagination

        return view('kategori.home', compact('category', 'query'));
    }
}
