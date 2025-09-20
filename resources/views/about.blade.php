@extends('layouts.master')

@section('title', 'About')
@section('content')

<div>
    <h1 class="mb-4">About</h1>
    <div class="row align-items-center">
        <div class="col-md-3 col-lg-2 text-center mb-3 mb-md-0">
            <img src="{{ asset('storage/sherli.jpg') }}" 
                 alt="Sherli Shintia Sari" 
                 class="img-fluid shadow-sm rounded">
        </div>
        <div class="col-md-9 col-lg-10">
            <p class="fw-bold">Aplikasi ini dibuat oleh:</p>
            <table class="table table-borderless">
                <tr>
                    <td style="width: 80px;">Nama</td>
                    <td>: Sherli Shintia Sari</td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>: D3-MI PSDKU KEDIRI</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>: 2331730005</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
