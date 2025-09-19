@extends('layouts.index')

@section('title','Kategori Surat')

@section('judul-halaman', 'Kategori Surat')

@section('deskripsi-halaman')
<p>
    Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat. 
    <br> 
    Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru
</p>
@endsection

@section('content-halaman')
<div class="pencarian">
    <div class="text-search">
        <p>Cari Surat:</p>
    </div>
    <div class="search-field">
        <form action="{{ route('kategori.search') }}" method="GET" class="flex gap-2">
            <input type="text" name="q" value="{{ request('q') }}"
                placeholder="Cari kategori..." class="border px-2 py-1 rounded">
            <div class="btn-search">
                <button type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="content-table">
    <table>
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        
        </thead>

        <tbody>
            @foreach($category as $category)
            <tr>
                <td>{{$category->id_category}}</td>
                <td>{{$category->nama_kategori}}</td>
                <td>{{$category->judul_kategori}}</td>
                <td>
                    <div class="btn">

                        <div class="btn-hapus">
<!-- Tombol Hapus (untuk Post) -->
                        <button type="button" onclick="openDeleteModal('{{route('kategori.destroy', [$category->id_category])}}')">
                            Hapus
                        </button>

                        </div>
                        <div class="btn-lihat">
                            <a href="{{ route('kategori.edit', [$category->id_category]) }}">Edit</a>
                        </div>

                    </div>
   
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

<div class="tambah-item">
    <div class="">
        <a href="{{ route('kategori.tambah') }}" class="btn-tambah">Tambah Kategori</a>
    </div>
</div>

@endsection