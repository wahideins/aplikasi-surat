@extends('layouts.index')

@section('title','Arsip Surat')

@section('judul-halaman')
<p><a href="{{route('surat.home')}}">Arsip Surat</a> >> Lihat </p>
@endsection

@section('deskripsi-halaman')
<p>Nomor: {{$surat->no_surat}}</p>
<p>Kategori: {{$surat->category->nama_kategori}}</p>
<p>Judul: {{$surat->judul_surat}}</p>
<p>Waktu Unggah: {{$surat->updated_at}}</p>
@endsection

@section('content-halaman')

<div class="pdf-viewer">
    <embed src="{{ asset('uploads/surat/' . $surat->file_path) }}" 
       type="application/pdf" width="100%" height="400" />
</div>

<div class="tambah-item">
    <button type="button" class="btn-search" onclick="window.location='{{ route('surat.home') }}'">
        << Kembali
    </button>
    <div class="btn-unduh">
        <a href="{{ route('surat.download', $surat->id_document) }}">Unduh</a>
    </div>
    <div class="btn-lihat">
        <a href="{{ route('surat.edit', [$surat->id_document]) }}">Edit</a>
    </div>

</div>
@endsection