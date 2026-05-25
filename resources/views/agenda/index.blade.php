@extends('layouts.pmb')

@section('title', 'Agenda Kegiatan - STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_agenda.css') }}">
@endpush

@section('content')
<div id="agenda-page">

    {{-- Page Hero --}}
    <div class="page-hero">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-2">
                <ol class="breadcrumb small mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Agenda Kegiatan</li>
                </ol>
            </nav>
            <h1>Agenda &amp; Jadwal</h1>
            <p class="hero-subtitle">Pantau jadwal penting kegiatan akademik dan PMB STBA Pontianak.</p>
        </div>
    </div>

    <section class="py-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="timeline-wrapper">
                        @forelse ($agendas as $agenda)
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <div class="timeline-content card-base shadow-sm">
                                    <div class="row g-0">
                                        <div class="col-md-3 border-end d-flex flex-column justify-content-center text-center mb-3 mb-md-0 pe-3">
                                            @php
                                                $mulai = \Carbon\Carbon::parse($agenda->tanggal_mulai);
                                                $selesai = $agenda->tanggal_selesai
                                                    ? \Carbon\Carbon::parse($agenda->tanggal_selesai)
                                                    : null;
                                            @endphp
                                            <span class="d-block fw-bold mb-0" style="font-size: 2rem; line-height: 1; color: var(--primary-maroon); font-family: 'Playfair Display', serif;">{{ $mulai->format('d') }}</span>
                                            <span class="text-uppercase fw-bold" style="color: var(--primary-maroon); font-size: 0.75rem; letter-spacing: 0.06em;">{{ $mulai->format('M Y') }}</span>

                                            @if ($selesai && $selesai->ne($mulai))
                                                <div class="small text-muted mt-1">
                                                    s/d {{ $selesai->format('d M') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-9 ps-md-4">
                                            <h5 class="mb-2" style="color: var(--primary-maroon); font-size: 0.95rem;">
                                                {{ $agenda->judul }}
                                            </h5>
                                            <p class="text-muted small mb-0" style="line-height: 1.7;">
                                                {{ $agenda->deskripsi ?: 'Informasi detail mengenai agenda ini belum tersedia.' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <i class="bi bi-calendar-x display-4 text-muted d-block mb-3" style="opacity:0.4;"></i>
                                <p class="text-muted fw-semibold">Belum ada agenda yang dijadwalkan saat ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            @if ($agendas->hasPages())
                <div class="mt-5 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div class="text-muted small">
                        Menampilkan {{ $agendas->firstItem() }}–{{ $agendas->lastItem() }}
                        dari {{ $agendas->total() }} agenda
                    </div>
                    <nav class="custom-pagination">
                        {{ $agendas->links('pagination::simple-bootstrap-5') }}
                    </nav>
                </div>
            @endif

            <p class="small text-muted fst-italic text-center mt-5 mb-0">
                *Jadwal dapat berubah sewaktu-waktu. Silakan cek secara berkala.
            </p>
        </div>
    </section>

</div>
@endsection
