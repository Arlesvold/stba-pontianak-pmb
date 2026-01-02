<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PMB STBA Pontianak')</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


    <style>
        :root {
            --primary-maroon: #7b1e30;
            --primary-maroon-dark: #5a1423;
            --light-bg: #ffffff;
            --light-gray: #f8f9fa;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background-color: var(--light-bg);
            color: #212529;
        }

        /* Navbar */
        .navbar-custom {
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .navbar-brand img {
            height: 40px;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #343a40;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus,
        .navbar-nav .nav-link.active {
            color: var(--primary-maroon);
        }

        .dropdown-menu {
            border-radius: 0.5rem;
            border: 1px solid #e9ecef;
        }

        /* Marquee pengumuman */
        .announcement-bar {
            background-color: var(--primary-maroon);
            color: #ffffff;
            font-size: 1rem;
            /* semula 0.875rem */
        }

        .announcement-bar marquee {
            padding: 0.80rem 0;
            /* semula 0.25rem 0 */
        }

        /* Hero section */
        .hero-section {
            background: linear-gradient(135deg, #ffffff 0%, #fef2f4 30%, #f7e4e9 100%);
            padding: 4rem 0 4.5rem;
        }

        @media (min-width: 992px) {
            .hero-section {
                padding: 5rem 0 5.5rem;
            }
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.35rem 0.9rem;
            border-radius: 999px;
            background-color: rgba(123, 30, 48, 0.06);
            color: var(--primary-maroon);
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .hero-title {
            font-weight: 700;
            font-size: clamp(2rem, 3vw + 1rem, 2.8rem);
            color: #212529;
        }

        .hero-title span {
            color: var(--primary-maroon);
        }

        .hero-subtitle {
            font-size: 1rem;
            color: #6c757d;
            max-width: 560px;
        }

        .hero-cta .btn {
            border-radius: 999px;
            padding: 0.7rem 1.7rem;
            font-weight: 600;
        }

        .btn-maroon {
            background-color: var(--primary-maroon);
            border-color: var(--primary-maroon);
            color: #ffffff;
        }

        .btn-maroon:hover {
            background-color: var(--primary-maroon-dark);
            border-color: var(--primary-maroon-dark);
            color: #ffffff;
        }

        .btn-outline-maroon {
            border-color: var(--primary-maroon);
            color: var(--primary-maroon);
        }

        .btn-outline-maroon:hover {
            background-color: var(--primary-maroon);
            color: #ffffff;
        }

        .hero-highlight-box {
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 1.25rem 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            border: 1px solid #f1f3f5;
        }

        .hero-highlight-box h6 {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }

        .hero-highlight-box .stat {
            font-weight: 700;
            color: var(--primary-maroon);
        }

        footer {
            border-top: 1px solid #e9ecef;
            background-color: #ffffff;
        }

        .hover-shadow-sm:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.08);
        }

        .card-maroon-soft {
            background: linear-gradient(135deg,
                    rgba(123, 30, 48, 0.06),
                    rgba(123, 30, 48, 0.12));
            /* maroon lembut, mirip background body */
            color: #212529;
        }

        .card-maroon-soft .form-label,
        .card-maroon-soft h3 {
            color: #4a181f;
        }

        .card-maroon-soft .form-control,
        .card-maroon-soft textarea {
            background-color: rgba(255, 255, 255, 0.85);
            border-color: rgba(123, 30, 48, 0.25);
            color: #212529;
        }

        .card-maroon-soft .form-control:focus,
        .card-maroon-soft textarea:focus {
            border-color: var(--primary-maroon);
            box-shadow: 0 0 0 0.15rem rgba(123, 30, 48, 0.15);
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- Navbar + Marquee --}}
    <header>
        {{-- Marquee pengumuman --}}
        <div class="announcement-bar">
            <div class="container-fluid">
                <marquee behavior="scroll" direction="left">
                    PENGUMUMAN 📢: Pendaftaran Penerimaan Mahasiswa Baru (PMB) STBA Pontianak Tahun Akademik 2025/2026
                    telah dibuka.
                    Gelombang 1: 1 Februari – 30 April 2025.
                    Cek ketentuan lengkap dan jadwal seleksi pada menu Informasi PMB.
                </marquee>
            </div>
        </div>

        {{-- Navbar utama --}}
        <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
            <div class="container">
                {{-- Logo kiri --}}
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo-stba.png') }}" alt="Logo STBA Pontianak">
                    <span class="ms-2 fw-semibold text-muted d-none d-sm-inline">STBA Pontianak</span>
                </a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('beranda') }}">Beranda</a>
                        </li>

                        {{-- Dropdown Program Studi --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="prodiDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Program Studi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="prodiDropdown">
                                <li><a class="dropdown-item" href="{{ route('prodi.d3') }}">Diploma (D3)</a></li>
                                <li><a class="dropdown-item" href="{{ route('prodi.s1') }}">Sarjana S1</a></li>
                                <li><a class="dropdown-item" href="{{ route('prodi.sastra') }}">Sarjana Sastra
                                        Inggris</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('berita.index') }}">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('agenda.index') }}">Agenda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
                        </li>

                        <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                            <a class="btn btn-maroon btn-sm" href="{{ route('pmb.daftar') }}">Daftar Sekarang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    {{-- Konten halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="py-4 mt-5">
        <div class="container text-center small text-muted">
            &copy; {{ date('Y') }} STBA Pontianak • Penerimaan Mahasiswa Baru
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
