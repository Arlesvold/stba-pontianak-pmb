@extends('layouts.pmb')

@section('title', $berita->judul . ' - Berita STBA Pontianak')

@section('content')

{{-- Article header --}}
<section style="background: var(--paper-2); border-bottom: 1px solid var(--rule);">
    <div class="wrap-narrow" style="padding-top: 52px; padding-bottom: 44px;">
        <div class="crumb mb-5">
            <a href="{{ route('beranda') }}">Beranda</a>
            <span class="sep">/</span>
            <a href="{{ route('berita.index') }}">Berita Kampus</a>
            <span class="sep">/</span>
            <span>Detail Berita</span>
        </div>

        <span class="tag-pill mb-4" style="display: inline-block;">Berita Kampus</span>

        <h1 style="font-family: var(--font-display); font-weight: 600; font-size: clamp(2rem, 4vw, 3rem); color: var(--ink); line-height: 1.1; letter-spacing: -0.02em; margin-bottom: 24px;">
            {{ $berita->judul }}
        </h1>

        <div style="display: flex; align-items: center; gap: 20px; font-size: 0.82rem; color: var(--muted); flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <i class="bi bi-calendar3"></i>
                <span class="mono" style="letter-spacing: 0.1em; text-transform: uppercase; font-size: 0.65rem;">{{ $berita->tanggal->translatedFormat('d F Y') }}</span>
            </div>
            <div style="width: 1px; height: 16px; background: var(--rule);"></div>
            <div style="display: flex; align-items: center; gap: 8px;">
                <i class="bi bi-clock"></i>
                <span>{{ $berita->updated_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</section>

{{-- Cover image --}}
@if ($berita->gambar)
    <section style="background: var(--paper); padding-top: 40px;">
        <div class="wrap-narrow">
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                style="width: 100%; max-height: 480px; object-fit: cover; display: block; border: 1px solid var(--rule-soft);">
        </div>
    </section>
@endif

{{-- Article body --}}
<section style="background: var(--paper); padding: 56px 0 80px;">
    <div class="wrap-narrow">
        <div class="news-content" style="font-size: 1.02rem; line-height: 1.85; color: var(--ink-2); max-width: 720px;">
            {!! $berita->isi !!}
        </div>

        <div style="margin-top: 48px; padding-top: 28px; border-top: 1px solid var(--rule);">
            <a href="{{ route('berita.index') }}" class="link-more">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Berita
            </a>
        </div>
    </div>
</section>

<style>
    .news-content img { max-width: 100%; height: auto; margin: 1.5rem 0; border: 1px solid var(--rule-soft); }
    .news-content h2, .news-content h3 { font-family: var(--font-display); color: var(--ink); margin-top: 2rem; }
    .news-content p { margin-bottom: 1.25rem; }
    .news-content a { color: var(--maroon); }
    .news-content blockquote { border-left: 3px solid var(--maroon); padding: 24px 24px 24px 28px; background: var(--paper-warm); margin: 32px 0; font-style: italic; font-family: var(--font-display); font-size: 1.1rem; }
</style>
@endsection
