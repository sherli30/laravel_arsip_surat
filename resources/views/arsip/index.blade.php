@extends('layouts.master')

@section('title', 'Arsip Surat')

@section('content')

<style>
    .search-input {
        background: url("https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/search.svg") no-repeat 10px center;
        background-size: 16px;
        padding-left: 35px;
    }
</style>

<div class="container py-4">

    {{-- Header --}}
    <div class="mb-4 border-bottom pb-2">
        <h1 class="h3 fw-bold text-primary">Arsip Surat</h1>
        <p class="text-muted mb-1">
            Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.
            <br>Klik <span class="fw-bold">"Lihat"</span> pada kolom aksi untuk menampilkan surat.
        </p>
    </div>

    {{-- Pencarian --}}
    <div class="cari mb-3">
        <form method="GET" class="d-flex align-items-center gap-2">
            <label for="search" class="fw-bold mb-0">Cari Surat:</label>
            <input 
                type="text" 
                id="search" 
                name="search" 
                value="{{ request('search') }}" 
                class="form-control search-input rounded-pill w-50" 
                placeholder="Masukkan judul atau nomor surat...">
            <button type="submit" class="btn btn-primary px-4">Cari</button>
        </form>
    </div>

    {{-- Tabel Arsip --}}
    <div class="tabel mt-3">
        <table class="table table-bordered align-middle shadow-sm">
            <thead class="table-secondary text-center">
                <tr>
                    <th style="width: 15%">Nomor Surat</th>
                    <th style="width: 15%">Kategori</th>
                    <th style="width: 35%">Judul</th>
                    <th style="width: 15%">Waktu Pengarsipan</th>
                    <th style="width: 20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td class="text-center">{{ $item->nomor_surat }}</td>
                    <td>{{ $item->relasi_kategori->nama ?? '-' }}</td>
                    <td>{{ $item->judul }}</td>
                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            {{-- Lihat --}}
                            <a href="{{ route('arsip.show', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye"></i> Lihat
                            </a>
                            {{-- Unduh --}}
                            <a href="{{ asset('storage/arsip/' . $item->pdf) }}" 
                               class="btn btn-sm btn-warning" 
                               download>
                                <i class="bi bi-download"></i> Unduh
                            </a>
                            {{-- Hapus --}}
                            <form action="{{ route('arsip.destroy', $item->id) }}" method="POST" class="d-inline form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Tidak ada arsip ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="d-flex justify-content-end mt-3">
            {{ $data->links() }}
        </div>
    </div>

    {{-- Tombol Arsip Baru --}}
    <div class="mt-4">
        <a href="{{ route('arsip.create') }}" class="btn btn-success px-4">
            <i class="bi bi-plus-circle"></i> Arsipkan Surat
        </a>
    </div>

</div>
@endsection

@push('scripts')
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const deleteForms = document.querySelectorAll('.form-delete');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data arsip ini tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
