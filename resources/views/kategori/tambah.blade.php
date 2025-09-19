@extends('layouts.index')

@section('title','Kategori ')

@section('judul-halaman')
<a href="{{route('kategori.home')}}">Kategori Surat</a> >> Tambah
@endsection

@section('deskripsi-halaman')
<p>
    Tambahkan atau edit data kategori. 
    <br> 
    Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"
</p>
@endsection

@section('content-halaman')

<form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
    @csrf

    <div class="flex items-center space-x-4">
        <label for="id_category" class="w-32 text-gray-700 font-bold">ID Kategori </label>
        <input type="text" id="id_category" name="id_category" 
               value="{{ old('id_category', $category->id_category ?? '') }}" 
               class="flex-1 shadow appearance-none border rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" 
               disabled placeholder="{{$preview_id ?? ''}}">
    </div>

    <!-- Nama Category -->
    <div class="flex items-center space-x-4">
        <label for="nama_kategori" class="w-32 text-gray-700 font-bold">Nama Kategori</label>
        <input type="text" id="nama_kategori" name="nama_kategori" 
               value="{{ old('nama_kategori', $category->nama_kategori ?? '') }}" 
               class="flex-1 shadow appearance-none border rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" 
               required >
    </div>

    <!-- Judul Category -->
    <div class="flex items-center space-x-4">
        <label for="judul_kategori" class="w-32 text-gray-700 font-bold">Judul Kategori</label>
        <input type="text" id="judul_kategori" name="judul_kategori" 
               value="{{ old('judul_kategori', $category->judul_kategori ?? '') }}" 
               class="flex-1 shadow appearance-none border rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" 
               required>
    </div>

    <div class="tambah-item">
        <button type="button" class="btn-search" onclick="window.location='{{ route('kategori.home') }}'"><< Kembali</button>
        <button type="submit" class="btn-tambah">Simpan Kategori</button>
    </div>

</form>




@endsection