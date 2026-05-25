@extends('layouts.pmb')

@section('title', 'Berita Kampus - STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_berita.css') }}">
@endpush

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
    <div class="page-hero-inner">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <div class="page-hero crumb mb-4" style="background: none; padding: 0; border: none;">
                    <a href="{{ route('beranda') }}">Beranda</a>
                    <span class="sep">/</span>
                    <span>Berita Kampus</span>
                </div>
                <h1>Jurnal kampus &mdash; kabar dari <em>ruang belajar</em> kami.</h1>
                <p class="hero-subtitle">Catatan kegiatan, prestasi, dan informasi terbaru dari sivitas akademika STBA Pontianak.</p>
            </div>
            <span class="page-hero-mark d-none d-md-inline-block mt-1">ARSIP / BERITA</span>
        </div>
    </div>
</div>

<div id="berita-page" style="background: var(--paper);">
    <div class="container py-5">
        @forelse ($beritas as $berita)
            <a href="{{ route('berita.show', $berita->id) }}" class="d-block text-decoration-none mb-0"
               style="display: grid !important; grid-template-columns: 280px 1fr; gap: 0; border-bottom: 1px solid var(--rule-soft); padding: 32px 0;">
                <div style="overflow: hidden;">
                    @if ($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                            style="width: 100%; height: 200px; object-fit: cover; display: block; border: 1px solid var(--rule-soft);">
                    @else
                        <div class="ph" style="height: 200px; width: 100%;"></div>
                    @endif
                </div>
                <div style="padding: 8px 0 8px 36px; display: flex; flex-direction: column; justify-content: center;">
                    <div class="mono mb-2" style="font-size: 0.65rem; letter-spacing: 0.12em; text-transform: uppercase; color: var(--muted);">
                        <i class="bi bi-calendar3 me-1 opacity-75"></i>{{ $berita->tanggal->translatedFormat('d F Y') }}
                    </div>
                    <h2 class="h-card mb-2" style="font-size: 1.15rem; color: var(--ink); line-height: 1.35;">
                        {{ \Illuminate\Support\Str::limit($berita->judul, 90) }}
                    </h2>
                    <p style="color: var(--muted); font-size: 0.875rem; line-height: 1.65; margin-bottom: 16px;">
                        {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 150) }}
                    </p>
                    <span class="link-more">Baca selengkapnya <span class="arr">&#8594;</span></span>
                </div>
            </a>

        @empty
            <div class="py-5 text-center" style="color: var(--muted);">
                <i class="bi bi-newspaper" style="font-size: 3rem; display: block; margin-bottom: 16px; opacity: 0.3;"></i>
                <p class="mb-0">Belum ada berita yang tersedia.</p>
            </div>
        @endforelse

        @if ($beritas->hasPages())
            <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap gap-2 pt-3">
                <div class="mono" style="font-size: 0.65rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--muted);">
                    Menampilkan {{ $beritas->firstItem() }}&ndash;{{ $beritas->lastItem() }}
                    dari {{ $beritas->total() }} berita
                </div>
                <nav class="custom-pagination">
                    {{ $beritas->links('pagination::simple-bootstrap-5') }}
                </nav>
            </div>
        @endif
    </div>
</div>
@endsection
