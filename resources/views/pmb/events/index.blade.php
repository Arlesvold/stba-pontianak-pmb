@extends('layouts.pmb')

@section('title', 'Event Kampus - STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_event.css') }}">
@endpush

@section('content')

{{-- Page Header --}}
<div style="background: linear-gradient(135deg, #fef2f4 0%, #f7d9df 100%); border-bottom: 1px solid #f0c6d0;">
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-2">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('beranda') }}" class="text-decoration-none" style="color: var(--primary-maroon);">Beranda</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Event Kampus</li>
            </ol>
        </nav>
        <h1 class="fw-bold mb-1" style="color: var(--primary-maroon); font-size: 1.75rem;">Event Kampus</h1>
        <p class="text-muted mb-0 small">Kegiatan terbaru yang diselenggarakan oleh STBA Pontianak.</p>
    </div>
</div>

<div id="event-page">
    <div class="container py-5">

        <div class="row g-4">
            @forelse ($events as $event)
                <div class="col-md-4">
                    <div class="card card-event h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                        <div class="position-relative">
                            @if ($event->gambar)
                                <img src="{{ asset('storage/' . $event->gambar) }}"
                                    loading="lazy"
                                    class="card-img-top"
                                    alt="{{ $event->judul }}"
                                    style="height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                    style="height: 200px; color: #adb5bd;">
                                    <i class="bi bi-calendar-event" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                            <div class="position-absolute top-0 end-0 m-3 bg-white rounded-2 px-2 py-1 shadow-sm text-center"
                                style="min-width: 50px; line-height: 1.2;">
                                <div class="fw-bold small" style="color: var(--primary-maroon);">{{ $event->tanggal_mulai->format('d') }}</div>
                                <div class="text-uppercase" style="font-size: 0.65rem; color: #6c757d;">
                                    {{ $event->tanggal_mulai->format('M') }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-2" style="font-size: 0.95rem;">
                                <a href="{{ route('events.show', $event->id) }}"
                                    class="text-decoration-none text-dark stretched-link">
                                    {{ \Illuminate\Support\Str::limit($event->judul, 55) }}
                                </a>
                            </h5>
                            <div class="d-flex align-items-center small mb-2" style="color: #6c757d;">
                                <i class="bi bi-geo-alt me-1"></i>
                                {{ \Illuminate\Support\Str::limit($event->lokasi ?? 'Kampus STBA Pontianak', 40) }}
                            </div>
                            <p class="small text-muted mb-0" style="line-height: 1.5;">
                                {{ \Illuminate\Support\Str::limit($event->deskripsi_singkat ?: strip_tags($event->deskripsi), 80) }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 py-5 text-center text-muted">
                    <i class="bi bi-calendar-x display-4 d-block mb-3" style="color: #dee2e6;"></i>
                    <p class="mb-0">Belum ada event yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        @if ($events->hasPages())
            <div class="mt-5 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div class="text-muted small">
                    Menampilkan {{ $events->firstItem() }}–{{ $events->lastItem() }}
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
