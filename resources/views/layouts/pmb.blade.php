<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PMB STBA Pontianak')</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">


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

        .announcement-bar {
            background-color: var(--primary-maroon);
            color: #ffffff;
            font-size: 1rem;
        }

        .announcement-bar marquee {
            padding: 0.80rem 0;
        }

        footer {
            border-top: 1px solid #e9ecef;
            background-color: #ffffff;
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

        .hover-shadow-sm:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.08);
        }

        .hero-section {
            background: linear-gradient(135deg, #ffffff 0%, #fef2f4 30%, #f7e4e9 100%);
            padding: 4rem 0 4.5rem;
        }

        @media (min-width: 992px) {
            .hero-section {
                padding: 5rem 0 5.5rem;
            }
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

        .hero-highlight-box {
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 1.25rem 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            border: 1px solid #f1f3f5;
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="d-flex flex-column min-vh-100">

        {{-- Marquee pengumuman (TIDAK sticky) --}}
        @php
            $marqueeText =
                \App\Models\Setting::where('key', 'marquee_text')->value('value') ??
                'PENGUMUMAN 📢: Pendaftaran Penerimaan Mahasiswa Baru (PMB) STBA Pontianak Tahun Akademik 2025/2026 telah dibuka. Gelombang 1: 1 Februari – 30 April 2025.';
        @endphp
        <div class="announcement-bar">
            <div class="container-fluid">
                <marquee behavior="scroll" direction="left">
                    {{ $marqueeText }}
                </marquee>
            </div>
        </div>

        {{-- Navbar utama (STICKY) --}}
        <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
            <div class="container">
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
                            <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}"
                                href="{{ route('beranda') }}">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle
                               {{ request()->routeIs('prodi.d3') || request()->routeIs('prodi.s1') ? 'active' : '' }}"
                                href="#" id="prodiDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Program Studi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="prodiDropdown">
                                <li><a class="dropdown-item" href="{{ route('prodi.d3') }}">Diploma (D3) Bahasa
                                        Inggris</a></li>
                                <li><a class="dropdown-item" href="{{ route('prodi.s1') }}">Sarjana (S1) Sastra
                                        Inggris</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('berita.index') ? 'active' : '' }}"
                                href="{{ route('berita.index') }}">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('agenda.index') ? 'active' : '' }}"
                                href="{{ route('agenda.index') }}">Agenda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}"
                                href="{{ route('kontak') }}">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}"
                                href="{{ route('staf.index') }}">Staf</a>
                        </li>
                        <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                            <a class="btn btn-maroon btn-sm" href="{{ route('pmb.daftar') }}">Daftar Sekarang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{-- Konten halaman --}}
        <main class="flex-fill">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="py-4" style="background-color:#f1d0d0; color:#800000;">
            <div class="container">
                <div class="row align-items-start">

                    {{-- Logo + deskripsi kampus --}}
                    <div class="col-md-5 mb-3 mb-md-0">
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{ asset('images/logo-stba.png') }}" alt="Logo STBA Pontianak"
                                style="height:48px;" class="me-2">
                            <div class="fw-bold">
                                STBA Pontianak
                            </div>
                        </div>
                        <p class="mb-0 small">
                            Sekolah Tinggi Bahasa Asing Pontianak berkomitmen menyediakan pendidikan
                            bahasa asing yang berkualitas untuk menghasilkan lulusan yang siap bersaing
                            di dunia kerja global.
                        </p>
                    </div>

                    {{-- Alamat & Kontak --}}
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h6 class="fw-bold mb-2">Alamat & Kontak</h6>
                        <p class="small mb-1">
                            Jl. (isi alamat lengkap STBA Pontianak di sini) Pontianak, Kalimantan Barat.
                        </p>
                        <p class="small mb-1">
                            <i class="bi bi-telephone-fill me-1"></i> 0561-xxxxxx
                        </p>
                        <p class="small mb-0">
                            <i class="bi bi-envelope-fill me-1"></i>
                            kampus@stbapontianak.ac.id
                        </p>
                    </div>

                    {{-- Link terkait --}}
                    <div class="col-md-3">
                        <h6 class="fw-bold mb-2">Link Terkait</h6>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-1">
                                <a href="{{ route('berita.index') }}" style="background-color:#eec3c3; color:#800000;">
                                    Berita Terkini
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('agenda.index') ?? '#' }}"
                                    style="background-color:#eec3c3; color:#800000;">
                                    Agenda Penting (Profil Kampus)
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('berita.index') ?? '#' }}"
                                    style="background-color:#eec3c3; color:#800000;">
                                    Berita Index (Visi dan Misi)
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pmb.daftar') ?? '#' }}"
                                    style="background-color:#eec3c3; color:#800000;">
                                    PMB Daftar
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>

    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
