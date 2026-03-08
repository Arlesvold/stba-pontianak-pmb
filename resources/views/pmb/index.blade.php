@extends('layouts.pmb')

@section('title', 'Penerimaan Mahasiswa Baru')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/pmb_index.css') }}">
@endpush

@section('content')
    <div id="pmb-page">
        <section class="hero-section position-relative d-flex align-items-center"
            style="min-height: 600px; overflow: hidden;">

            {{-- Background image + overlay --}}
            <div class="position-absolute top-0 start-0 w-100 h-100">

                <picture>
                    <source srcset="{{ asset('images/hero1.webp') }}" type="image/webp">
                    <img src="{{ asset('images/hero1.jpg') }}" alt="Penerimaan Mahasiswa Baru STBA Pontianak"
                        class="w-100 h-100" style="object-fit: cover; object-position:center; transform:scale(1.05);">
                </picture>

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
                    <div class="col-lg-7 fade-left">
                        <div class="hero-badge mb-3 fade-left delay-1">
                            <span class="badge-dot bg-danger rounded-circle" style="width:8px;height:8px;"></span>
                            <span style="color: white;">Penerimaan Mahasiswa Baru</span>
                            <span style="color: white;">Tahun Akademik 2025/2026</span>
                        </div>

                        <h1 class="hero-title mb-3 fade-left delay-2" style="color: white;">
                            Wujudkan Masa Depan <span>Anda</span> Bersama STBA Pontianak
                        </h1>

                        <p class="hero-subtitle mb-4 fade-left delay-3" style="color: white;">
                            Bergabunglah dengan kampus bahasa yang modern, berfokus pada kompetensi global,
                            dan didukung dosen berpengalaman untuk menyiapkan karier masa depan Anda.
                        </p>

                        <div class="hero-cta d-flex flex-wrap gap-2 mb-4 fade-left delay-4">
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

                    </div>


                </div>
            </div>
        </section>

        {{-- SECTION: 3 Program Studi --}}
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-4 fade-up">
                    <h2 class="h4 fw-bold mb-2" style="color: var(--primary-maroon);">
                        Pilihan Program Studi
                    </h2>
                    <p class="text-muted mb-0 fade-up delay-1">
                        Sesuaikan minat dan rencana karier Anda dengan program studi unggulan di STBA Pontianak.
                    </p>
                </div>

                <div class="row g-4">
                    {{-- Card D3 --}}
                    <div class="col-md-6 fade-up">
                        <a href="{{ route('prodi.d3') }}" class="text-decoration-none text-reset reveal">
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
                                    Program Diploma Bahasa Inggris yang menekankan keterampilan praktis berbahasa,
                                    komunikasi profesional, serta kemampuan kerja di bidang perkantoran, pariwisata,
                                    dan layanan internasional.
                                </p>
                                <span class="stretched-link"></span>
                            </div>
                        </a>
                    </div>

                    {{-- Card S1 --}}
                    <div class="col-md-6 fade-up">
                        <a href="{{ route('prodi.s1') }}" class="text-decoration-none text-reset reveal">
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
                                    Program Sarjana Sastra Inggris dengan fokus pada kemampuan komunikasi,
                                    penerjemahan, penulisan, serta pemahaman budaya untuk karier di bidang
                                    pendidikan, media, kreatif, dan industri global.
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

                    <div class="d-flex justify-content-end mb-3 fade-up delay-1">
                        <a href="{{ route('staf.index') }}" class="link-staff small text-decoration-none"
                            style="color: var(--primary-maroon);">
                            Lihat semua staf <span class="arrow">→</span>
                        </a>
                    </div>

                    <div class="row g-4">
                        @foreach ($stafs as $staf)
                            <div class="col-md-3 col-sm-6">
                                <div class="card card-staf h-100 shadow-sm rounded-4 text-center fade-up"
                                    style="cursor: pointer;">
                                    @if ($staf->foto)
                                        <img src="{{ asset('storage/' . ltrim($staf->foto, '/')) }}"
                                            alt="{{ $staf->nama }}" class="card-img-top rounded-top-4"
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
                                            <a href="{{ route('staf.index') }}"
                                                class="text-decoration-none text-reset stretched-link">
                                                {{ $staf->nama }}
                                            </a>
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
                <div class="text-center mb-4 fade-up">
                    <h2 class="h4 fw-bold mb-1" style="color: var(--primary-maroon);">
                        Berita Kampus
                    </h2>
                    <p class="text-muted mb-0 small fade-up delay-1">
                        Kegiatan dan informasi terbaru seputar STBA Pontianak.
                    </p>
                </div>

                <div class="row g-4">
                    @forelse ($beritaTerbaru as $berita)
                        <div class="col-md-4 fade-up delay-2">
                            <div class="card card-berita h-100 shadow-sm rounded-4 hover-shadow-sm"
                                style="transition: transform .18s ease, box-shadow .18s ease;">
                                {{-- Gambar --}}
                                @if ($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                                        class="card-img-top rounded-top-4" alt="{{ $berita->judul }}"
                                        style="height: 210px; object-fit: cover;">
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
                                        {{ \Illuminate\Support\Str::limit($berita->judul, 40) }}
                                    </h5>

                                    <p class="card-text small text-muted mb-1">
                                        STBA Pontianak • {{ $berita->tanggal->format('Y') }}
                                    </p>

                                    @php
                                        $preview = \Illuminate\Support\Str::limit(strip_tags($berita->isi), 70);
                                    @endphp
                                    <p class="card-text small text-muted mb-2" style="min-height: 48px;">
                                        {{ $preview }}
                                    </p>

                                    <a href="{{ route('berita.show', $berita->id) }}"
                                        class="small text-decoration-none stretched-link"
                                        style="color: var(--primary-maroon);">
                                        Read more →
                                    </a>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="col-12 fade-up delay-3">
                            <p class="text-center text-muted small mb-0">
                                Belum ada berita kampus.
                            </p>
                        </div>
                    @endforelse
                </div>

                {{-- Link ke halaman semua berita --}}
                <div class="text-center mt-4 fade-up delay-4">
                    <a href="{{ route('berita.index') }}" class="link-berita small text-decoration-none">
                        Lihat semua berita kampus <span class="arrow">→</span>
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
            <div class="container position-relative z-1 text-center">

                <h2 class="fw-bold mb-3 fade-up delay-1">
                    Ayo Mulai Mendaftar
                </h2>

                <p class="mb-4 lead fade-up delay-2">
                    MARI WUJUDKAN MASA DEPAN GEMILANG ANDA BERSAMA KAMI DI STBA PONTIANAK
                </p>

                @auth
                    <a href="{{ route('pmb.daftar') }}"
                        class="btn btn-outline-light rounded-5 px-4 py-3 fw-bold cta-btn fade-up delay-3">
                        ISI FORMULIR PENDAFTARAN
                    </a>
                @else
                    <a href="{{ route('register') }}"
                        class="btn btn-outline-light rounded-5 px-4 py-3 fw-bold cta-btn fade-up delay-3">
                        DAFTAR AKUN SEKARANG
                    </a>
                @endauth

            </div>
        </section>

        {{-- SECTION: Events --}}
        @if (count($events) > 0)
            <section class="py-5 bg-light position-relative overflow-hidden">
                <div class="container position-relative">
                    <div class="row align-items-end mb-5">
                        <div class="col-md-8">
                            <h5 class="text-uppercase letter-spacing-2 fw-bold text-muted mb-2 fade-up"
                                style="letter-spacing: 2px; font-size: 0.85rem;">Bergabunglah Bersama Kami</h5>
                            <h2 class="display-6 fw-bold mb-0 fade-up delay-1" style="color: var(--primary-maroon);">Event
                                Terbaru
                            </h2>
                        </div>
                        <div class="col-md-4 text-md-end mt-3 mt-md-0 fade-up delay-2">
                            <a href="{{ route('events.index') }}" class="btn btn-outline-dark rounded-pill px-4">
                                Lihat Semua Event <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>

                    <div class="row g-4">
                        @foreach ($events as $event)
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-berita h-100 shadow-sm rounded-4 overflow-hidden fade-up delay-4"
                                    style="transition: transform .18s ease, box-shadow .18s ease;">
                                    {{-- Gambar --}}
                                    <div class="position-relative">
                                        @if ($event->gambar)
                                            <img src="{{ asset('storage/' . $event->gambar) }}"
                                                alt="{{ $event->judul }}" class="card-img-top"
                                                style="height: 200px; object-fit: cover;">
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
                                            {{ \Illuminate\Support\Str::limit($event->judul, 40) }}
                                        </h5>

                                        <p class="card-text small text-muted mb-2">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            {{ $event->lokasi ?? 'STBA Pontianak' }}
                                        </p>

                                        <p class="card-text small text-muted mb-2" style="min-height: 40px;">
                                            {{ $event->deskripsi_singkat ? \Illuminate\Support\Str::limit($event->deskripsi_singkat, 60) : \Illuminate\Support\Str::limit(strip_tags($event->deskripsi), 60) }}
                                        </p>

                                        <a href="{{ route('events.show', $event->id) }}"
                                            class="small text-decoration-none stretched-link"
                                            style="color: var(--primary-maroon);">
                                            Detail Acara →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- SECTION: Agenda --}}
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5">
                    <div class="mb-3 mb-md-0 fade-up">
                        <h5 class="fw-bold text-danger text-uppercase mb-2"
                            style="font-size: 0.85rem; letter-spacing: 1px;">
                            Kalender Akademik</h5>
                        <h2 class="h3 fw-bold text-dark mb-0">Agenda Penting</h2>
                    </div>
                    <a href="{{ route('agenda.index') }}"
                        class="btn btn-outline-danger rounded-pill px-4 fade-up delay-1 btn-agenda">
                        Lihat Semua Agenda
                    </a>
                </div>

                <div class="row g-4">
                    @forelse ($agendas as $agenda)
                        <div class="col-md-6 col-lg-4 fade-up delay-2">
                            <div class="card h-100 border-0 shadow-sm rounded-4 hover-translate fade-up"
                                style="transition: transform .18s ease, box-shadow .18s ease;">
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
                        <div class="col-12 text-center py-4 fade-up delay-2">
                            <p class="text-muted">Belum ada agenda yang ditampilkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
        <script src="{{ asset('js/pages/index_pmb.js') }}"></script>
    @endpush
@endsection
