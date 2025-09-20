<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Arsip Surat') | Arsip Surat</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        body {
            overflow-x: hidden;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            border-right: 1px solid #ccc;
            background: #f8f9fa;
            font-size: 1rem;
            font-weight: 600;
        }

        .sidebar .menu-header {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .sidebar a {
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            transition: all 0.2s ease-in-out;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #0d6efd;
            color: #fff;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -250px;
                width: 220px;
                height: 100%;
                z-index: 1050;
                background: #f8f9fa;
                transition: left 0.3s ease-in-out;
            }

            .sidebar.active {
                left: 0;
            }

            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.4);
                z-index: 1040;
            }

            .sidebar-overlay.active {
                display: block;
            }
        }

        main {
            min-height: 100vh;
            background: #fff;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 sidebar p-0">
                <div class="p-3 border-bottom menu-header">
                    Menu
                </div>
                <a href="{{ route('arsip.index') }}" class="{{ request()->routeIs('arsip.*') ? 'active' : '' }}">
                    <i class="bi bi-archive-fill"></i>
                    <span>Arsip</span>
                </a>
                <a href="{{ route('kategori_surat.index') }}" class="{{ request()->routeIs('kategori_surat.*') ? 'active' : '' }}">
                    <i class="bi bi-tags-fill"></i>
                    <span>Kategori Surat</span>
                </a>
                <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">
                    <i class="bi bi-info-circle-fill"></i>
                    <span>About</span>
                </a>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 p-4">
                <!-- Tombol menu (mobile) -->
                <button class="btn btn-outline-primary d-md-none mb-3" id="toggleSidebar">
                    <i class="bi bi-list"></i> Menu
                </button>

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Overlay (untuk mobile) -->
    <div class="sidebar-overlay"></div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar (mobile)
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            const toggleBtn = document.getElementById('toggleSidebar');

            if (toggleBtn) {
                toggleBtn.addEventListener('click', () => {
                    sidebar.classList.toggle('active');
                    overlay.classList.toggle('active');
                });
            }

            overlay.addEventListener('click', () => {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            });

            // SweetAlert untuk flash message
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });
            @endif

            @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
            });
            @endif
        });
    </script>

    {{-- Tambahan script dari child view --}}
    @stack('scripts')
</body>

</html>