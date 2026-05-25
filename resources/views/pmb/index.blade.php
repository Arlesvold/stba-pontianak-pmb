@extends('layouts.pmb')

@section('title', 'Portal Resmi PMB STBA Pontianak')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/pmb_index.css') }}">
@endpush

@section('content')
    <div id="pmb-page">
        <section class="hero-section position-relative d-flex align-items-center"
            style="min-height: 600px; overflow: hidden;">

            {{-- Background image + overlay --}}
            <div class="position-absolute top-0 start-0 w-100 h-100">
                @php
                    $heroImg = !empty($heroSettings['hero_image'])
                        ? asset('storage/' . $heroSettings['hero_image'])
                        : asset('images/hero1.jpg');
                @endphp
                <img src="{{ $heroImg }}" alt="Penerimaan Mahasiswa Baru STBA Pontianak"
                    class="w-100 h-100" style="object-fit: cover; object-position:center;">
                <div class="position-absolute top-0 start-0 w-100 h-100"
                    style="background: linear-gradient(to right, rgba(0,0,0,0.80), rgba(0,0,0,0.55), rgba(0,0,0,0.10));">
                </div>
            </div>

            {{-- Konten hero --}}
            <div class="container position-relative" style="z-index: 1;">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-badge mb-3">
                            <span class="badge-dot bg-danger rounded-circle" style="width:8px;height:8px;"></span>
                            <span style="color: white;">{{ $heroSettings['hero_badge_label'] ?? 'Penerimaan Mahasiswa Baru' }}</span>
                            <span style="color: white;">Tahun Akademik {{ $heroSettings['hero_tahun_akademik'] ?? '2025/2026' }}</span>
                        </div>

                        <h1 class="hero-title mb-3" style="color: white;">
                            {{ $heroSettings['hero_title'] ?? 'Wujudkan Masa Depan Anda Bersama STBA Pontianak' }}
                        </h1>

                        <p class="hero-subtitle mb-4" style="color: rgba(255,255,255,0.85);">
                            {{ $heroSettings['hero_subtitle'] ?? 'Bergabunglah dengan kampus bahasa yang modern, berfokus pada kompetensi global, dan didukung dosen berpengalaman untuk menyiapkan karier masa depan Anda.' }}
                        </p>

                        <div class="d-flex flex-wrap gap-2 mb-4">
                            @auth
                                <a href="{{ route('pmb.daftar') }}" class="btn btn-maroon">Isi Formulir</a>
                            @else
                                <a href="{{ route('register') }}" class="btn btn-maroon">Daftar Sekarang</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- SECTION: Program Studi --}}
        <section class="py-5 border-bottom">
            <div class="container">
                <div class="text-center mb-4">
                    <h2 class="h4 fw-bold mb-1" style="color: var(--primary-maroon);">Pilihan Program Studi</h2>
                    <p class="text-muted small mb-0">
                        Sesuaikan minat dan rencana karier Anda dengan program studi unggulan di STBA Pontianak.
                    </p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <a href="{{ route('prodi.d3') }}" class="text-decoration-none text-reset">
                            <div class="card card-prodi h-100 shadow-sm text-center px-4 py-5">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-3"
                                        style="width:80px;height:80px;background:var(--primary-maroon);">
                                        <i class="bi bi-mortarboard text-white fs-2"></i>
                                    </div>
                                </div>
                                <h4 class="fw-bold mb-2" style="color:var(--primary-maroon);">Diploma (D3)</h4>
                                <p class="text-muted small mb-0">
                                    Program Diploma Bahasa Inggris yang menekankan keterampilan praktis berbahasa,
                                    komunikasi profesional, serta kemampuan kerja di bidang perkantoran, pariwisata,
                                    dan layanan internasional.
                                </p>
                                <span class="stretched-link"></span>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a href="{{ route('prodi.s1') }}" class="text-decoration-none text-reset">
                            <div class="card card-prodi h-100 shadow-sm text-center px-4 py-5">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-3"
                                        style="width:80px;height:80px;background:var(--primary-maroon);">
                                        <i class="bi bi-briefcase text-white fs-2"></i>
                                    </div>
                                </div>
                                <h4 class="fw-bold mb-2" style="color:var(--primary-maroon);">Sarjana (S1)</h4>
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
            <section class="py-5 border-bottom">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h2 class="h4 fw-bold mb-1" style="color: var(--primary-maroon);">Staf & Dosen</h2>
                            <p class="text-muted small mb-0">Tenaga pengajar dan staf STBA Pontianak.</p>
                        </div>
                        <a href="{{ route('staf.index') }}" class="link-more small text-decoration-none">
                            Lihat semua <span class="arrow">→</span>
                        </a>
                    </div>

                    <div class="row g-4">
                        @foreach ($stafs as $staf)
                            <div class="col-md-3 col-sm-6">
                                <div class="card card-staf h-100 shadow-sm rounded-3 text-center">
                                    @if ($staf->foto)
                                        <img src="{{ asset('storage/' . ltrim($staf->foto, '/')) }}"
                                            alt="{{ $staf->nama }}" class="card-img-top rounded-top-3"
                                            style="height: 240px; width: 100%; object-fit: cover; object-position: top;">
                                    @else
                                        <div class="card-img-top rounded-top-3 bg-light d-flex align-items-center justify-content-center"
                                            style="height: 240px;">
                                            <i class="bi bi-person fs-1 text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="card-body py-3">
                                        <h5 class="card-title fw-semibold mb-1"
                                            style="font-size: 0.9rem; color: var(--primary-maroon);">
                                            <a href="{{ route('staf.index') }}"
                                                class="text-decoration-none text-reset stretched-link">
                                                {{ $staf->nama }}
                                            </a>
                                        </h5>
                                        @if ($staf->posisi)
                                            <p class="card-text small text-muted mb-0">{{ $staf->posisi }}</p>
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
        <section class="py-5 border-bottom">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h2 class="h4 fw-bold mb-1" style="color: var(--primary-maroon);">Berita Kampus</h2>
                        <p class="text-muted small mb-0">Kegiatan dan informasi terbaru seputar STBA Pontianak.</p>
                    </div>
                    @if ($beritaTerbaru->count())
                        <a href="{{ route('berita.index') }}" class="link-more small text-decoration-none">
                            Lihat semua <span class="arrow">→</span>
                        </a>
                    @endif
                </div>

                <div class="row g-4">
                    @forelse ($beritaTerbaru as $berita)
                        <div class="col-md-4">
                            <div class="card card-berita h-100 shadow-sm rounded-3">
                                @if ($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                                        class="card-img-top rounded-top-3" alt="{{ $berita->judul }}"
                                        style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="card-img-top rounded-top-3 bg-light d-flex align-items-center justify-content-center"
                                        style="height: 200px;">
                                        <i class="bi bi-newspaper fs-1 text-muted"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <p class="card-text small text-muted mb-1">
                                        {{ $berita->tanggal->format('d M Y') }}
                                    </p>
                                    <h5 class="card-title fw-semibold mb-2"
                                        style="font-size: 0.95rem; color: var(--primary-maroon);">
                                        {{ \Illuminate\Support\Str::limit($berita->judul, 60) }}
                                    </h5>
                                    <p class="card-text small text-muted mb-2" style="min-height: 44px;">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 80) }}
                                    </p>
                                    <a href="{{ route('berita.show', $berita->id) }}"
                                        class="small text-decoration-none stretched-link"
                                        style="color: var(--primary-maroon);">
                                        Baca selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center text-muted small mb-0">Belum ada berita kampus.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        {{-- SECTION: CTA Pendaftaran --}}
        <section class="cta-section position-relative d-flex align-items-center justify-content-center text-center text-white"
            style="min-height: 360px; overflow: hidden;">
            <div class="position-absolute top-0 start-0 w-100 h-100">
                @php
                    $ctaImg = !empty($heroSettings['cta_image'])
                        ? asset('storage/' . $heroSettings['cta_image'])
                        : asset('images/mendaftar.jpg');
                @endphp
                <img src="{{ $ctaImg }}" alt="Background Pendaftaran" class="w-100 h-100"
                    style="object-fit: cover; object-position: center;">
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.62);"></div>
            </div>
            <div class="container position-relative z-1">
                <h2 class="fw-bold mb-3">
                    {{ $heroSettings['cta_title'] ?? 'Ayo Mulai Mendaftar' }}
                </h2>
                <p class="mb-4" style="font-size: 1rem; opacity: 0.9; max-width: 560px; margin-inline: auto;">
                    {{ $heroSettings['cta_subtitle'] ?? 'Mari wujudkan masa depan gemilang Anda bersama kami di STBA Pontianak.' }}
                </p>
                @auth
                    <a href="{{ route('pmb.daftar') }}" class="btn btn-light px-4 py-2 fw-semibold cta-btn">
                        Isi Formulir Pendaftaran
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-light px-4 py-2 fw-semibold cta-btn">
                        Daftar Akun Sekarang
                    </a>
                @endauth
            </div>
        </section>

        {{-- SECTION: Events --}}
        @if (count($events) > 0)
            <section class="py-5 border-bottom" style="background: #fafafa;">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h2 class="h4 fw-bold mb-1" style="color: var(--primary-maroon);">Event Terbaru</h2>
                            <p class="text-muted small mb-0">Kegiatan dan acara mendatang di STBA Pontianak.</p>
                        </div>
                        <a href="{{ route('events.index') }}" class="link-more small text-decoration-none">
                            Lihat semua <span class="arrow">→</span>
                        </a>
                    </div>

                    <div class="row g-4">
                        @foreach ($events as $event)
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-berita h-100 shadow-sm rounded-3 overflow-hidden">
                                    <div class="position-relative">
                                        @if ($event->gambar)
                                            <img src="{{ asset('storage/' . $event->gambar) }}"
                                                alt="{{ $event->judul }}" class="card-img-top"
                                                style="height: 190px; object-fit: cover;">
                                        @else
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                                style="height: 190px;">
                                                <i class="bi bi-calendar-event fs-1 text-muted"></i>
                                            </div>
                                        @endif
                                        <div class="position-absolute top-0 end-0 m-2">
                                            <div class="bg-white rounded-2 shadow-sm text-center px-3 py-2">
                                                <span class="d-block fw-bold mb-0" style="font-size: 1.1rem; color: #212529;">{{ $event->tanggal_mulai->format('d') }}</span>
                                                <span class="d-block small text-uppercase fw-semibold"
                                                    style="color: var(--primary-maroon); font-size: 0.7rem;">{{ $event->tanggal_mulai->format('M') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title fw-semibold mb-1"
                                            style="font-size: 0.95rem; color: var(--primary-maroon);">
                                            {{ \Illuminate\Support\Str::limit($event->judul, 50) }}
                                        </h5>
                                        <p class="card-text small text-muted mb-2">
                                            <i class="bi bi-geo-alt me-1"></i>{{ $event->lokasi ?? 'STBA Pontianak' }}
                                        </p>
                                        <p class="card-text small text-muted mb-2" style="min-height: 36px;">
                                            {{ $event->deskripsi_singkat ? \Illuminate\Support\Str::limit($event->deskripsi_singkat, 70) : \Illuminate\Support\Str::limit(strip_tags($event->deskripsi), 70) }}
                                        </p>
                                        <a href="{{ route('events.show', $event->id) }}"
                                            class="small text-decoration-none stretched-link"
                                            style="color: var(--primary-maroon);">
                                            Detail acara →
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
        <section class="py-5" style="background: #fafafa;">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h2 class="h4 fw-bold mb-1" style="color: var(--primary-maroon);">Agenda Penting</h2>
                        <p class="text-muted small mb-0">Kalender kegiatan akademik STBA Pontianak.</p>
                    </div>
                    <a href="{{ route('agenda.index') }}" class="link-more small text-decoration-none">
                        Lihat semua <span class="arrow">→</span>
                    </a>
                </div>

                <div class="row g-4">
                    @forelse ($agendas as $agenda)
                        <div class="col-md-6 col-lg-4">
                            <div class="card card-agenda h-100 border-0 shadow-sm rounded-3">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="agenda-date flex-shrink-0 text-center rounded-2 border"
                                            style="min-width: 56px; padding: 0.4rem 0.5rem;">
                                            <span class="d-block fw-bold" style="font-size: 1.4rem; line-height: 1; color: var(--primary-maroon);">{{ $agenda->tanggal_mulai->format('d') }}</span>
                                            <span class="d-block text-uppercase text-muted" style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.05em;">{{ $agenda->tanggal_mulai->format('M') }}</span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fw-semibold mb-1" style="font-size: 0.9rem; color: #212529;">{{ $agenda->judul }}</h5>
                                            <p class="small text-muted mb-1">
                                                @if ($agenda->tanggal_selesai)
                                                    {{ $agenda->tanggal_mulai->format('d M') }} – {{ $agenda->tanggal_selesai->format('d M Y') }}
                                                @else
                                                    {{ $agenda->tanggal_mulai->format('d M Y') }}
                                                @endif
                                            </p>
                                            @if ($agenda->deskripsi)
                                                <p class="card-text small text-muted mb-0">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($agenda->deskripsi), 80) }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4">
                            <p class="text-muted small mb-0">Belum ada agenda yang ditampilkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
