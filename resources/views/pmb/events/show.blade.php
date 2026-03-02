@extends('layouts.pmb')

@section('title', $event->judul . ' - Event STBA Pontianak')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                {{-- Breadcrumb --}}
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none"
                                style="color: var(--primary-maroon);">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('events.index') }}" class="text-decoration-none"
                                style="color: var(--primary-maroon);">Event</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Event</li>
                    </ol>
                </nav>

                {{-- Event Card --}}
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5">
                    @if ($event->gambar)
                        <img src="{{ asset('storage/' . $event->gambar) }}" class="card-img-top" alt="{{ $event->judul }}"
                            style="max-height: 400px; object-fit: cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center"
                            style="height: 300px; color: #aaa;">
                            <i class="bi bi-calendar-event" style="font-size: 5rem;"></i>
                        </div>
                    @endif

                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2 fw-semibold me-3">
                                Event Kampus
                            </span>
                            <span class="text-muted small">
                                <i class="bi bi-clock me-1"></i>
                                Diperbarui {{ $event->updated_at->diffForHumans() }}
                            </span>
                        </div>

                        <h1 class="card-title fw-bold mb-4" style="color: var(--primary-maroon);">
                            {{ $event->judul }}
                        </h1>

                        <div class="row g-3 mb-4 rounded-3 p-3 bg-light">
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-calendar-check fs-4 text-danger me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1 mt-1">Tanggal Mulai</h6>
                                        <p class="mb-0 text-muted">{{ $event->tanggal_mulai->format('d F Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-calendar-x fs-4 text-danger me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1 mt-1">Tanggal Selesai</h6>
                                        <p class="mb-0 text-muted">
                                            {{ $event->tanggal_selesai ? $event->tanggal_selesai->format('d F Y') : 'Belum ditentukan' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex align-items-start mt-2">
                                    <i class="bi bi-geo-alt fs-4 text-danger me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1 mt-1">Lokasi Kegiatan</h6>
                                        <p class="mb-0 text-muted">{{ $event->lokasi ?? 'Kampus STBA Pontianak' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="event-description mt-5">
                            <h4 class="fw-bold mb-3 border-bottom pb-2">Deskripsi Kegiatan</h4>
                            <div class="text-muted" style="line-height: 1.8;">
                                {!! $event->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('events.index') }}" class="btn btn-outline-danger px-4 py-2 rounded-pill">
                        <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar Event
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
