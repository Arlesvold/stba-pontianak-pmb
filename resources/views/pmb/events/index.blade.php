@extends('layouts.pmb')

@section('title', 'Event STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_event.css') }}">
@endpush

@section('content')
    <div id="event-page">
        <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="color: var(--primary-maroon);">Event Kampus</h1>
            <p class="text-muted">Kegiatan terbaru yang diselenggarakan oleh STBA Pontianak</p>
        </div>

        <div class="row g-4">
            @forelse ($events as $event)
                <div class="col-md-4">
                    <div class="card card-event h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        <div class="position-relative">
                            @if ($event->gambar)
                                <img src="{{ asset('storage/' . $event->gambar) }}" alt="{{ $event->judul }}"
                                    class="card-img-top" style="height: 220px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                    style="height: 220px; color: #aaa;">
                                    <i class="bi bi-calendar-event fs-1"></i>
                                </div>
                            @endif
                            <div class="position-absolute top-0 end-0 m-3 bg-white rounded px-2 py-1 shadow-sm text-center"
                                style="min-width: 50px;">
                                <div class="fw-bold text-danger">{{ $event->tanggal_mulai->format('d') }}</div>
                                <small class="text-uppercase" style="font-size: 0.7rem;">
                                    {{ $event->tanggal_mulai->format('M') }}
                                </small>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-2">
                                <a href="{{ route('events.show', $event->id) }}"
                                    class="text-decoration-none text-dark stretched-link">
                                    {{ \Illuminate\Support\Str::limit($event->judul, 40) }}
                                </a>
                            </h5>
                            <div class="d-flex align-items-center text-muted small mb-3">
                                <i class="bi bi-geo-alt me-2"></i>
                                {{ $event->lokasi ?? 'Kampus STBA Pontianak' }}
                            </div>
                            <p class="card-text text-muted small">
                                {{ $event->deskripsi_singkat ? \Illuminate\Support\Str::limit($event->deskripsi_singkat, 60) : \Illuminate\Support\Str::limit(strip_tags($event->deskripsi), 60) }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 py-5 text-center">
                    <div class="text-muted">
                        <i class="bi bi-calendar-x display-4 mb-3 d-block"></i>
                        Belum ada event event yang tersedia saat ini.
                    </div>
                </div>
            @endforelse
        </div>

        @if ($events->hasPages())
                <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap gap-2">

                    {{-- Info jumlah data --}}
                    <div class="text-muted small">
                        Showing {{ $events->firstItem() }} to {{ $events->lastItem() }}
                        of {{ $events->total() }} results
                    </div>

                    {{-- Pagination --}}
                    <nav class="custom-pagination">
                        {{ $events->links('pagination::simple-bootstrap-5') }}
                    </nav>

                </div>
            @endif
    </div>
    </div>
@endsection
