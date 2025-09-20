@extends('layouts.master')

@section('title', 'Tambah Arsip Surat')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="mb-4 border-bottom pb-2">
        <h1 class="h3 fw-bold text-primary">Arsip Surat &raquo; Tambah</h1>
        <p class="text-muted mb-1">
            Unggah surat yang telah terbit pada form ini untuk diarsipkan.
        </p>
        <ul class="small text-secondary mb-0">
            <li>Gunakan file berformat <span class="fw-bold text-danger">PDF</span></li>
        </ul>
    </div>

    {{-- Form --}}
    <div class="card shadow-sm rounded-3">
        <div class="card-body">
            <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nomor Surat --}}
                <div class="mb-3 row">
                    <label for="nomor" class="col-sm-2 col-form-label fw-semibold">Nomor Surat</label>
                    <div class="col-sm-10">
                        <input 
                            type="text" 
                            class="form-control @error('nomor') is-invalid @enderror" 
                            name="nomor" 
                            id="nomor" 
                            value="{{ old('nomor') }}" 
                            placeholder="Contoh: 001/POLINEMA/IX/2025"
                            required
                        >
                        @error('nomor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Kategori --}}
                <div class="mb-3 row">
                    <label for="kategori" class="col-sm-2 col-form-label fw-semibold">Kategori</label>
                    <div class="col-sm-10">
                        <select 
                            name="kategori" 
                            id="kategori" 
                            class="form-select @error('kategori') is-invalid @enderror"
                            required
                        >
                            <option value="" disabled selected>-- Pilih Kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" {{ old('kategori') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Judul --}}
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label fw-semibold">Judul</label>
                    <div class="col-sm-10">
                        <input 
                            type="text" 
                            class="form-control @error('judul') is-invalid @enderror" 
                            name="judul" 
                            id="judul" 
                            value="{{ old('judul') }}" 
                            placeholder="Judul singkat surat"
                            required
                        >
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- File Surat --}}
                <div class="mb-3 row">
                    <label for="file" class="col-sm-2 col-form-label fw-semibold">File Surat (PDF)</label>
                    <div class="col-sm-10">
                        <input 
                            type="file" 
                            class="form-control @error('file') is-invalid @enderror" 
                            name="file" 
                            id="file" 
                            accept="application/pdf"
                            required
                        >
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Maksimal ukuran 2 MB</small>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('arsip.index') }}" class="btn btn-outline-secondary">
                        &laquo; Kembali
                    </a>
                    <button type="submit" class="btn btn-success px-4">
                        Simpan Arsip
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
