<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PMB STBA Pontianak')</title>

    {{-- Bootstrap 5 CSS --}}
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
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

        .navbar-custom {
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .navbar-brand img {
            height: 54px;
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

        /* Efek hover untuk link di footer */
        .footer-link {
            color: #800000;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .footer-link:hover {
            color: #b30000;
            letter-spacing: 0.5px;
        }

        /* Memastikan ikon alamat sejajar dengan teks multi-baris */
        .contact-item i {
            margin-top: 2px;
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

        body {
            font-family: "Open Sans", sans-serif;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes pulseText {

            0%,
            100% {
                opacity: 0.6;
            }

            50% {
                opacity: 1;
            }
        }
    </style>

    @stack('styles')
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">


<body>
    <div class="d-flex flex-column min-vh-100">

        {{-- Marquee pengumuman (TIDAK sticky) --}}
        @php
            $marqueeText = cache()->remember('marquee_text', 3600, function () {
                return \App\Models\Setting::where('key', 'marquee_text')->value('value');
            }) ?? 'PENGUMUMAN 📢: Pendaftaran PMB STBA Pontianak telah dibuka.';
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
                    <picture>
                        <source srcset="{{ asset('images/logo-stba.webp') }}" type="image/webp">
                        <img src="{{ asset('images/logo-stba.png') }}"
                             alt="Logo STBA Pontianak"
                             height="54"
                             decoding="async">
                    </picture>

                    <span class="ms-2 fw-semibold text-muted d-none d-sm-inline">
                        STBA Pontianak
                    </span>
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
                            <a class="nav-link {{ request()->routeIs('events.index') ? 'active' : '' }}"
                                href="{{ route('events.index') }}">Event</a>
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
                            <a class="nav-link {{ request()->routeIs('staf.index') ? 'active' : '' }}"
                                href="{{ route('staf.index') }}">Staf</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dokumen.index') ? 'active' : '' }}"
                                href="{{ route('dokumen.index') }}">Dokumen</a>
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
        <footer class="pt-5 pb-3" style="background-color:#f1d0d0; color:#800000;">
            <div class="container">
                <div class="row justify-content-center text-center text-md-start gap-lg-3">

                    {{-- Kolom 1: Logo + Deskripsi Kampus --}}
                    <div class="col-md-4 col-lg-4 mb-4">
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-3">
                            <img src="{{ asset('images/logo-stba.webp') }}" alt="Logo STBA Pontianak" style="height:50px; margin-left: -25px" class="me-3">
                            <h5 class="fw-bold mb-0">STBA Pontianak</h5>
                        </div>
                        <p class="mb-0 small pe-lg-3">
                            Sekolah Tinggi Bahasa Asing Pontianak berkomitmen menyediakan pendidikan
                            bahasa asing yang berkualitas untuk menghasilkan lulusan yang siap bersaing
                            di dunia kerja global.
                        </p>
                    </div>

                    {{-- Kolom 2: Alamat & Kontak --}}
                    <div class="col-md-4 col-lg-4 mb-4">
                        <h5 class="fw-bold mb-3">Alamat & Kontak</h5>

                        <div class="d-flex align-items-start justify-content-center justify-content-md-start mb-2 contact-item">
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            <span class="small">
                                Jl. Purnama I No.1, Akcaya, Kec. Pontianak Selatan,<br>Kota Pontianak, Kalimantan Barat
                            </span>
                        </div>

                        <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-2">
                            <i class="bi bi-telephone-fill me-2"></i>
                            <span class="small">0561-xxxxxx</span>
                        </div>

                        <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-0">
                            <i class="bi bi-envelope-fill me-2"></i>
                            <span class="small">kampus@stbapontianak.ac.id</span>
                        </div>
                    </div>

                    {{-- Kolom 3: Link Terkait --}}
                    <div class="col-md-3 col-lg-2 mb-4">
                        <h5 class="fw-bold mb-3">Link Terkait</h5>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-2">
                                <a href="{{ route('berita.index') }}" class="footer-link fw-semibold">Berita</a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('agenda.index') ?? '#' }}" class="footer-link fw-semibold">Agenda</a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('events.index') ?? '#' }}" class="footer-link fw-semibold">Event</a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('pmb.daftar') ?? '#' }}" class="footer-link fw-semibold">Pendaftaran PMB</a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Garis Pemisah & Copyright --}}
                <div class="row mt-2">
                    <div class="col-12">
                        <hr style="border-color: #800000; opacity: 0.2;">
                        <p class="text-center small mb-0" style="opacity: 0.8;">
                            &copy; {{ date('Y') }} STBA Pontianak. All Rights Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    {{-- Bootstrap JS --}}
    <script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
