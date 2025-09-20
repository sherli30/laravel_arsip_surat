@extends('layouts.master')

@section('title', 'Edit Kategori Surat')
@section('content')

<div class="atas mb-4">
    <h1 class="h3 fw-bold">Kategori Surat >> Edit</h1>
    <p class="text-muted">
        Ubah data kategori sesuai kebutuhan. Jika sudah selesai, tekan tombol 
        <strong>"Update"</strong> untuk menyimpan perubahan.
    </p>
</div>

<div class="konten mt-4">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">
            <form action="{{ route('kategori_surat.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-3 col-form-label fw-semibold">Nama Kategori</label>
                    <div class="col-sm-9">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="nama" 
                            id="nama" 
                            placeholder="Contoh: Surat Keputusan" 
                            value="{{ old('nama', $data->nama) }}" 
                            required>
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="keterangan" class="col-sm-3 col-form-label fw-semibold">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea 
                            name="keterangan" 
                            id="keterangan" 
                            class="form-control" 
                            rows="3" 
                            placeholder="Tuliskan deskripsi singkat kategori..." 
                            required>{{ old('keterangan', $data->keterangan) }}</textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('kategori_surat.index') }}" class="btn btn-outline-secondary me-2">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-arrow-repeat"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
