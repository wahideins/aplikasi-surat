@extends('layouts.index')

@section('title','About')

@section('judul-halaman', 'About')

@section('deskripsi-halaman')
<div class="about-page">
    <div class="foto-profil">
        <img src="{{asset('images/pfp.png')}}" alt="">
    </div>
    <div class="deskripsi-profil">
        <p>Aplikasi ini dibuat oleh:</p>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        Nama
                    </th>
                    <td>
                        : Wahyu Hidayat
                    </td>
                </tr>

                <tr>
                    <th>
                        Prodi
                    </th>
                    <td>
                        : D3-MI PSDKU Kediri
                    </td>
                </tr>

                <tr>
                    <th>
                        NIM
                    </th>
                    <td>
                        : 2331730066
                    </td>
                </tr>

                <tr>
                    <th>
                        Tanggal
                    </th>
                    <td>
                        : 13 September 2025
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>
    </div>




</div>
@endsection

@section('content-halaman')

@endsection