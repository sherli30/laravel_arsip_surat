@extends('layouts.master')

@section('title', 'Kategori Surat')
@section('content')

<style>
    .search-input {
        background: url("https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/search.svg") no-repeat 10px center;
        background-size: 16px;
        padding-left: 35px;
    }
</style>

<div class="atas mb-4">
    <h1 class="h3 fw-bold">Kategori Surat</h1>
    <p class="text-muted">
        Berikut adalah daftar kategori yang dapat digunakan untuk melabeli surat.<br>
        Klik <strong>"Tambah Kategori Baru"</strong> untuk menambahkan kategori.
    </p>
</div>

<div class="konten mt-4">
    <!-- Form Pencarian -->
    <div class="cari d-flex">
        <form method="GET" class="d-flex align-items-center mb-3 gap-2 w-100">
            <label for="search" class="fw-bold mb-0">Cari Kategori:</label>
            <input 
                type="text" 
                id="search" 
                name="search" 
                value="{{ request('search') }}" 
                class="form-control search-input rounded-pill w-50" 
                placeholder="Ketik nama kategori...">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i> Cari
            </button>
        </form>
    </div>

    <!-- Tabel Data -->
    <div class="tabel mt-2">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-0">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-secondary text-center">
                        <tr>
                            <th style="width: 10%">ID</th>
                            <th style="width: 20%">Nama</th>
                            <th style="width: 55%">Keterangan</th>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('kategori_surat.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('kategori_surat.destroy', $item->id) }}" method="POST" class="form-delete">
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
                            <td colspan="4" class="text-center text-muted">Belum ada kategori surat.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $data->links() }}
        </div>
    </div>

    <!-- Tombol Tambah -->
    <div class="mt-3">
        <a href="{{ route('kategori_surat.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah Kategori Baru
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
                    text: "Data kategori ini tidak bisa dikembalikan!",
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
