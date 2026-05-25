<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PMB STBA Pontianak')</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400;1,9..144,600&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 CSS --}}
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <style>
        /* ─── Design Tokens ──────────────────────────────────────── */
        :root {
            --ink:          #1a1614;
            --ink-2:        #3a322c;
            --muted:        #7a6e62;
            --muted-2:      #b8aa97;
            --paper:        #faf5ec;
            --paper-2:      #f3e9d4;
            --paper-3:      #ebdfc4;
            --paper-warm:   #fdfaf3;
            --maroon:       #7b1e30;
            --maroon-deep:  #5a1423;
            --maroon-soft:  rgba(123,30,48,0.08);
            --maroon-tint:  rgba(123,30,48,0.15);
            --gold:         #b08338;
            --gold-soft:    #d6b66a;
            --leaf:         #5b7a4a;
            --rule:         #d9c9a8;
            --rule-soft:    #e6d9b9;
            --font-display: 'Fraunces', 'Playfair Display', Georgia, serif;
            --font-body:    'Plus Jakarta Sans', system-ui, sans-serif;
            --font-mono:    'JetBrains Mono', ui-monospace, monospace;
        }

        /* ─── Base ───────────────────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: var(--font-body);
            background-color: var(--paper);
            color: var(--ink-2);
            font-size: 15px;
            line-height: 1.7;
        }

        h1, h2, h3, h4, h5, .serif {
            font-family: var(--font-display);
            color: var(--ink);
        }

        /* ─── Typography utilities ───────────────────────────────── */
        .mono {
            font-family: var(--font-mono);
        }

        .h-display {
            font-family: var(--font-display);
            font-weight: 600;
            line-height: 1.1;
            letter-spacing: -0.02em;
        }

        .h-section {
            font-family: var(--font-display);
            font-weight: 600;
            font-size: clamp(1.5rem, 2.5vw, 2rem);
            line-height: 1.2;
            letter-spacing: -0.01em;
        }

        .h-card {
            font-family: var(--font-display);
            font-weight: 600;
            line-height: 1.25;
        }

        .eyebrow {
            font-family: var(--font-mono);
            font-size: 0.68rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--maroon);
        }

        .section-num {
            font-family: var(--font-mono);
            font-size: 0.65rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--maroon);
        }

        .lead {
            font-size: 1.05rem;
            color: var(--ink-2);
            line-height: 1.7;
        }

        /* ─── Layout wrappers ────────────────────────────────────── */
        .wrap        { max-width: 1280px; margin: 0 auto; padding: 72px 48px; }
        .wrap-narrow { max-width: 960px;  margin: 0 auto; padding: 0 48px; }

        @media (max-width: 768px) {
            .wrap, .wrap-narrow { padding-left: 24px; padding-right: 24px; }
        }

        /* ─── Announcement Bar ───────────────────────────────────── */
        .announcement-bar {
            background-color: var(--maroon-deep);
            color: var(--paper);
            font-size: 0.78rem;
            font-family: var(--font-mono);
            font-weight: 400;
            letter-spacing: 0.05em;
            overflow: hidden;
        }

        .marquee-wrapper {
            overflow: hidden;
            padding: 0.55rem 0;
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

        .marquee-item::before {
            content: '◆';
            color: var(--gold);
            margin-right: 0.75rem;
            font-size: 0.5rem;
            vertical-align: middle;
        }

        /* ─── Navbar ─────────────────────────────────────────────── */
        .navbar-custom {
            background-color: var(--paper);
            border-bottom: 1px solid var(--rule-soft);
            transition: box-shadow 0.25s ease;
        }

        .navbar-custom.scrolled {
            box-shadow: 0 4px 20px rgba(26,22,20,0.08);
        }

        .navbar-brand-text {
            font-family: var(--font-display);
            font-weight: 600;
            font-size: 1rem;
            color: var(--ink);
            line-height: 1.15;
        }

        .navbar-brand-text small {
            font-family: var(--font-mono);
            font-size: 0.58rem;
            font-weight: 400;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--maroon);
            display: block;
            margin-top: 2px;
        }

        .navbar-nav .nav-link {
            font-family: var(--font-body);
            font-weight: 500;
            font-size: 0.875rem;
            color: var(--ink-2);
            position: relative;
            padding-bottom: 0.4rem;
            transition: color 0.15s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            color: var(--maroon);
        }

        .navbar-nav .nav-link.active {
            color: var(--maroon);
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
                background-color: var(--maroon);
            }
        }

        .navbar-custom .dropdown-menu {
            border: 1px solid var(--rule);
            border-radius: 0;
            box-shadow: 0 12px 32px rgba(26,22,20,0.12);
            padding: 0.5rem;
            min-width: 220px;
            background: var(--paper-warm);
        }

        .navbar-custom .dropdown-item {
            padding: 0.5rem 0.85rem;
            font-size: 0.875rem;
            color: var(--ink-2);
            display: flex;
            align-items: center;
            gap: 0.55rem;
            transition: background-color 0.12s ease, color 0.12s ease;
            border-radius: 0;
        }

        .navbar-custom .dropdown-item:hover,
        .navbar-custom .dropdown-item:focus {
            background-color: var(--maroon-soft);
            color: var(--maroon);
        }

        .navbar-custom .dropdown-item i {
            width: 1rem;
            opacity: 0.6;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .navbar-custom .dropdown-divider {
            border-color: var(--rule);
            margin: 0.3rem 0;
        }

        .nav-cta-divider {
            border-left: 1px solid var(--rule);
            height: 1.5rem;
            align-self: center;
            margin: 0 0.25rem;
        }

        /* ─── Buttons ────────────────────────────────────────────── */
        .btn-maroon {
            background-color: var(--maroon);
            border-color: var(--maroon);
            color: var(--paper);
            font-family: var(--font-body);
            font-weight: 600;
            font-size: 0.82rem;
            letter-spacing: 0.01em;
            border-radius: 0;
            transition: background-color 0.18s ease, box-shadow 0.18s ease;
        }

        .btn-maroon:hover {
            background-color: var(--maroon-deep);
            border-color: var(--maroon-deep);
            color: var(--paper);
            box-shadow: 0 4px 12px rgba(123,30,48,0.3);
        }

        .btn-outline-maroon {
            border-color: var(--maroon);
            color: var(--maroon);
            font-family: var(--font-body);
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 0;
        }

        .btn-outline-maroon:hover {
            background-color: var(--maroon);
            color: var(--paper);
            box-shadow: 0 4px 12px rgba(123,30,48,0.25);
        }

        /* Generic design-system buttons */
        .ds-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 20px;
            font-family: var(--font-body);
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            border: 1.5px solid transparent;
            transition: all 0.18s ease;
            text-decoration: none;
        }

        .ds-btn-maroon  { background: var(--maroon); border-color: var(--maroon); color: var(--paper); }
        .ds-btn-maroon:hover { background: var(--maroon-deep); border-color: var(--maroon-deep); color: var(--paper); }
        .ds-btn-ink     { background: var(--maroon-deep); border-color: var(--maroon-deep); color: var(--paper); }
        .ds-btn-ghost   { background: transparent; border-color: var(--rule); color: var(--ink-2); }
        .ds-btn-ghost:hover { border-color: var(--maroon); color: var(--maroon); }
        .ds-btn-paper   { background: var(--paper); border-color: var(--rule); color: var(--ink); }
        .ds-btn-sm      { padding: 6px 14px; font-size: 0.75rem; }

        /* ─── Tag pills ──────────────────────────────────────────── */
        .tag-pill {
            display: inline-block;
            font-family: var(--font-mono);
            font-size: 0.65rem;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            padding: 4px 10px;
            border: 1px solid var(--maroon-tint);
            background: var(--maroon-soft);
            color: var(--maroon);
        }

        .tag-pill.gold {
            border-color: rgba(176,131,56,0.3);
            background: rgba(176,131,56,0.08);
            color: var(--gold);
        }

        .tag-pill.leaf {
            border-color: rgba(91,122,74,0.3);
            background: rgba(91,122,74,0.08);
            color: var(--leaf);
        }

        /* ─── Date block ─────────────────────────────────────────── */
        .date-block {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: var(--maroon-deep);
            color: var(--paper);
            padding: 8px 12px;
            min-width: 52px;
        }

        .date-block .d {
            font-family: var(--font-display);
            font-size: 1.6rem;
            font-weight: 600;
            line-height: 1;
        }

        .date-block .m {
            font-family: var(--font-mono);
            font-size: 0.6rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--gold-soft);
            margin-top: 3px;
        }

        /* ─── Page Hero (inner pages) ────────────────────────────── */
        .page-hero {
            background: var(--paper-2);
            border-bottom: 1px solid var(--rule);
            padding: 56px 0 52px;
        }

        .page-hero-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 48px;
        }

        @media (max-width: 768px) {
            .page-hero-inner { padding: 0 24px; }
            .page-hero { padding: 40px 0 36px; }
        }

        .page-hero .crumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: var(--font-mono);
            font-size: 0.65rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 24px;
        }

        .page-hero .crumb a {
            color: var(--muted);
            text-decoration: none;
            transition: color 0.15s;
        }

        .page-hero .crumb a:hover { color: var(--maroon); }
        .page-hero .crumb .sep { opacity: 0.4; }

        .page-hero-mark {
            font-family: var(--font-mono);
            font-size: 0.62rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--muted);
            border: 1px solid var(--rule);
            padding: 4px 10px;
            background: var(--paper);
            display: inline-block;
        }

        .page-hero h1 {
            font-family: var(--font-display);
            font-weight: 600;
            font-size: clamp(2rem, 4vw, 3rem);
            color: var(--ink);
            line-height: 1.1;
            letter-spacing: -0.02em;
            margin-bottom: 0.75rem;
        }

        .page-hero h1 em {
            font-style: italic;
            color: var(--maroon);
        }

        .page-hero .hero-subtitle {
            color: var(--ink-2);
            font-family: var(--font-body);
            font-size: 1rem;
            line-height: 1.65;
            max-width: 620px;
            margin-bottom: 0;
        }

        /* ─── Cards ──────────────────────────────────────────────── */
        .card-base {
            background: var(--paper-warm);
            border: 1px solid var(--rule-soft) !important;
            border-radius: 0 !important;
            transition: box-shadow 0.22s ease, transform 0.22s ease, border-color 0.22s ease;
        }

        .card-base:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 32px rgba(26,22,20,0.09) !important;
            border-color: var(--maroon-tint) !important;
        }

        .card-ds {
            background: var(--paper-warm);
            border: 1px solid var(--rule-soft);
        }

        .card-warm {
            background: var(--paper-2);
            border: 1px solid var(--rule);
        }

        /* ─── Section headers ────────────────────────────────────── */
        .section-header {
            margin-bottom: 2.5rem;
        }

        .section-label {
            display: inline-block;
            font-family: var(--font-mono);
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--maroon);
            margin-bottom: 0.5rem;
        }

        .section-header h2 {
            font-family: var(--font-display);
            font-weight: 600;
            font-size: clamp(1.5rem, 2.5vw, 2rem);
            color: var(--ink);
            line-height: 1.2;
            margin-bottom: 0.5rem;
            letter-spacing: -0.01em;
        }

        .section-header .section-desc {
            color: var(--muted);
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .text-center .section-desc {
            max-width: 560px;
            margin-inline: auto;
        }

        /* ─── Link More ──────────────────────────────────────────── */
        .link-more {
            font-family: var(--font-body);
            color: var(--maroon);
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

        .link-more .arr, .link-more .arrow {
            display: inline-block;
            transition: transform 0.2s ease;
        }

        .link-more:hover {
            color: var(--maroon-deep);
        }

        .link-more:hover .arr,
        .link-more:hover .arrow {
            transform: translateX(4px);
        }

        /* ─── Breadcrumb ─────────────────────────────────────────── */
        .crumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: var(--font-mono);
            font-size: 0.65rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .crumb a { color: var(--muted); text-decoration: none; }
        .crumb a:hover { color: var(--maroon); }
        .crumb .sep { opacity: 0.4; }

        /* ─── Pagination ─────────────────────────────────────────── */
        .custom-pagination .pagination {
            margin-bottom: 0;
        }

        .custom-pagination .page-item {
            margin: 0 2px;
        }

        .custom-pagination .page-link {
            border-radius: 0;
            padding: 6px 12px;
            color: var(--maroon);
            border-color: var(--rule);
            font-family: var(--font-mono);
            font-size: 0.8rem;
            background: var(--paper);
            transition: background-color 0.15s ease, color 0.15s ease;
        }

        .custom-pagination .page-link:hover {
            background-color: var(--maroon);
            color: var(--paper);
            border-color: var(--maroon);
        }

        .custom-pagination .page-item.active .page-link {
            background-color: var(--maroon);
            border-color: var(--maroon);
            color: var(--paper);
        }

        /* ─── Homepage hero ──────────────────────────────────────── */
        .hero-section {
            background: var(--paper-2);
            padding: 80px 0 88px;
            border-bottom: 1px solid var(--rule);
        }

        @media (max-width: 768px) {
            .hero-section { padding: 48px 0 56px; }
        }

        .hero-title {
            font-family: var(--font-display);
            font-weight: 600;
            font-size: clamp(2.5rem, 5.5vw, 4.5rem);
            color: var(--ink);
            line-height: 1.08;
            letter-spacing: -0.03em;
        }

        .hero-title em {
            font-style: italic;
            color: var(--maroon);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 5px 12px;
            background-color: var(--maroon-soft);
            border: 1px solid var(--maroon-tint);
            color: var(--maroon);
            font-family: var(--font-mono);
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .hero-subtitle {
            font-size: 1rem;
            color: var(--ink-2);
            max-width: 480px;
            font-family: var(--font-body);
            line-height: 1.7;
        }

        /* ─── Footer ─────────────────────────────────────────────── */
        .site-footer {
            background-color: var(--paper-2);
            color: var(--ink-2);
            border-top: 3px solid var(--maroon);
            padding: 72px 0 32px;
        }

        .site-footer .footer-brand {
            font-family: var(--font-display);
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--ink);
        }

        .site-footer .footer-heading {
            font-family: var(--font-mono);
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--maroon);
            margin-bottom: 1.25rem;
        }

        .site-footer p, .site-footer span, .site-footer li {
            font-family: var(--font-body);
            font-size: 0.875rem;
            color: var(--ink-2);
        }

        .site-footer .footer-link {
            color: var(--ink-2);
            text-decoration: none;
            font-family: var(--font-body);
            font-size: 0.875rem;
            font-weight: 400;
            transition: color 0.2s ease;
            display: block;
            padding: 4px 0;
        }

        .site-footer .footer-link:hover {
            color: var(--maroon);
        }

        .site-footer hr {
            border-color: var(--rule);
            opacity: 1;
        }

        .site-footer .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            margin-bottom: 0.75rem;
            color: var(--ink-2);
        }

        .site-footer .footer-contact-item i {
            margin-top: 2px;
            flex-shrink: 0;
            color: var(--maroon);
            opacity: 0.85;
        }

        /* ─── Misc ───────────────────────────────────────────────── */
        .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px rgba(26,22,20,0.09);
        }

        /* Diagonal-stripe image placeholder */
        .ph {
            background: repeating-linear-gradient(
                45deg,
                transparent 0 11px,
                rgba(26,22,20,0.04) 11px 12px
            ),
            var(--paper-3);
            display: grid;
            place-items: center;
            color: var(--muted);
            position: relative;
            overflow: hidden;
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
                $marqueeItems = ['Pendaftaran PMB STBA Pontianak telah dibuka.'];
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
                        <p class="mb-3 pe-lg-4" style="opacity: 0.72; line-height: 1.7;">
                            Sekolah Tinggi Bahasa Asing Pontianak. Membentuk lulusan yang cakap berbahasa, peka budaya, dan siap bersaing di dunia global.
                        </p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('pmb.daftar') }}" class="ds-btn ds-btn-maroon ds-btn-sm">Daftar PMB &rarr;</a>
                        </div>
                    </div>

                    {{-- Col 2: Kontak --}}
                    <div class="col-md-4 col-lg-4">
                        <h6 class="footer-heading">Alamat &amp; Kontak</h6>
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
                            <li><a href="{{ route('berita.index') }}" class="footer-link">Berita Kampus</a></li>
                            <li><a href="{{ route('agenda.index') }}" class="footer-link">Agenda Kegiatan</a></li>
                            <li><a href="{{ route('events.index') }}" class="footer-link">Event &amp; Acara</a></li>
                            <li><a href="{{ route('staf.index') }}" class="footer-link">Staf &amp; Dosen</a></li>
                            <li><a href="{{ route('dokumen.index') }}" class="footer-link">Dokumen &amp; Unduhan</a></li>
                            <li><a href="{{ route('pmb.daftar') }}" class="footer-link" style="color: var(--maroon); font-weight: 600;">Pendaftaran PMB &rarr;</a></li>
                        </ul>
                    </div>
                </div>

                <hr class="mt-5 mb-3">
                <p class="text-center mb-0" style="font-family: var(--font-mono); font-size: 0.68rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--muted);">
                    &copy; {{ date('Y') }} STBA Pontianak &mdash; Hak Cipta Dilindungi
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
