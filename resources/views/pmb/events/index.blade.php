@extends('layouts.pmb')

@section('title', 'Event Kampus - STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_event.css') }}">
@endpush

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
    <div class="page-hero-inner">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <div class="crumb mb-4">
                    <a href="{{ route('beranda') }}">Beranda</a>
                    <span class="sep">/</span>
                    <span>Event Kampus</span>
                </div>
                <h1>Event &amp; <em>kegiatan</em> kampus.</h1>
                <p class="hero-subtitle">Kegiatan akademik, kebudayaan, dan pelatihan yang diselenggarakan STBA Pontianak dan terbuka untuk umum.</p>
            </div>
            <span class="page-hero-mark d-none d-md-inline-block mt-1">EVENT / KAMPUS</span>
        </div>
    </div>
</div>

<div id="event-page" style="background: var(--paper);">
    <div class="container py-5">

        <div class="row g-4">
            @forelse ($events as $event)
                <div class="col-md-4">
                    <article style="background: var(--paper-warm); border: 1px solid var(--rule-soft);">
                        <div style="position: relative; overflow: hidden;">
                            @if ($event->gambar)
                                <img src="{{ asset('storage/' . $event->gambar) }}"
                                    loading="lazy"
                                    alt="{{ $event->judul }}"
                                    style="width: 100%; height: 210px; object-fit: cover; display: block;">
                            @else
                                <div class="ph" style="height: 210px;"></div>
                            @endif
                            <div style="position: absolute; top: 14px; right: 14px;">
                                <div class="date-block">
                                    <span class="d">{{ $event->tanggal_mulai->format('d') }}</span>
                                    <span class="m">{{ $event->tanggal_mulai->format('M') }}</span>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 22px 22px 24px;">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <span class="tag-pill">Event</span>
                            </div>
                            <h5 class="h-card mb-2" style="font-size: 1rem; color: var(--ink); line-height: 1.35;">
                                <a href="{{ route('events.show', $event->id) }}" class="text-decoration-none" style="color: inherit;">
                                    {{ \Illuminate\Support\Str::limit($event->judul, 60) }}
                                </a>
                            </h5>
                            <div style="display: flex; flex-direction: column; gap: 6px; padding-top: 14px; border-top: 1px solid var(--rule-soft); font-size: 0.8rem; color: var(--muted);">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <i class="bi bi-geo-alt"></i>
                                    <span>{{ \Illuminate\Support\Str::limit($event->lokasi ?? 'STBA Pontianak', 40) }}</span>
                                </div>
                            </div>
                            <a href="{{ route('events.show', $event->id) }}" class="link-more mt-3 d-inline-flex">
                                Detail event <span class="arr">&#8594;</span>
                            </a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 py-5 text-center" style="color: var(--muted);">
                    <i class="bi bi-calendar-x" style="font-size: 3rem; display: block; margin-bottom: 16px; opacity: 0.3;"></i>
                    <p class="mb-0" style="font-size: 0.9rem;">Belum ada event yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        @if ($events->hasPages())
            <div class="mt-5 d-flex justify-content-between align-items-center flex-wrap gap-2 pt-3" style="border-top: 1px solid var(--rule);">
                <div class="mono" style="font-size: 0.65rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--muted);">
                    Menampilkan {{ $events->firstItem() }}&ndash;{{ $events->lastItem() }}
                    dari {{ $events->total() }} event
                </div>
                <nav class="custom-pagination">
                    {{ $events->links('pagination::simple-bootstrap-5') }}
                </nav>
            </div>
        @endif

    </div>
</div>
@endsection
