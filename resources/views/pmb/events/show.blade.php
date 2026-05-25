@extends('layouts.pmb')

@section('title', $event->judul . ' - STBA Pontianak')

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('events.index') }}">Event</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Detail Event</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm border-0 rounded-3 overflow-hidden mb-5">
                @if ($event->gambar)
                    <img src="{{ asset('storage/' . $event->gambar) }}" class="card-img-top" alt="{{ $event->judul }}"
                        style="max-height: 380px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center"
                        style="height: 260px; color: #adb5bd;">
                        <i class="bi bi-calendar-event" style="font-size: 4rem;"></i>
                    </div>
                @endif

                <div class="card-body p-4 p-md-5">
                    <div class="d-flex align-items-center mb-3 flex-wrap gap-2">
                        <span class="badge rounded-pill px-3 py-2 fw-semibold small"
                            style="background-color: rgba(123,30,48,0.08); color: var(--primary-maroon);">
                            Event Kampus
                        </span>
                        <span class="text-muted small">
                            <i class="bi bi-clock me-1"></i>
                            Diperbarui {{ $event->updated_at->diffForHumans() }}
                        </span>
                    </div>

                    <h1 class="fw-bold mb-4" style="color: var(--primary-maroon); font-size: 1.6rem;">
                        {{ $event->judul }}
                    </h1>

                    <div class="row g-3 mb-4 rounded-3 p-3" style="background-color: #f8f9fa;">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-calendar-check fs-4 me-3 mt-1" style="color: var(--primary-maroon);"></i>
                                <div>
                                    <h6 class="fw-bold mb-1 small text-uppercase text-muted" style="letter-spacing: 0.04em;">Tanggal Mulai</h6>
                                    <p class="mb-0">{{ $event->tanggal_mulai->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-calendar-x fs-4 me-3 mt-1" style="color: var(--primary-maroon);"></i>
                                <div>
                                    <h6 class="fw-bold mb-1 small text-uppercase text-muted" style="letter-spacing: 0.04em;">Tanggal Selesai</h6>
                                    <p class="mb-0">
                                        {{ $event->tanggal_selesai ? $event->tanggal_selesai->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-geo-alt fs-4 me-3 mt-1" style="color: var(--primary-maroon);"></i>
                                <div>
                                    <h6 class="fw-bold mb-1 small text-uppercase text-muted" style="letter-spacing: 0.04em;">Lokasi Kegiatan</h6>
                                    <p class="mb-0">{{ $event->lokasi ?? 'Kampus STBA Pontianak' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h4 class="fw-bold mb-3 pb-2 border-bottom">Deskripsi Kegiatan</h4>
                        <div class="text-muted" style="line-height: 1.8; text-align: justify;">
                            {!! $event->deskripsi !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('events.index') }}" class="btn btn-outline-maroon px-4 py-2 rounded-pill">
                    <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar Event
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
