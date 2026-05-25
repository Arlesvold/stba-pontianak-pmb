@extends('layouts.pmb')

@section('title', $event->judul . ' - STBA Pontianak')

@section('content')

{{-- Event header --}}
<section style="background: var(--paper-2); border-bottom: 1px solid var(--rule);">
    <div class="wrap-narrow" style="padding-top: 52px; padding-bottom: 44px;">
        <div class="crumb mb-5">
            <a href="{{ route('beranda') }}">Beranda</a>
            <span class="sep">/</span>
            <a href="{{ route('events.index') }}">Event</a>
            <span class="sep">/</span>
            <span>Detail Event</span>
        </div>

        <span class="tag-pill mb-4" style="display: inline-block;">Event Kampus</span>

        <h1 style="font-family: var(--font-display); font-weight: 600; font-size: clamp(1.8rem, 3.5vw, 2.6rem); color: var(--ink); line-height: 1.15; letter-spacing: -0.02em; margin-bottom: 24px;">
            {{ $event->judul }}
        </h1>

        {{-- Meta --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 16px; margin-top: 28px; padding-top: 24px; border-top: 1px solid var(--rule);">
            <div>
                <div class="mono mb-1" style="font-size: 0.62rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--maroon);">Tanggal Mulai</div>
                <div class="h-card" style="font-size: 0.95rem; color: var(--ink);">{{ $event->tanggal_mulai->translatedFormat('d F Y') }}</div>
            </div>
            @if ($event->tanggal_selesai)
                <div>
                    <div class="mono mb-1" style="font-size: 0.62rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--maroon);">Tanggal Selesai</div>
                    <div class="h-card" style="font-size: 0.95rem; color: var(--ink);">{{ $event->tanggal_selesai->translatedFormat('d F Y') }}</div>
                </div>
            @endif
            <div>
                <div class="mono mb-1" style="font-size: 0.62rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--maroon);">Lokasi</div>
                <div class="h-card" style="font-size: 0.95rem; color: var(--ink);">{{ $event->lokasi ?? 'Kampus STBA Pontianak' }}</div>
            </div>
        </div>
    </div>
</section>

{{-- Cover image --}}
@if ($event->gambar)
    <section style="background: var(--paper); padding-top: 40px;">
        <div class="wrap-narrow">
            <img src="{{ asset('storage/' . $event->gambar) }}" alt="{{ $event->judul }}"
                style="width: 100%; max-height: 420px; object-fit: cover; display: block; border: 1px solid var(--rule-soft);">
        </div>
    </section>
@endif

{{-- Event body --}}
<section style="background: var(--paper); padding: 56px 0 80px;">
    <div class="wrap-narrow">
        <h3 class="h-display mb-4" style="font-size: 1.3rem; color: var(--ink); border-bottom: 1px solid var(--rule); padding-bottom: 16px;">Deskripsi Kegiatan</h3>
        <div style="font-size: 1rem; line-height: 1.85; color: var(--ink-2); max-width: 720px;">
            {!! $event->deskripsi !!}
        </div>

        <div style="margin-top: 48px; padding-top: 28px; border-top: 1px solid var(--rule);">
            <a href="{{ route('events.index') }}" class="link-more">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Event
            </a>
        </div>
    </div>
</section>
@endsection
