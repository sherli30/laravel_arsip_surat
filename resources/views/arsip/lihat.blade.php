@extends('layouts.master')

@section('title', 'Lihat Arsip Surat')

@section('content')

<div class="container py-4">

    {{-- Header --}}
    <div class="mb-4 border-bottom pb-2">
        <h1 class="h3 fw-bold text-primary">Arsip Surat >> Lihat</h1>
    </div>

    {{-- Detail Arsip --}}
    <div class="card shadow-sm border-0 rounded-3 mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3 text-secondary">Detail Arsip</h5>
            <table class="table table-borderless mb-0">
                <tr>
                    <th style="width: 180px;">Nomor Surat</th>
                    <td>{{ $data->nomor_surat }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $data->relasi_kategori->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Judul</th>
                    <td>{{ $data->judul }}</td>
                </tr>
                <tr>
                    <th>Waktu Unggah</th>
                    <td>{{ $data->created_at->format('d M Y, H:i') }}</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- PDF Viewer --}}
    <div class="card shadow-sm border-0 rounded-3 mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3 text-secondary">Preview Dokumen</h5>
            <iframe 
                src="{{ asset('storage/arsip/' . $data->pdf) }}" 
                width="100%" 
                height="600px" 
                style="border:1px solid #ddd; border-radius:8px;">
            </iframe>
        </div>
    </div>

    {{-- Tombol Aksi --}}
    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('arsip.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <a href="{{ asset('storage/arsip/' . $data->pdf) }}" 
           class="btn btn-warning" 
           download>
            <i class="bi bi-download"></i> Unduh
        </a>
        <a href="{{ route('arsip.edit', $data->id) }}" class="btn btn-primary">
            <i class="bi bi-pencil-square"></i> Edit / Ganti File
        </a>
    </div>

</div>

@endsection
