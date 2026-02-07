@extends('layouts.pmb')

@section('title', 'Penerimaan Mahasiswa Baru')

@section('content')
@section('content')
    <style>
        /* Font global isi: sans-serif */
        body {
            font-family: "Open Sans", sans-serif;
        }

        /* Judul section pakai Open Sans bold */
        .heading-title {
            font-family: "Open Sans", sans-serif;
            font-weight: 700;
        }

        /* Isi card / teks biasa */
        .body-text {
            font-family: "Open Sans", sans-serif;
            font-weight: 400;
        }

        .card-prodi {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border: 1px solid #e9ecef !important;
        }

        .card-berita,
        .card-staf {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border: 1px solid #e9ecef !important;
            transition: transform 0.18s ease, box-shadow 0.18s ease;
        }

        .card-staf:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15) !important;
        }

        .card-berita:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15) !important;
        }
    </style>



    <section class="hero-section position-relative d-flex align-items-center" style="min-height: 600px; overflow: hidden;">

        {{-- Background image + overlay --}}
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <img src="{{ asset('images/hero1.jpg') }}" alt="Penerimaan Mahasiswa Baru STBA Pontianak" class="w-100 h-100"
                style="object-fit: cover; object-position: center; transform: scale(1.05);">
            <div class="position-absolute top-0 start-0 w-100 h-100"
                style="background: linear-gradient(to right,
                             rgba(0,0,0,0.80),
                             rgba(0,0,0,0.55),
                             rgba(0,0,0,0.10));">
            </div>
        </div>

        {{-- Konten existing hero --}}
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center g-4">
                {{-- Teks kiri --}}
                <div class="col-lg-7">
                    <div class="hero-badge mb-3">
                        <span class="badge-dot bg-danger rounded-circle" style="width:8px;height:8px;"></span>
                        <span style="color: white;">Penerimaan Mahasiswa Baru</span>
                        <span style="color: white;">Tahun Akademik 2025/2026</span>
                    </div>

                    <h1 class="hero-title mb-3" style="color: white;">
                        Wujudkan Masa Depan <span>Anda</span> Bersama STBA Pontianak
                    </h1>

                    <p class="hero-subtitle mb-4" style="color: white;">
                        Bergabunglah dengan kampus bahasa yang modern, berfokus pada kompetensi global,
                        dan didukung dosen berpengalaman untuk menyiapkan karier masa depan Anda.
                    </p>

                    <div class="hero-cta d-flex flex-wrap gap-2 mb-4">
                        @auth
                            <a href="{{ route('pmb.daftar') }}" class="btn btn-maroon">
                                Isi Formulir
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-maroon">
                                Daftar Sekarang
                            </a>
                        @endauth
                    </div>

                    <div class="hero-highlight-box d-none d-md-block">
                        <h6>Kenapa memilih STBA Pontianak?</h6>
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <div class="small text-muted">Akreditasi</div>
                                <div class="stat">Program Studi Terakreditasi</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="small text-muted">Fokus</div>
                                <div class="stat">Bahasa & Sastra Inggris</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="small text-muted">Lulusan</div>
                                <div class="stat">Siap Kerja Global</div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    {{-- SECTION: 3 Program Studi --}}
    {{-- SECTION: 3 Program Studi --}}
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="h4 fw-bold mb-2" style="color: var(--primary-maroon);">
                    Pilihan Program Studi
                </h2>
                <p class="text-muted mb-0">
                    Sesuaikan minat dan rencana karier Anda dengan program studi unggulan di STBA Pontianak.
                </p>
            </div>

            <div class="row g-4">
                {{-- Card D3 --}}
                <div class="col-md-4">
                    <a href="{{ route('prodi.d3') }}" class="text-decoration-none text-reset">
                        <div class="card card-prodi h-100 shadow-sm text-center px-4 py-5 hover-shadow-sm"
                            style="cursor:pointer;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-3"
                                    style="width:90px;height:90px;background:var(--primary-maroon); box-shadow:0 10px 20px rgba(123,30,48,0.35);">
                                    <i class="bi bi-mortarboard text-white fs-1"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-3" style="color:var(--primary-maroon);">
                                Diploma (D3)
                            </h4>
                            <p class="text-muted small mb-0">
                                Mempersiapkan lulusan dengan kompetensi bahasa, penelitian, dan soft skill untuk
                                karier
                                di pendidikan, media, bisnis internasional, serta lembaga pemerintahan.
                            </p>
                            <span class="stretched-link"></span>
                        </div>
                    </a>
                </div>

                {{-- Card S1 --}}
                <div class="col-md-4">
                    <a href="{{ route('prodi.s1') }}" class="text-decoration-none text-reset">
                        <div class="card card-prodi h-100 shadow-sm text-center px-4 py-5 hover-shadow-sm"
                            style="cursor:pointer;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-3"
                                    style="width:90px;height:90px;background:var(--primary-maroon); box-shadow:0 10px 20px rgba(123,30,48,0.35);">
                                    <i class="bi bi-briefcase text-white fs-1"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-3" style="color:var(--primary-maroon);">
                                Sarjana (S1)
                            </h4>
                            <p class="text-muted small mb-0">
                                Fokus pada keterampilan praktis untuk dunia kerja: administrasi perkantoran,
                                hospitality,
                                front office, dan layanan pelanggan dengan kemampuan bahasa asing yang kuat.
                            </p>
                            <span class="stretched-link"></span>
                        </div>
                    </a>
                </div>

                {{-- Card Sastra Inggris --}}
                <div class="col-md-4">
                    <a href="{{ route('prodi.sastra') }}" class="text-decoration-none text-reset">
                        <div class="card card-prodi h-100 shadow-sm text-center px-4 py-5 hover-shadow-sm"
                            style="cursor:pointer;">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-3"
                                    style="width:90px;height:90px;background:var(--primary-maroon); box-shadow:0 10px 20px rgba(123,30,48,0.35);">
                                    <i class="bi bi-journal-text text-white fs-1"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-3" style="color:var(--primary-maroon);">
                                Sarjana Sastra Inggris
                            </h4>
                            <p class="text-muted small mb-0">
                                Pendalaman bahasa, sastra, dan budaya Inggris untuk karier di penerjemahan,
                                pendidikan,
                                media, riset, dan berbagai bidang internasional lainnya.
                            </p>
                            <span class="stretched-link"></span>
                        </div>
                    </a>
                </div>
            </div>


        </div>
    </section>

    {{-- SECTION: Staf / Dosen --}}
    @if (isset($stafs) && $stafs->count())
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-4">
                    <h2 class="h5 fw-bold mb-1" style="color: var(--primary-maroon);">
                        Staf & Dosen STBA Pontianak
                    </h2>
                    <p class="text-muted mb-0 small">
                        Beberapa staf dan dosen yang akan mendampingi proses belajar Anda.
                    </p>
                </div>

                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('staf.index') }}" class="small text-decoration-none"
                        style="color: var(--primary-maroon);">
                        Lihat semua staf →
                    </a>
                </div>

                <div class="row g-4">
                    @foreach ($stafs as $staf)
                        <div class="col-md-3 col-sm-6">
                            <div class="card card-staf h-100 shadow-sm rounded-4 text-center" style="cursor: pointer;">
                                @if ($staf->foto)
                                    <img src="{{ asset('storage/' . ltrim($staf->foto, '/')) }}" alt="{{ $staf->nama }}"
                                        class="card-img-top rounded-top-4"
                                        style="
                                        height: 260px;
                                        width: 100%;
                                        object-fit: cover;
                                        object-position: top;
                                    ">
                                @else
                                    <div class="card-img-top rounded-top-4 bg-light d-flex align-items-center justify-content-center"
                                        style="height: 260px;">
                                        <span class="text-muted small">Tidak ada foto</span>
                                    </div>
                                @endif

                                <div class="card-body py-3">
                                    <h5 class="card-title fw-semibold mb-1 text-center"
                                        style="font-size: 0.95rem; color: var(--primary-maroon);">
                                        {{ $staf->nama }}
                                    </h5>
                                    @if ($staf->posisi)
                                        <p class="card-text small text-muted mb-0 text-center">
                                            {{ $staf->posisi }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- SECTION: Berita --}}
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="h4 fw-bold mb-1" style="color: var(--primary-maroon);">
                    Berita Kampus
                </h2>
                <p class="text-muted mb-0 small">
                    Kegiatan dan informasi terbaru seputar STBA Pontianak.
                </p>
            </div>

            <div class="row g-4">
                @forelse ($beritaTerbaru as $berita)
                    <div class="col-md-4">
                        <div class="card card-berita h-100 shadow-sm rounded-4 hover-shadow-sm"
                            style="transition: transform .18s ease, box-shadow .18s ease;">
                            {{-- Gambar --}}
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top rounded-top-4"
                                    alt="{{ $berita->judul }}" style="height: 210px; object-fit: cover;">
                            @else
                                <div class="card-img-top rounded-top-4 bg-light d-flex align-items-center justify-content-center"
                                    style="height: 210px;">
                                    <span class="text-muted small">Tidak ada gambar</span>
                                </div>
                            @endif

                            {{-- Isi --}}
                            <div class="card-body">
                                <h5 class="card-title fw-semibold mb-2"
                                    style="font-size: 1rem; color: var(--primary-maroon);">
                                    {{ $berita->judul }}
                                </h5>

                                <p class="card-text small text-muted mb-1">
                                    STBA Pontianak • {{ $berita->tanggal->format('Y') }}
                                </p>

                                @php
                                    $preview = \Illuminate\Support\Str::limit(strip_tags($berita->isi), 60);
                                @endphp
                                <p class="card-text small text-muted mb-2" style="min-height: 48px;">
                                    {{ $preview }}
                                </p>

                                <a href="{{ route('berita.index') }}" class="small text-decoration-none"
                                    style="color: var(--primary-maroon);">
                                    Read more →
                                </a>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted small mb-0">
                            Belum ada berita kampus.
                        </p>
                    </div>
                @endforelse
            </div>

            {{-- Link ke halaman semua berita --}}
            <div class="text-center mt-4">
                <a href="{{ route('berita.index') }}" class="small text-decoration-none"
                    style="color: var(--primary-maroon);">
                    Lihat semua berita kampus →
                </a>
            </div>
        </div>
    </section>

    {{-- SECTION: CTA Pendaftaran --}}
    <section class="position-relative d-flex align-items-center justify-content-center text-center text-white"
        style="min-height: 400px; overflow: hidden;">

        {{-- Background with Overlay --}}
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <img src="{{ asset('images/mendaftar.jpg') }}" alt="Background Pendaftaran" class="w-100 h-100"
                style="object-fit: cover; object-position: center;">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.6);"></div>
        </div>

        {{-- Content --}}
        <div class="container position-relative z-1">
            <h2 class="fw-bold mb-3">Ayo Mulai Mendaftar</h2>
            <p class="mb-4 lead">
                MARI WUJUDKAN MASA DEPAN GEMILANG ANDA BERSAMA KAMI DI STBA PONTIANAK
            </p>
            @auth
                <a href="{{ route('pmb.daftar') }}" class="btn btn-outline-light rounded-0 px-4 py-3 fw-bold"
                    style="border-width: 2px; letter-spacing: 1px;">
                    ISI FORMULIR PENDAFTARAN
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-outline-light rounded-0 px-4 py-3 fw-bold"
                    style="border-width: 2px; letter-spacing: 1px;">
                    DAFTAR AKUN SEKARANG
                </a>
            @endauth
        </div>
    </section>

    {{-- SECTION: Events --}}
    @if (count($events) > 0)
        <section class="py-5 bg-light position-relative overflow-hidden">
            {{-- Ornament Background --}}
            <div class="position-absolute start-0 top-0 mt-5 ms-n5 d-none d-lg-block opacity-25">
                <div style="width: 200px; height: 200px; border: 20px solid var(--primary-maroon); border-radius: 50%;">
                </div>
            </div>

            <div class="container position-relative">
                <div class="row align-items-end mb-5">
                    <div class="col-md-8">
                        <h5 class="text-uppercase letter-spacing-2 fw-bold text-muted mb-2"
                            style="letter-spacing: 2px; font-size: 0.85rem;">Bergabunglah Bersama Kami</h5>
                        <h2 class="display-6 fw-bold mb-0" style="color: var(--primary-maroon);">Event Terbaru
                        </h2>
                    </div>
                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                        <a href="{{ route('events.index') }}" class="btn btn-outline-dark rounded-pill px-4">
                            Lihat Semua Event <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <div class="row g-4">
                    @foreach ($events as $event)
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-berita h-100 shadow-sm rounded-4 overflow-hidden">
                                {{-- Gambar --}}
                                <div class="position-relative">
                                    @if ($event->gambar)
                                        <img src="{{ asset('storage/' . $event->gambar) }}" alt="{{ $event->judul }}"
                                            class="card-img-top" style="height: 200px; object-fit: cover;">
                                    @else
                                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                            style="height: 200px;">
                                            <i class="bi bi-calendar-event fs-1 text-muted"></i>
                                        </div>
                                    @endif
                                    {{-- Date Badge --}}
                                    <div class="position-absolute top-0 end-0 m-3">
                                        <div class="bg-white rounded-3 shadow-sm text-center px-3 py-2">
                                            <span
                                                class="d-block fw-bold h5 mb-0 text-dark">{{ $event->tanggal_mulai->format('d') }}</span>
                                            <span class="d-block small text-uppercase fw-semibold"
                                                style="color: var(--primary-maroon);">{{ $event->tanggal_mulai->format('M') }}</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Isi Card --}}
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold mb-2"
                                        style="font-size: 1rem; color: var(--primary-maroon);">
                                        {{ $event->judul }}
                                    </h5>

                                    <p class="card-text small text-muted mb-2">
                                        <i class="bi bi-geo-alt me-1"></i>
                                        {{ $event->lokasi ?? 'STBA Pontianak' }}
                                    </p>

                                    @if ($event->deskripsi_singkat)
                                        <p class="card-text small text-muted mb-2" style="min-height: 40px;">
                                            {{ \Illuminate\Support\Str::limit($event->deskripsi_singkat, 60) }}
                                        </p>
                                    @endif

                                    <a href="{{ route('events.index') }}" class="small text-decoration-none"
                                        style="color: var(--primary-maroon);">
                                        Detail Acara →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <style>
                    .group-hover-effect:hover img {
                        transform: scale(1.1);
                    }

                    .group-hover-effect {
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                    }

                    .group-hover-effect:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
                    }
                </style>
            </div>
        </section>
    @endif





    {{-- SECTION: Agenda --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5">
                <div class="mb-3 mb-md-0">
                    <h5 class="fw-bold text-danger text-uppercase mb-2" style="font-size: 0.85rem; letter-spacing: 1px;">
                        Kalender Akademik</h5>
                    <h2 class="h3 fw-bold text-dark mb-0">Agenda Penting</h2>
                </div>
                <a href="{{ route('agenda.index') }}" class="btn btn-outline-danger rounded-pill px-4">
                    Lihat Semua Agenda
                </a>
            </div>

            <div class="row g-4">
                @forelse ($agendas as $agenda)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-translate"
                            style="transition: all 0.3s ease;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="bg-light rounded-3 text-center py-2 px-3 me-3 text-nowrap border"
                                        style="min-width: 80px;">
                                        <span
                                            class="d-block text-danger fw-bold h3 mb-0">{{ $agenda->tanggal_mulai->format('d') }}</span>
                                        <span
                                            class="d-block text-uppercase small fw-bold text-muted">{{ $agenda->tanggal_mulai->format('M') }}</span>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1 fs-6 text-dark lh-base">{{ $agenda->judul }}</h5>
                                        <div class="small text-muted mb-2">
                                            @if ($agenda->tanggal_selesai)
                                                {{ $agenda->tanggal_mulai->format('d M') }} -
                                                {{ $agenda->tanggal_selesai->format('d M Y') }}
                                            @else
                                                {{ $agenda->tanggal_mulai->format('d M Y') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <p class="card-text small text-muted">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($agenda->deskripsi), 80) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4">
                        <p class="text-muted">Belum ada agenda yang ditampilkan.</p>
                    </div>
                @endforelse
            </div>

            <style>
                .hover-translate:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 1rem 3rem rgba(0, 0, 0, .1) !important;
                }
            </style>
        </div>
    </section>


    </section>

    </section>
@endsection
