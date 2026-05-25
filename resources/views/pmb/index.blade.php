@extends('layouts.pmb')

@section('title', 'Portal Resmi PMB STBA Pontianak')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/pmb_index.css') }}">
@endpush

@section('content')
<div id="pmb-page">

    {{-- ── Hero ──────────────────────────────────────────────────── --}}
    <section class="hero-section position-relative d-flex align-items-center" style="min-height: 600px; overflow: hidden;">
        <div class="position-absolute top-0 start-0 w-100 h-100">
            @php
                $heroImg = !empty($heroSettings['hero_image'])
                    ? asset('storage/' . $heroSettings['hero_image'])
                    : asset('images/hero1.jpg');
            @endphp
            <img src="{{ $heroImg }}" alt="Penerimaan Mahasiswa Baru STBA Pontianak"
                class="w-100 h-100" style="object-fit: cover; object-position: center;">
            <div class="position-absolute top-0 start-0 w-100 h-100"
                style="background: linear-gradient(to right, rgba(0,0,0,0.82), rgba(0,0,0,0.55), rgba(0,0,0,0.12));">
            </div>
        </div>

        <div class="container position-relative" style="z-index: 1;">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-badge mb-3">
                        <span class="badge-dot bg-danger rounded-circle" style="width:7px;height:7px;"></span>
                        <span>{{ $heroSettings['hero_badge_label'] ?? 'Penerimaan Mahasiswa Baru' }}</span>
                        &mdash;
                        <span>TA {{ $heroSettings['hero_tahun_akademik'] ?? '2025/2026' }}</span>
                    </div>

                    <h1 class="hero-title mb-3">
                        {{ $heroSettings['hero_title'] ?? 'Wujudkan Masa Depan Anda Bersama STBA Pontianak' }}
                    </h1>

                    <p class="hero-subtitle mb-4">
                        {{ $heroSettings['hero_subtitle'] ?? 'Bergabunglah dengan kampus bahasa yang modern, berfokus pada kompetensi global, dan didukung dosen berpengalaman.' }}
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        @auth
                            <a href="{{ route('pmb.daftar') }}" class="btn btn-maroon px-4 py-2">Isi Formulir</a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-maroon px-4 py-2">Daftar Sekarang</a>
                        @endauth
                        <a href="{{ route('pmb.informasi') }}" class="btn btn-outline-light px-4 py-2">Info PMB</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Program Studi ─────────────────────────────────────────── --}}
    <section class="py-5 border-bottom">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-label">Akademik</span>
                <h2>Pilihan Program Studi</h2>
                <p class="section-desc">Sesuaikan minat dan rencana karier Anda dengan program studi unggulan di STBA Pontianak.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <a href="{{ route('prodi.d3') }}" class="text-decoration-none text-reset d-block h-100">
                        <div class="card card-prodi card-base h-100 text-center px-4 py-5">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-3"
                                    style="width:80px;height:80px;background:var(--primary-maroon);">
                                    <i class="bi bi-mortarboard text-white fs-2"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-2" style="color:var(--primary-maroon);">Diploma (D3)</h4>
                            <p class="text-muted mb-0" style="font-size: 0.875rem; line-height: 1.7;">
                                Program Diploma Bahasa Inggris yang menekankan keterampilan praktis berbahasa,
                                komunikasi profesional, serta kemampuan kerja di bidang perkantoran, pariwisata,
                                dan layanan internasional.
                            </p>
                            <div class="mt-3 prodi-cta">
                                <span class="link-more">Selengkapnya <span class="arrow">→</span></span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="{{ route('prodi.s1') }}" class="text-decoration-none text-reset d-block h-100">
                        <div class="card card-prodi card-base h-100 text-center px-4 py-5">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-3"
                                    style="width:80px;height:80px;background:var(--primary-maroon);">
                                    <i class="bi bi-briefcase text-white fs-2"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-2" style="color:var(--primary-maroon);">Sarjana (S1)</h4>
                            <p class="text-muted mb-0" style="font-size: 0.875rem; line-height: 1.7;">
                                Program Sarjana Sastra Inggris dengan fokus pada kemampuan komunikasi,
                                penerjemahan, penulisan, serta pemahaman budaya untuk karier di bidang
                                pendidikan, media, kreatif, dan industri global.
                            </p>
                            <div class="mt-3 prodi-cta">
                                <span class="link-more">Selengkapnya <span class="arrow">→</span></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Staf & Dosen ──────────────────────────────────────────── --}}
    @if (isset($stafs) && $stafs->count())
        <section class="py-5 border-bottom" style="background: #fafafa;">
            <div class="container">
                <div class="d-flex align-items-end justify-content-between mb-4 gap-3 flex-wrap">
                    <div class="section-header mb-0">
                        <span class="section-label">Tenaga Pengajar</span>
                        <h2 class="mb-0">Staf & Dosen</h2>
                    </div>
                    <a href="{{ route('staf.index') }}" class="link-more flex-shrink-0">
                        Lihat semua <span class="arrow">→</span>
                    </a>
                </div>

                <div class="row g-4">
                    @foreach ($stafs as $staf)
                        <div class="col-md-3 col-sm-6">
                            <div class="card card-staf card-base h-100 text-center overflow-hidden p-0">
                                @if ($staf->foto)
                                    <img src="{{ asset('storage/' . ltrim($staf->foto, '/')) }}"
                                        alt="{{ $staf->nama }}"
                                        style="height: 240px; width: 100%; object-fit: cover; object-position: top;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center"
                                        style="height: 240px;">
                                        <i class="bi bi-person fs-1 text-muted"></i>
                                    </div>
                                @endif
                                <div class="card-body py-3 px-3">
                                    <h5 class="card-title mb-1" style="font-size: 0.9rem; color: var(--primary-maroon);">
                                        {{ $staf->nama }}
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

    {{-- ── Berita Kampus ─────────────────────────────────────────── --}}
    <section class="py-5 border-bottom">
        <div class="container">
            <div class="d-flex align-items-end justify-content-between mb-4 gap-3 flex-wrap">
                <div class="section-header mb-0">
                    <span class="section-label">Informasi</span>
                    <h2 class="mb-0">Berita Kampus</h2>
                </div>
                @if ($beritaTerbaru->count())
                    <a href="{{ route('berita.index') }}" class="link-more flex-shrink-0">
                        Lihat semua <span class="arrow">→</span>
                    </a>
                @endif
            </div>

            <div class="row g-4">
                @forelse ($beritaTerbaru as $berita)
                    <div class="col-md-4">
                        <div class="card card-berita card-base h-100 overflow-hidden p-0">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}"
                                    class="card-img-top" alt="{{ $berita->judul }}"
                                    style="height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                    style="height: 200px;">
                                    <i class="bi bi-newspaper fs-1 text-muted"></i>
                                </div>
                            @endif
                            <div class="card-body p-4">
                                <p class="card-text small text-muted mb-1">
                                    <i class="bi bi-calendar3 me-1 opacity-75"></i>{{ $berita->tanggal->format('d M Y') }}
                                </p>
                                <h5 class="card-title mb-2" style="font-size: 0.95rem; color: var(--primary-maroon); line-height: 1.4;">
                                    {{ \Illuminate\Support\Str::limit($berita->judul, 65) }}
                                </h5>
                                <p class="card-text small text-muted mb-3" style="line-height: 1.6;">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 90) }}
                                </p>
                                <a href="{{ route('berita.show', $berita->id) }}"
                                    class="link-more stretched-link">
                                    Baca selengkapnya <span class="arrow">→</span>
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

    {{-- ── CTA Pendaftaran ───────────────────────────────────────── --}}
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
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.65);"></div>
        </div>
        <div class="container position-relative" style="z-index:1;">
            <h2 class="fw-bold mb-3" style="font-size: clamp(1.6rem, 3vw, 2.2rem);">
                {{ $heroSettings['cta_title'] ?? 'Ayo Mulai Mendaftar' }}
            </h2>
            <p class="mb-4" style="font-size: 1rem; opacity: 0.88; max-width: 520px; margin-inline: auto; font-family: 'Open Sans', sans-serif;">
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

    {{-- ── Events ────────────────────────────────────────────────── --}}
    @if (count($events) > 0)
        <section class="py-5 border-bottom" style="background: #fafafa;">
            <div class="container">
                <div class="d-flex align-items-end justify-content-between mb-4 gap-3 flex-wrap">
                    <div class="section-header mb-0">
                        <span class="section-label">Kegiatan</span>
                        <h2 class="mb-0">Event Terbaru</h2>
                    </div>
                    <a href="{{ route('events.index') }}" class="link-more flex-shrink-0">
                        Lihat semua <span class="arrow">→</span>
                    </a>
                </div>

                <div class="row g-4">
                    @foreach ($events as $event)
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-event card-base h-100 overflow-hidden p-0">
                                <div class="position-relative">
                                    @if ($event->gambar)
                                        <img src="{{ asset('storage/' . $event->gambar) }}"
                                            alt="{{ $event->judul }}" class="card-img-top"
                                            style="height: 190px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                            style="height: 190px;">
                                            <i class="bi bi-calendar-event fs-1 text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <div class="bg-white rounded-2 shadow-sm text-center px-3 py-2">
                                            <span class="d-block fw-bold" style="font-size: 1.1rem; color: #212529; font-family: 'Playfair Display', serif;">{{ $event->tanggal_mulai->format('d') }}</span>
                                            <span class="d-block text-uppercase fw-bold"
                                                style="color: var(--primary-maroon); font-size: 0.65rem; font-family: 'Open Sans', sans-serif; letter-spacing: 0.05em;">{{ $event->tanggal_mulai->format('M') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <h5 class="card-title mb-1" style="font-size: 0.9rem; color: var(--primary-maroon); line-height: 1.4;">
                                        {{ \Illuminate\Support\Str::limit($event->judul, 52) }}
                                    </h5>
                                    <p class="small text-muted mb-2">
                                        <i class="bi bi-geo-alt me-1 opacity-75"></i>{{ $event->lokasi ?? 'STBA Pontianak' }}
                                    </p>
                                    <a href="{{ route('events.show', $event->id) }}"
                                        class="link-more stretched-link small">
                                        Detail acara <span class="arrow">→</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ── Agenda ────────────────────────────────────────────────── --}}
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-end justify-content-between mb-4 gap-3 flex-wrap">
                <div class="section-header mb-0">
                    <span class="section-label">Kalender</span>
                    <h2 class="mb-0">Agenda Penting</h2>
                </div>
                <a href="{{ route('agenda.index') }}" class="link-more flex-shrink-0">
                    Lihat semua <span class="arrow">→</span>
                </a>
            </div>

            <div class="row g-3">
                @forelse ($agendas as $agenda)
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-agenda card-base h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="agenda-date-box flex-shrink-0 text-center"
                                        style="min-width: 52px; padding: 0.5rem 0.4rem; border: 2px solid rgba(123,30,48,0.15); border-radius: 0.5rem;">
                                        <span class="d-block fw-bold" style="font-size: 1.35rem; line-height: 1; color: var(--primary-maroon); font-family: 'Playfair Display', serif;">{{ $agenda->tanggal_mulai->format('d') }}</span>
                                        <span class="d-block text-uppercase" style="font-size: 0.6rem; font-weight: 700; letter-spacing: 0.06em; color: #6c757d;">{{ $agenda->tanggal_mulai->format('M') }}</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1" style="font-size: 0.9rem; color: #212529; line-height: 1.4;">{{ $agenda->judul }}</h5>
                                        <p class="small text-muted mb-0">
                                            @if ($agenda->tanggal_selesai && $agenda->tanggal_selesai->ne($agenda->tanggal_mulai))
                                                {{ $agenda->tanggal_mulai->format('d M') }} – {{ $agenda->tanggal_selesai->format('d M Y') }}
                                            @else
                                                {{ $agenda->tanggal_mulai->format('d M Y') }}
                                            @endif
                                        </p>
                                        @if ($agenda->deskripsi)
                                            <p class="small text-muted mb-0 mt-1">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($agenda->deskripsi), 70) }}
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
