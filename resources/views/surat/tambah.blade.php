@extends('layouts.index')

@section('title','Unggah Surat')

@section('judul-halaman')
<a href="{{ route('surat.home')}} ">Arsip Surat >> Unggah</a>
@endsection

@section('deskripsi-halaman')
<p>
    Berikut ini adalah surat surat yang telah terbit dan diarsipkan. 
    <br> 
    Klik "Lihat" pada kolom aksi untuk menampilkan surat
</p>
@endsection

@section('content-halaman')

<form action="{{ route('surat.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
    @csrf

    <!-- No. Surat -->
    <div class="flex items-center space-x-4">
        <label for="no_surat" class="w-32 text-gray-700 font-bold">No. Surat</label>
        <input type="text" id="no_surat" name="no_surat" 
               value="{{ old('no_surat', $surat->no_surat ?? '') }}" 
               class="flex-1 shadow appearance-none border rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" 
               required >
    </div>

    <!-- Kategori Surat -->
    <div class="flex items-center space-x-4">
        <label for="kategori" class="w-32 text-gray-700 font-bold">Kategori</label>
        <select id="kategori" name="cat_id"  
               class="flex-1 shadow appearance-none border rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" 
               required>
            <option value="">Silahkan Pilih Kategori</option>
            @foreach($cat as $kategori)
                <option value="{{ $kategori->id_category }}">{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select>
    </div>

    <!-- Judul Surat -->
    <div class="flex items-center space-x-4">
        <label for="judul_surat" class="w-32 text-gray-700 font-bold">Judul Surat</label>
        <input type="text" id="judul_surat" name="judul_surat" 
               value="{{ old('judul_surat', $surat->judul_surat ?? '') }}" 
               class="flex-1 shadow appearance-none border rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" 
               required >
    </div>

    <!-- Upload File PDF -->
    <div class="flex items-center space-x-4">
        <label for="file_pdf" class="w-32 text-gray-700 font-bold">File PDF</label>
        
        <!-- Label custom -->
        <label id="file_label" for="file_pdf" 
               class="flex-1 shadow appearance-none border rounded py-2 px-3 text-gray-500 cursor-pointer focus:outline-none focus:shadow-outline">
            Klik disini untuk mencari file
        </label>
        
        <input type="file" id="file_pdf" name="file_pdf" 
               class="hidden" accept="application/pdf" required>
    </div>

    <div class="tambah-item">
        <button type="button" class="btn-search" onclick="window.location='{{ route('surat.home') }}'"><< Kembali</button>
        <button type="submit" class="btn-tambah">Simpan Surat</button>
    </div>
</form>

<!-- Script untuk update nama file -->
<script>
    document.getElementById('file_pdf').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || "Klik disini untuk mencari file";
        document.getElementById('file_label').textContent = fileName;
    });
</script>


@endsection