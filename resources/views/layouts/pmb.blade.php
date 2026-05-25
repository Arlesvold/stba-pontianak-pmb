<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PMB STBA Pontianak')</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 CSS --}}
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <style>
        /* ─── CSS Variables ──────────────────────────────────────────── */
        :root {
            --primary-maroon: #7b1e30;
            --primary-maroon-dark: #5a1423;
            --primary-maroon-subtle: rgba(123, 30, 48, 0.07);
            --light-bg: #ffffff;
            --light-gray: #f8f9fa;
            --border-light: #ebebeb;
        }

        /* ─── Base ───────────────────────────────────────────────────── */
        body {
            font-family: "Open Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background-color: var(--light-bg);
            color: #212529;
        }

        h1, h2, h3, h4, h5, .serif {
            font-family: 'Playfair Display', Georgia, serif;
        }

        /* ─── Navbar ─────────────────────────────────────────────────── */
        .navbar-custom {
            background-color: #ffffff;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.06);
            transition: box-shadow 0.25s ease;
        }

        .navbar-custom.scrolled {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.09);
        }

        .navbar-brand-text {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1rem;
            color: #212529;
            line-height: 1.15;
        }

        .navbar-brand-text small {
            font-family: "Open Sans", sans-serif;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--primary-maroon);
            display: block;
        }

        .navbar-nav .nav-link {
            font-family: "Open Sans", sans-serif;
            font-weight: 500;
            font-size: 0.875rem;
            color: #343a40;
            position: relative;
            padding-bottom: 0.4rem;
            transition: color 0.15s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            color: var(--primary-maroon);
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-maroon);
            font-weight: 600;
        }

        @media (min-width: 992px) {
            .navbar-nav .nav-link.active::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0.5rem;
                right: 0.5rem;
                height: 2px;
                background-color: var(--primary-maroon);
                border-radius: 2px;
            }
        }

        .navbar-custom .dropdown-menu {
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 0.625rem;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
            padding: 0.5rem;
            min-width: 220px;
        }

        .navbar-custom .dropdown-item {
            border-radius: 0.4rem;
            padding: 0.5rem 0.85rem;
            font-size: 0.875rem;
            color: #343a40;
            display: flex;
            align-items: center;
            gap: 0.55rem;
            transition: background-color 0.12s ease, color 0.12s ease;
        }

        .navbar-custom .dropdown-item:hover,
        .navbar-custom .dropdown-item:focus {
            background-color: var(--primary-maroon-subtle);
            color: var(--primary-maroon);
        }

        .navbar-custom .dropdown-item i {
            width: 1rem;
            opacity: 0.6;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .navbar-custom .dropdown-divider {
            border-color: #f0f0f0;
            margin: 0.3rem 0;
        }

        .nav-cta-divider {
            border-left: 1px solid #e9ecef;
            height: 1.5rem;
            align-self: center;
            margin: 0 0.25rem;
        }

        /* ─── Announcement Bar ───────────────────────────────────────── */
        .announcement-bar {
            background-color: var(--primary-maroon);
            color: #ffffff;
            font-size: 0.82rem;
            font-family: "Open Sans", sans-serif;
            font-weight: 500;
            letter-spacing: 0.01em;
            overflow: hidden;
        }

        .marquee-wrapper {
            overflow: hidden;
            padding: 0.6rem 0;
        }

        .marquee-track {
            display: inline-flex;
            white-space: nowrap;
            will-change: transform;
        }

        .marquee-track:hover {
            animation-play-state: paused;
        }

        .marquee-item {
            display: inline-block;
            padding-right: 18rem;
        }

        /* ─── Buttons ────────────────────────────────────────────────── */
        .btn-maroon {
            background-color: var(--primary-maroon);
            border-color: var(--primary-maroon);
            color: #ffffff;
            font-family: "Open Sans", sans-serif;
            font-weight: 600;
            font-size: 0.82rem;
            letter-spacing: 0.01em;
            transition: background-color 0.18s ease, border-color 0.18s ease, box-shadow 0.18s ease;
        }

        .btn-maroon:hover {
            background-color: var(--primary-maroon-dark);
            border-color: var(--primary-maroon-dark);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(123, 30, 48, 0.3);
        }

        .btn-outline-maroon {
            border-color: var(--primary-maroon);
            color: var(--primary-maroon);
            font-family: "Open Sans", sans-serif;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .btn-outline-maroon:hover {
            background-color: var(--primary-maroon);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(123, 30, 48, 0.25);
        }

        /* ─── Page Hero (inner pages) ────────────────────────────────── */
        .page-hero {
            background: linear-gradient(135deg, var(--primary-maroon) 0%, var(--primary-maroon-dark) 100%);
            padding: 2.75rem 0 3.25rem;
            position: relative;
            overflow: hidden;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 340px;
            height: 340px;
            border-radius: 50%;
            border: 80px solid rgba(255, 255, 255, 0.05);
            pointer-events: none;
        }

        .page-hero::after {
            content: '';
            position: absolute;
            bottom: -55px;
            left: -30px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 36px solid rgba(255, 255, 255, 0.04);
            pointer-events: none;
        }

        .page-hero .breadcrumb {
            margin-bottom: 0.75rem;
        }

        .page-hero .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.72);
            text-decoration: none;
            font-size: 0.8rem;
            transition: color 0.15s ease;
        }

        .page-hero .breadcrumb-item a:hover {
            color: #ffffff;
        }

        .page-hero .breadcrumb-item.active {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.8rem;
        }

        .page-hero .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.32);
        }

        .page-hero h1 {
            color: #ffffff;
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.6rem, 3.5vw, 2.25rem);
            font-weight: 700;
            margin-bottom: 0.4rem;
            line-height: 1.2;
        }

        .page-hero .hero-subtitle {
            color: rgba(255, 255, 255, 0.75);
            font-family: "Open Sans", sans-serif;
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        /* ─── Section Header ─────────────────────────────────────────── */
        .section-header {
            margin-bottom: 2.5rem;
        }

        .section-label {
            display: inline-block;
            font-family: "Open Sans", sans-serif;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--primary-maroon);
            margin-bottom: 0.35rem;
        }

        .section-header h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: clamp(1.4rem, 2.5vw, 1.75rem);
            color: #212529;
            line-height: 1.25;
            margin-bottom: 0.5rem;
        }

        .section-header .section-desc {
            font-family: "Open Sans", sans-serif;
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .text-center .section-desc {
            max-width: 560px;
            margin-inline: auto;
        }

        /* ─── Link More ──────────────────────────────────────────────── */
        .link-more {
            font-family: "Open Sans", sans-serif;
            color: var(--primary-maroon);
            font-weight: 600;
            font-size: 0.8rem;
            text-decoration: none;
            white-space: nowrap;
            letter-spacing: 0.02em;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: color 0.15s ease;
        }

        .link-more .arrow {
            display: inline-block;
            transition: transform 0.2s ease;
        }

        .link-more:hover {
            color: var(--primary-maroon-dark);
        }

        .link-more:hover .arrow {
            transform: translateX(4px);
        }

        /* ─── Cards ──────────────────────────────────────────────────── */
        .card-base {
            background: #ffffff;
            border: 1px solid var(--border-light) !important;
            border-radius: 0.75rem !important;
            transition: box-shadow 0.22s ease, transform 0.22s ease, border-color 0.22s ease;
        }

        .card-base:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 32px rgba(0, 0, 0, 0.09) !important;
            border-color: rgba(123, 30, 48, 0.18) !important;
        }

        /* ─── Hero Section (homepage only) ──────────────────────────── */
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
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: clamp(1.9rem, 3.5vw, 2.8rem);
            color: #ffffff;
            line-height: 1.2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.3rem 0.85rem;
            border-radius: 999px;
            background-color: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #ffffff;
            font-family: "Open Sans", sans-serif;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            backdrop-filter: blur(4px);
        }

        .hero-subtitle {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.82);
            max-width: 520px;
            font-family: "Open Sans", sans-serif;
        }

        /* ─── Pagination shared ───────────────────────────────────────── */
        .custom-pagination .pagination {
            margin-bottom: 0;
        }

        .custom-pagination .page-item {
            margin: 0 2px;
        }

        .custom-pagination .page-link {
            border-radius: 8px;
            padding: 6px 12px;
            color: var(--primary-maroon);
            border-color: #dee2e6;
            font-family: "Open Sans", sans-serif;
            font-size: 0.875rem;
            transition: background-color 0.15s ease, color 0.15s ease, border-color 0.15s ease;
        }

        .custom-pagination .page-link:hover {
            background-color: var(--primary-maroon);
            color: #fff;
            border-color: var(--primary-maroon);
        }

        .custom-pagination .page-item.active .page-link {
            background-color: var(--primary-maroon);
            border-color: var(--primary-maroon);
        }

        /* ─── Footer ─────────────────────────────────────────────────── */
        .site-footer {
            background-color: #f1d0d0;
            color: #800000;
            padding: 3.5rem 0 1.75rem;
        }

        .site-footer .footer-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.1rem;
            color: #800000;
        }

        .site-footer .footer-heading {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            font-weight: 700;
            color: #800000;
            margin-bottom: 1rem;
        }

        .site-footer p, .site-footer span, .site-footer li {
            font-family: "Open Sans", sans-serif;
            font-size: 0.865rem;
        }

        .site-footer .footer-link {
            color: #800000;
            text-decoration: none;
            font-family: "Open Sans", sans-serif;
            font-size: 0.865rem;
            font-weight: 500;
            transition: letter-spacing 0.25s ease, opacity 0.2s ease;
            opacity: 0.85;
        }

        .site-footer .footer-link:hover {
            opacity: 1;
            letter-spacing: 0.3px;
        }

        .site-footer hr {
            border-color: #800000;
            opacity: 0.15;
        }

        .site-footer .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            margin-bottom: 0.6rem;
        }

        .site-footer .footer-contact-item i {
            margin-top: 2px;
            flex-shrink: 0;
            opacity: 0.75;
        }

        /* ─── Misc ───────────────────────────────────────────────────── */
        .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.08);
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="d-flex flex-column min-vh-100">

        {{-- ── Announcement Bar ──────────────────────────────────────── --}}
        @php
            $marqueeItems = cache()->remember('pengumuman_aktif', 3600, function () {
                return \App\Models\Pengumuman::aktif()->pluck('teks')->toArray();
            });
            if (empty($marqueeItems)) {
                $marqueeItems = ['PENGUMUMAN 📢: Pendaftaran PMB STBA Pontianak telah dibuka.'];
            }
        @endphp
        <div class="announcement-bar">
            <div class="marquee-wrapper">
                <div class="marquee-track" id="marqueeTrack">
                    @foreach($marqueeItems as $item)
                        <span class="marquee-item">{{ $item }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            (function () {
                var track = document.getElementById('marqueeTrack');
                var wrapper = track ? track.parentElement : null;
                if (!track || !wrapper) return;
                var W = wrapper.offsetWidth;
                var T = track.scrollWidth;
                var pxPerDetik = 75;
                var durasi = (W + T) / pxPerDetik;
                var style = document.createElement('style');
                style.textContent =
                    '@keyframes marquee-rtl {' +
                    '  from { transform: translateX(' + W + 'px); }' +
                    '  to   { transform: translateX(-' + T + 'px); }' +
                    '}';
                document.head.appendChild(style);
                track.style.animation = 'marquee-rtl ' + durasi.toFixed(1) + 's linear infinite';
            })();
        </script>

        {{-- ── Navbar ────────────────────────────────────────────────── --}}
        <nav class="navbar navbar-expand-lg navbar-custom sticky-top" id="mainNav">
            <div class="container">

                {{-- Brand --}}
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                    <picture>
                        <source srcset="{{ asset('images/logo-stba.webp') }}" type="image/webp">
                        <img src="{{ asset('images/logo-stba.png') }}" alt="Logo STBA Pontianak" height="44" decoding="async">
                    </picture>
                    <span class="navbar-brand-text d-none d-sm-block">
                        STBA Pontianak
                        <small>Sekolah Tinggi Bahasa Asing</small>
                    </span>
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-1">

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}"
                                href="{{ route('beranda') }}">Beranda</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('prodi.*') ? 'active' : '' }}"
                                href="#" data-bs-toggle="dropdown" aria-expanded="false">Program Studi</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('prodi.d3') }}">
                                        <i class="bi bi-mortarboard"></i> Diploma (D3) Bahasa Inggris
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('prodi.s1') }}">
                                        <i class="bi bi-mortarboard-fill"></i> Sarjana (S1) Sastra Inggris
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}"
                                href="{{ route('berita.index') }}">Berita</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('events.*', 'agenda.*', 'staf.*', 'dokumen.*', 'kontak') ? 'active' : '' }}"
                                href="#" data-bs-toggle="dropdown" aria-expanded="false">Informasi</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('events.index') }}">
                                        <i class="bi bi-calendar-event"></i> Event
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('agenda.index') }}">
                                        <i class="bi bi-calendar3"></i> Agenda
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider mx-2"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('staf.index') }}">
                                        <i class="bi bi-people"></i> Staf & Dosen
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('dokumen.index') }}">
                                        <i class="bi bi-file-earmark-text"></i> Dokumen
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('kontak') }}">
                                        <i class="bi bi-telephone"></i> Kontak
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Portal --}}
                        @php
                            $portalLinks = cache()->remember('navbar_portal_links', 3600, function () {
                                $val = \App\Models\Setting::where('key', 'navbar_portal_links')->value('value');
                                return $val ? json_decode($val, true) : [];
                            });
                        @endphp
                        @if (!empty($portalLinks))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Portal</a>
                                <ul class="dropdown-menu">
                                    @foreach ($portalLinks as $link)
                                        <li>
                                            <a class="dropdown-item" href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer">
                                                <i class="bi bi-box-arrow-up-right"></i> {{ $link['label'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        <li class="d-none d-lg-flex nav-cta-divider"></li>
                        <li class="nav-item mt-2 mt-lg-0">
                            <a class="btn btn-maroon btn-sm px-3 py-2" href="{{ route('pmb.daftar') }}">
                                Daftar Sekarang
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        {{-- ── Page Content ───────────────────────────────────────────── --}}
        <main class="flex-fill">
            @yield('content')
        </main>

        {{-- ── Footer ─────────────────────────────────────────────────── --}}
        <footer class="site-footer">
            <div class="container">
                <div class="row g-4 g-lg-5">

                    {{-- Col 1: Brand --}}
                    <div class="col-md-4 col-lg-4">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <img src="{{ asset('images/logo-stba.webp') }}" alt="Logo STBA Pontianak" style="height: 44px;">
                            <span class="footer-brand">STBA Pontianak</span>
                        </div>
                        <p class="mb-0 pe-lg-4" style="opacity: 0.85; line-height: 1.7;">
                            Sekolah Tinggi Bahasa Asing Pontianak berkomitmen menyediakan pendidikan bahasa asing berkualitas
                            untuk menghasilkan lulusan yang siap bersaing di dunia kerja global.
                        </p>
                    </div>

                    {{-- Col 2: Kontak --}}
                    <div class="col-md-4 col-lg-4">
                        <h6 class="footer-heading">Alamat & Kontak</h6>
                        <div class="footer-contact-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>Jl. Gajahmada No. 38, Benua Melayu Darat, Kec. Pontianak Selatan, Kota Pontianak, Kalimantan Barat</span>
                        </div>
                        <div class="footer-contact-item">
                            <i class="bi bi-telephone-fill"></i>
                            <span>0858-2238-5552</span>
                        </div>
                        <div class="footer-contact-item">
                            <i class="bi bi-envelope-fill"></i>
                            <span>kampus@stbapontianak.ac.id</span>
                        </div>
                    </div>

                    {{-- Col 3: Links --}}
                    <div class="col-md-4 col-lg-3 offset-lg-1">
                        <h6 class="footer-heading">Tautan Cepat</h6>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="{{ route('berita.index') }}" class="footer-link">Berita Kampus</a></li>
                            <li class="mb-2"><a href="{{ route('agenda.index') }}" class="footer-link">Agenda Kegiatan</a></li>
                            <li class="mb-2"><a href="{{ route('events.index') }}" class="footer-link">Event & Acara</a></li>
                            <li class="mb-2"><a href="{{ route('staf.index') }}" class="footer-link">Staf & Dosen</a></li>
                            <li class="mb-2"><a href="{{ route('dokumen.index') }}" class="footer-link">Dokumen & Unduhan</a></li>
                            <li><a href="{{ route('pmb.daftar') }}" class="footer-link fw-bold">Pendaftaran PMB →</a></li>
                        </ul>
                    </div>
                </div>

                <hr class="mt-4 mb-3">
                <p class="text-center mb-0" style="font-size: 0.8rem; opacity: 0.7;">
                    &copy; {{ date('Y') }} STBA Pontianak. Hak Cipta Dilindungi.
                </p>
            </div>
        </footer>

    </div>

    {{-- Bootstrap JS --}}
    <script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        // Navbar scroll shadow
        (function () {
            var nav = document.getElementById('mainNav');
            if (!nav) return;
            var onScroll = function () {
                nav.classList.toggle('scrolled', window.scrollY > 30);
            };
            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
        })();
    </script>

    @stack('scripts')
</body>

</html>
