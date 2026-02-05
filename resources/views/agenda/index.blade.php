@extends('layouts.pmb')

@section('title', 'Agenda')

@section('content')
    <style>
        .timeline-wrapper {
            position: relative;
            padding-left: 20px;
        }

        .timeline-wrapper::before {
            content: '';
            position: absolute;
            top: 10px;
            bottom: 0;
            left: 0;
            width: 2px;
            background: #e9ecef;
            border-radius: 2px;
        }

        .timeline-item {
            position: relative;
            padding-left: 40px;
            padding-bottom: 40px;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: -9px;
            top: 5px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #fff;
            border: 4px solid var(--primary-maroon);
            z-index: 1;
        }

        .timeline-date {
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .timeline-content {
            background: #fff;
            border: 1px solid #f1f1f1;
            border-radius: 12px;
            padding: 1.5rem;
            transition: transform 0.18s ease, box-shadow 0.18s ease;
        }

        .timeline-content:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15) !important;
            border-color: transparent;
        }
    </style>

    <section class="py-5 bg-light">
        <div class="container py-4">
            {{-- Header --}}
            <div class="text-center mb-5">
                <span class="badge bg-white text-danger shadow-sm px-3 py-2 rounded-pill mb-3 border">
                    <i class="bi bi-calendar-check me-2"></i>Kalender Kegiatan
                </span>
                <h2 class="display-6 fw-bold mb-3" style="color: var(--primary-maroon);">
                    Agenda & Jadwal PMB
                </h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Pantau terus jadwal penting pelaksanaan Penerimaan Mahasiswa Baru dan kegiatan akademik lainnya di STBA
                    Pontianak.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    {{-- Timeline Start --}}
                    <div class="timeline-wrapper">
                        @forelse ($agendas as $agenda)
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <div class="timeline-content shadow-sm">
                                    <div class="row">
                                        <div
                                            class="col-md-3 border-end d-flex flex-column justify-content-center text-center mb-3 mb-md-0">
                                            @php
                                                $mulai = \Carbon\Carbon::parse($agenda->tanggal_mulai);
                                                $selesai = $agenda->tanggal_selesai
                                                    ? \Carbon\Carbon::parse($agenda->tanggal_selesai)
                                                    : null;
                                            @endphp
                                            <h2 class="display-6 fw-bold mb-0 text-dark">{{ $mulai->format('d') }}</h2>
                                            <span
                                                class="text-uppercase fw-bold text-danger">{{ $mulai->format('M Y') }}</span>

                                            @if ($selesai && $selesai->ne($mulai))
                                                <div class="small text-muted mt-1">
                                                    s/d {{ $selesai->format('d M') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-9 ps-md-4">
                                            <h5 class="fw-bold mb-2" style="color: var(--primary-maroon);">
                                                {{ $agenda->judul }}
                                            </h5>
                                            <p class="text-muted mb-0">
                                                {{ $agenda->deskripsi ?: 'Informasi detail mengenai agenda ini belum tersedia.' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486777.png" alt="Empty"
                                    width="80" class="mb-3 opacity-50">
                                <p class="text-muted fw-semibold">Belum ada agenda yang dijadwalkan saat ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <p class="small text-muted fst-italic">
                    *Jadwal dapat berubah sewaktu-waktu. Silakan cek secara berkala.
                </p>
            </div>
        </div>
    </section>
@endsection
