@extends('layouts.index')

@section('title','Arsip Surat')

@section('judul-halaman', 'Arsip Surat')

@section('deskripsi-halaman')
<p>
    Berikut ini adalah surat surat yang telah terbit dan diarsipkan. 
    <br> 
    Klik "Lihat" pada kolom aksi untuk menampilkan surat
</p>
@endsection

@section('content-halaman')
<div class="pencarian">
    <div class="text-search">
        <p>Cari Surat:</p>
    </div>
    <div class="search-field">
        <form action="{{ route('surat.search') }}" method="GET" class="flex gap-2">
            <input type="text" name="q" value="{{ request('q') }}"
                placeholder="Cari nomor, judul, atau nama file..." class="border px-2 py-1 rounded">
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
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th>Aksi</th>
            </tr>
        
        </thead>

        <tbody>
            @foreach($surat as $surat)
            <tr>
                <td>{{ $surat->no_surat }}</td>
                <td>{{ $surat->category->nama_kategori }}</td>
                <td>{{ $surat->judul_surat}}</td>
                <td>{{ $surat->updated_at }}</td>
                <td>
                    <div class="btn">

                        <div class="btn-hapus">
                        <button type="button" onclick="openDeleteModal('{{route('surat.destroy', ['id' => $surat->id_document])}}')">
                            Hapus
                        </button>
                        </div>

                        <div class="btn-unduh">
                            <a href="{{ route('surat.download', $surat->id_document) }}">Unduh</a>

                        </div>

                        <div class="btn-lihat">
                            <button>
                                <a href="{{ route('surat.detail', ['id' => $surat->id_document]) }}">Lihat</a>
                            </button>
                        </div>

                    </div>
   
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

<div class="tambah-item">
    <a href="{{ route('surat.tambah') }}" class="btn-tambah">
        Arsipkan Surat
    </a>
</div>

@endsection