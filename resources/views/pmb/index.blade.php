@extends('layouts.pmb')

@section('title', 'Portal Resmi PMB STBA Pontianak')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/pmb_index.css') }}">
@endpush

@section('content')
<div id="pmb-page">

    {{-- ── Hero ──────────────────────────────────────────────────── --}}
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    {{-- Badge --}}
                    <div class="hero-badge mb-4">
                        <span style="color:var(--gold);">&#9670;</span>
                        <span>{{ $heroSettings['hero_badge_label'] ?? 'Penerimaan Mahasiswa Baru' }}</span>
                        &mdash;
                        <span>TA {{ $heroSettings['hero_tahun_akademik'] ?? '2025/2026' }}</span>
                    </div>

                    <h1 class="hero-title mb-4">
                        {!! nl2br(e($heroSettings['hero_title'] ?? "Bahasa adalah\njembatan menuju\nkarier global.")) !!}
                    </h1>

                    <p class="hero-subtitle mb-4">
                        {{ $heroSettings['hero_subtitle'] ?? 'Bergabunglah dengan kampus bahasa terpercaya di Kalimantan Barat. Program D3 dan S1 Bahasa Inggris dengan pengajar berpengalaman dan kurikulum berbasis industri.' }}
                    </p>

                    <div class="d-flex flex-wrap gap-2 mb-5">
                        @auth
                            <a href="{{ route('pmb.daftar') }}" class="btn btn-maroon px-4 py-2">Isi Formulir Pendaftaran</a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-maroon px-4 py-2">Daftar Sekarang</a>
                        @endauth
                        <a href="{{ route('prodi.s1') }}" class="btn btn-outline-maroon px-4 py-2">Lihat Program Studi</a>
                    </div>

                    {{-- Stats strip --}}
                    <div class="d-flex gap-0" style="border-top: 1px solid var(--rule); padding-top: 28px; margin-top: 8px;">
                        @foreach([['34+', 'Tahun Berdiri'], ['1.200+', 'Alumni'], ['97%', 'Tepat Waktu Lulus']] as $i => $s)
                            <div style="flex:1; {{ $i > 0 ? 'border-left: 1px solid var(--rule); padding-left: 28px;' : '' }} {{ $i < 2 ? 'padding-right: 28px;' : '' }}">
                                <div class="h-display" style="font-size: clamp(1.6rem, 3vw, 2rem); color: var(--maroon);">{{ $s[0] }}</div>
                                <div class="mono" style="font-size: 0.65rem; letter-spacing: 0.16em; text-transform: uppercase; color: var(--muted); margin-top: 4px;">{{ $s[1] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-5 d-none d-lg-block">
                    @php
                        $heroImg = !empty($heroSettings['hero_image'])
                            ? asset('storage/' . $heroSettings['hero_image'])
                            : asset('images/hero1.jpg');
                    @endphp
                    <div style="position: relative;">
                        <img src="{{ $heroImg }}" alt="Kampus STBA Pontianak"
                            style="width: 100%; aspect-ratio: 3/4; object-fit: cover; display: block; border: 1px solid var(--rule);">
                        {{-- Floating caption --}}
                        <div style="position: absolute; bottom: 0; left: -24px; background: var(--ink); color: var(--paper); padding: 18px 22px; max-width: 260px;">
                            <div class="mono" style="font-size: 0.6rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--gold-soft); margin-bottom: 6px;">&#8627; Kampus Utama</div>
                            <div style="font-family: var(--font-display); font-size: 0.95rem; line-height: 1.3; color: var(--paper);">STBA Pontianak<br><span style="font-size: 0.8rem; color: rgba(250,245,236,0.65);">Jl. Gajahmada No. 38</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Program Studi ─────────────────────────────────────────── --}}
    <section style="background: var(--paper); border-bottom: 1px solid var(--rule); padding: 80px 0;">
        <div class="container">
            <div class="d-flex align-items-end justify-content-between mb-5 gap-3 flex-wrap" style="border-bottom: 1.5px solid var(--ink); padding-bottom: 20px;">
                <div>
                    <div class="section-num mb-2">&#8627; 01 &mdash; Program Studi</div>
                    <h2 class="h-display mb-0" style="font-size: clamp(1.8rem, 3vw, 2.4rem);">Pilih jalur Anda.</h2>
                </div>
                <span class="mono" style="font-size: 0.68rem; color: var(--muted); letter-spacing: 0.14em; text-transform: uppercase;">2 Program Unggulan</span>
            </div>

            <div class="row g-0">
                {{-- D3 --}}
                <div class="col-md-6" style="border-right: 1px solid var(--rule);">
                    <a href="{{ route('prodi.d3') }}" class="d-block text-decoration-none p-5 prodi-card-link" style="border-bottom: 1px solid var(--rule-soft);">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 32px;">
                            <div>
                                <div class="tag-pill mb-3">Diploma</div>
                                <div class="mono" style="font-size: 0.6rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted);">3 Tahun &middot; D3</div>
                            </div>
                            <div class="prodi-ghost-code" style="font-family: var(--font-display); font-size: 5rem; font-weight: 700; color: rgba(123,30,48,0.07); line-height: 1; letter-spacing: -0.04em; user-select: none;">D3</div>
                        </div>
                        <h3 class="h-card mb-3" style="font-size: 1.5rem; color: var(--ink);">Bahasa Inggris</h3>
                        <p style="color: var(--muted); font-size: 0.9rem; line-height: 1.7; margin-bottom: 24px;">
                            Program tiga tahun yang menekankan keterampilan komunikasi profesional, perkantoran,
                            pariwisata, dan layanan internasional berbasis bahasa Inggris.
                        </p>
                        <div class="d-flex gap-2 flex-wrap mb-3">
                            <span style="font-family: var(--font-mono); font-size: 0.62rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--muted);">&#8627; Peminatan:</span>
                        </div>
                        <div class="d-flex gap-2 flex-wrap">
                            @foreach(['Bisnis & Perkantoran', 'Pariwisata', 'Sekretaris'] as $p)
                                <span style="font-family: var(--font-mono); font-size: 0.62rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--ink-2); padding: 3px 8px; border: 1px solid var(--rule);">{{ $p }}</span>
                            @endforeach
                        </div>
                        <div class="link-more mt-4">Pelajari D3 <span class="arr">&#8594;</span></div>
                    </a>
                </div>

                {{-- S1 --}}
                <div class="col-md-6">
                    <a href="{{ route('prodi.s1') }}" class="d-block text-decoration-none p-5 prodi-card-link" style="background: var(--paper-warm); border-bottom: 1px solid var(--rule-soft);">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 32px;">
                            <div>
                                <div class="tag-pill mb-3">Sarjana</div>
                                <div class="mono" style="font-size: 0.6rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted);">4 Tahun &middot; S1</div>
                            </div>
                            <div class="prodi-ghost-code" style="font-family: var(--font-display); font-size: 5rem; font-weight: 700; color: rgba(123,30,48,0.07); line-height: 1; letter-spacing: -0.04em; user-select: none;">S1</div>
                        </div>
                        <h3 class="h-card mb-3" style="font-size: 1.5rem; color: var(--ink);">Sastra Inggris</h3>
                        <p style="color: var(--muted); font-size: 0.9rem; line-height: 1.7; margin-bottom: 24px;">
                            Program sarjana empat tahun yang menggali bahasa, sastra, dan budaya berbahasa Inggris
                            &mdash; disiapkan untuk karier akademik, kreatif, dan industri global.
                        </p>
                        <div class="d-flex gap-2 flex-wrap mb-3">
                            <span style="font-family: var(--font-mono); font-size: 0.62rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--muted);">&#8627; Peminatan:</span>
                        </div>
                        <div class="d-flex gap-2 flex-wrap">
                            @foreach(['Translation', 'ELT', 'Literary Studies'] as $p)
                                <span style="font-family: var(--font-mono); font-size: 0.62rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--ink-2); padding: 3px 8px; border: 1px solid var(--rule);">{{ $p }}</span>
                            @endforeach
                        </div>
                        <div class="link-more mt-4">Pelajari S1 <span class="arr">&#8594;</span></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Staf & Dosen ──────────────────────────────────────────── --}}
    @if (isset($stafs) && $stafs->count())
        <section style="background: var(--paper-2); border-bottom: 1px solid var(--rule); padding: 80px 0;">
            <div class="container">
                <div class="d-flex align-items-end justify-content-between mb-5 gap-3 flex-wrap" style="border-bottom: 1.5px solid var(--ink); padding-bottom: 20px;">
                    <div>
                        <div class="section-num mb-2">&#8627; 02 &mdash; Tenaga Pengajar</div>
                        <h2 class="h-display mb-0" style="font-size: clamp(1.8rem, 3vw, 2.4rem);">Akademik &amp; Pengajaran</h2>
                    </div>
                    <a href="{{ route('staf.index') }}" class="link-more flex-shrink-0">Lihat semua <span class="arr">&#8594;</span></a>
                </div>

                <div class="row g-4">
                    @foreach ($stafs as $staf)
                        <div class="col-md-3 col-6">
                            <a href="{{ route('staf.index') }}" class="d-block text-decoration-none staf-card-link"
                               style="background: var(--paper-warm); border: 1px solid var(--rule-soft); position: relative; overflow: hidden;">
                                @if ($staf->foto)
                                    <img src="{{ asset('storage/' . ltrim($staf->foto, '/')) }}"
                                        alt="{{ $staf->nama }}"
                                        style="width: 100%; aspect-ratio: 3/4; object-fit: cover; object-position: top; display: block;">
                                @else
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="width: 100%; aspect-ratio: 3/4; background: var(--paper-3); color: var(--maroon);">
                                        <i class="bi bi-person" style="font-size: 3rem;"></i>
                                    </div>
                                @endif
                                <div style="padding: 18px 18px 20px;">
                                    <h5 class="h-card mb-1" style="font-size: 0.9rem; color: var(--ink);">{{ $staf->nama }}</h5>
                                    @if ($staf->posisi)
                                        <p class="mono mb-0" style="font-size: 0.65rem; letter-spacing: 0.12em; text-transform: uppercase; color: var(--muted);">{{ $staf->posisi }}</p>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ── Berita Kampus ─────────────────────────────────────────── --}}
    <section style="background: var(--paper); border-bottom: 1px solid var(--rule); padding: 80px 0;">
        <div class="container">
            <div class="d-flex align-items-end justify-content-between mb-5 gap-3 flex-wrap" style="border-bottom: 1.5px solid var(--ink); padding-bottom: 20px;">
                <div>
                    <div class="section-num mb-2">&#8627; 03 &mdash; Informasi</div>
                    <h2 class="h-display mb-0" style="font-size: clamp(1.8rem, 3vw, 2.4rem);">Berita Kampus</h2>
                </div>
                @if ($beritaTerbaru->count())
                    <a href="{{ route('berita.index') }}" class="link-more flex-shrink-0">Semua berita <span class="arr">&#8594;</span></a>
                @endif
            </div>

            @if ($beritaTerbaru->count())
                {{-- Featured + side list layout --}}
                <div class="row g-5">
                    <div class="col-lg-7">
                        @php $featured = $beritaTerbaru->first(); @endphp
                        <article>
                            @if ($featured->gambar)
                                <img src="{{ asset('storage/' . $featured->gambar) }}"
                                    alt="{{ $featured->judul }}"
                                    style="width: 100%; height: 340px; object-fit: cover; display: block; border: 1px solid var(--rule-soft);">
                            @else
                                <div class="ph" style="height: 340px;"></div>
                            @endif
                            <div style="padding-top: 24px;">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <span class="tag-pill">Berita</span>
                                    <span style="width: 3px; height: 3px; background: var(--muted-2); border-radius: 50%;"></span>
                                    <span class="mono" style="font-size: 0.65rem; letter-spacing: 0.12em; color: var(--muted); text-transform: uppercase;">{{ $featured->tanggal->format('d M Y') }}</span>
                                </div>
                                <h2 class="h-display mb-3" style="font-size: clamp(1.3rem, 2.5vw, 1.75rem);">{{ $featured->judul }}</h2>
                                <p style="color: var(--ink-2); line-height: 1.7; margin-bottom: 20px;">{{ \Illuminate\Support\Str::limit(strip_tags($featured->isi), 160) }}</p>
                                <a href="{{ route('berita.show', $featured->id) }}" class="link-more">Baca selengkapnya <span class="arr">&#8594;</span></a>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-5">
                        <div class="mono mb-4" style="font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--maroon); padding-bottom: 14px; border-bottom: 1px solid var(--rule);">
                            &#8627; Terkini lainnya
                        </div>
                        @foreach ($beritaTerbaru->skip(1) as $berita)
                            <a href="{{ route('berita.show', $berita->id) }}" class="d-block text-decoration-none"
                               style="padding: 20px 0; {{ !$loop->last ? 'border-bottom: 1px solid var(--rule-soft);' : '' }}">
                                <div class="mono mb-2" style="font-size: 0.62rem; letter-spacing: 0.12em; color: var(--muted); text-transform: uppercase;">{{ $berita->tanggal->format('d M Y') }}</div>
                                <h5 class="h-card mb-0" style="font-size: 0.9rem; color: var(--ink); line-height: 1.4;">{{ \Illuminate\Support\Str::limit($berita->judul, 80) }}</h5>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-center" style="color: var(--muted); font-size: 0.9rem;">Belum ada berita kampus.</p>
            @endif
        </div>
    </section>

    {{-- ── CTA Pendaftaran ───────────────────────────────────────── --}}
    <section style="background: var(--maroon); padding: 80px 0; position: relative; overflow: hidden;">
        {{-- Decorative leaf lines --}}
        <div style="position: absolute; top: 0; right: 0; width: 200px; height: 200px; border: 60px solid rgba(250,245,236,0.04); border-radius: 50%; transform: translate(50%,-50%); pointer-events: none;"></div>
        <div style="position: absolute; bottom: 0; left: 0; width: 120px; height: 120px; border: 36px solid rgba(250,245,236,0.04); border-radius: 50%; transform: translate(-40%,40%); pointer-events: none;"></div>

        <div class="container" style="position: relative; z-index: 1;">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <div class="mono mb-3" style="font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--gold-soft);">&#8627; Pendaftaran PMB</div>
                    <h2 style="font-family: var(--font-display); font-size: clamp(1.8rem, 3.5vw, 2.8rem); color: var(--paper); line-height: 1.1; letter-spacing: -0.02em; margin-bottom: 20px;">
                        <em style="font-style: italic; color: var(--gold-soft);">{{ $heroSettings['cta_title'] ?? 'Ayo mulai mendaftar' }}</em> — sebelum kuota penuh.
                    </h2>
                    <p style="color: rgba(250,245,236,0.75); font-size: 1rem; line-height: 1.7; max-width: 560px; margin-bottom: 0;">
                        {{ $heroSettings['cta_subtitle'] ?? 'Penerimaan mahasiswa baru STBA Pontianak tersedia dalam dua gelombang. Segera lengkapi berkas dan ajukan pendaftaran Anda.' }}
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    @auth
                        <a href="{{ route('pmb.daftar') }}" class="btn d-inline-block"
                           style="background: var(--paper); color: var(--maroon); font-weight: 700; padding: 14px 32px; border-radius: 0; font-family: var(--font-body); font-size: 0.9rem;">
                            Isi Formulir &#8594;
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn d-inline-block"
                           style="background: var(--paper); color: var(--maroon); font-weight: 700; padding: 14px 32px; border-radius: 0; font-family: var(--font-body); font-size: 0.9rem;">
                            Daftar Akun Sekarang &#8594;
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    {{-- ── Events ────────────────────────────────────────────────── --}}
    @if (count($events) > 0)
        <section style="background: var(--paper-2); border-bottom: 1px solid var(--rule); padding: 80px 0;">
            <div class="container">
                <div class="d-flex align-items-end justify-content-between mb-5 gap-3 flex-wrap" style="border-bottom: 1.5px solid var(--ink); padding-bottom: 20px;">
                    <div>
                        <div class="section-num mb-2">&#8627; 04 &mdash; Kegiatan</div>
                        <h2 class="h-display mb-0" style="font-size: clamp(1.8rem, 3vw, 2.4rem);">Event Kampus</h2>
                    </div>
                    <a href="{{ route('events.index') }}" class="link-more flex-shrink-0">Semua event <span class="arr">&#8594;</span></a>
                </div>

                <div class="row g-4">
                    @foreach ($events as $event)
                        <div class="col-md-3 col-sm-6">
                            <article style="background: var(--paper-warm); border: 1px solid var(--rule-soft);" class="event-card-link">
                                <div style="position: relative; overflow: hidden;">
                                    @if ($event->gambar)
                                        <img src="{{ asset('storage/' . $event->gambar) }}"
                                            alt="{{ $event->judul }}"
                                            style="width: 100%; height: 200px; object-fit: cover; display: block;">
                                    @else
                                        <div class="ph" style="height: 200px;"></div>
                                    @endif
                                    <div style="position: absolute; top: 12px; right: 12px;">
                                        <div class="date-block">
                                            <span class="d">{{ $event->tanggal_mulai->format('d') }}</span>
                                            <span class="m">{{ $event->tanggal_mulai->format('M') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div style="padding: 20px 20px 22px;">
                                    <h5 class="h-card mb-2" style="font-size: 0.95rem; color: var(--ink);">{{ \Illuminate\Support\Str::limit($event->judul, 52) }}</h5>
                                    <p class="mono mb-3" style="font-size: 0.62rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted);">
                                        <i class="bi bi-geo-alt me-1"></i>{{ $event->lokasi ?? 'STBA Pontianak' }}
                                    </p>
                                    <a href="{{ route('events.show', $event->id) }}" class="link-more">
                                        Detail <span class="arr">&#8594;</span>
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ── Agenda ────────────────────────────────────────────────── --}}
    <section style="background: var(--paper); padding: 80px 0;">
        <div class="container">
            <div class="d-flex align-items-end justify-content-between mb-5 gap-3 flex-wrap" style="border-bottom: 1.5px solid var(--ink); padding-bottom: 20px;">
                <div>
                    <div class="section-num mb-2">&#8627; 05 &mdash; Kalender</div>
                    <h2 class="h-display mb-0" style="font-size: clamp(1.8rem, 3vw, 2.4rem);">Agenda Penting</h2>
                </div>
                <a href="{{ route('agenda.index') }}" class="link-more flex-shrink-0">Semua agenda <span class="arr">&#8594;</span></a>
            </div>

            @forelse ($agendas as $agenda)
                <div style="display: grid; grid-template-columns: 100px 1fr auto; gap: 28px; padding: 24px 0; align-items: start; border-bottom: 1px solid var(--rule-soft);">
                    <div style="display: flex; align-items: baseline; gap: 6px;">
                        <span class="h-display" style="font-size: clamp(2.2rem, 4vw, 3rem); color: var(--maroon); line-height: 1; letter-spacing: -0.04em;">{{ $agenda->tanggal_mulai->format('d') }}</span>
                        @if ($agenda->tanggal_selesai && $agenda->tanggal_selesai->ne($agenda->tanggal_mulai))
                            <span class="h-display" style="font-size: 1.4rem; color: var(--maroon); line-height: 1; opacity: 0.5;">&ndash;{{ $agenda->tanggal_selesai->format('d') }}</span>
                        @endif
                    </div>
                    <div>
                        <div class="mono mb-1" style="font-size: 0.62rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--muted);">{{ $agenda->tanggal_mulai->format('F Y') }}</div>
                        <h5 class="h-card mb-1" style="font-size: 1rem; color: var(--ink);">{{ $agenda->judul }}</h5>
                        @if ($agenda->deskripsi)
                            <p style="color: var(--muted); font-size: 0.875rem; margin-bottom: 0; line-height: 1.6;">{{ \Illuminate\Support\Str::limit(strip_tags($agenda->deskripsi), 120) }}</p>
                        @endif
                    </div>
                    <a href="{{ route('agenda.index') }}" class="link-more" style="font-size: 0.78rem;">Detail <span class="arr">&#8594;</span></a>
                </div>
            @empty
                <p style="color: var(--muted); font-size: 0.9rem; text-align: center; padding: 40px 0;">Belum ada agenda yang ditampilkan.</p>
            @endforelse
        </div>
    </section>

</div>
@endsection
