@extends('layouts.pmb')

@section('title', 'Kontak')

@section('content')
    <style>
        .card-kontak {
            transition: transform 0.18s ease, box-shadow 0.18s ease;
            cursor: default;
        }

        .card-kontak:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15) !important;
            border-color: transparent !important;
        }

        .kontak-icon {
            flex-shrink: 0;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--primary-maroon);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <section class="py-5 bg-light">
        <div class="container py-4">

            {{-- Header --}}
            <div class="text-center mb-5">
                <span class="badge bg-white text-danger shadow-sm px-3 py-2 rounded-pill mb-3 border">
                    <i class="bi bi-telephone me-2"></i>Hubungi Kami
                </span>
                <h2 class="display-6 fw-bold mb-3" style="color: var(--primary-maroon);">
                    Kontak PMB STBA Pontianak
                </h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Silakan hubungi narahubung berikut untuk informasi pendaftaran, program studi,
                    dan bantuan teknis terkait PMB.
                </p>
            </div>

            <div class="row g-4">
                @forelse ($kontaks as $kontak)
                    <div class="col-md-6">
                        <div class="card card-kontak border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-4 d-flex gap-3">
                                <div class="kontak-icon">
                                    <i class="bi bi-telephone fs-4"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-1" style="color: var(--primary-maroon);">{{ $kontak->nama }}</h5>
                                    <div class="small text-muted mb-3 fst-italic">{{ $kontak->tugas }}</div>

                                    @if ($kontak->nomor_hp)
                                        <div class="small mb-2 d-flex align-items-center gap-2">
                                            <span class="badge rounded-pill px-2 py-1"
                                                style="background:#25D366;color:#fff;">
                                                <i class="bi bi-whatsapp me-1"></i>WhatsApp
                                            </span>
                                            <span>{{ $kontak->nomor_hp }}</span>
                                        </div>
                                    @endif

                                    @if ($kontak->email)
                                        <div class="small mb-2 d-flex align-items-center gap-2">
                                            <span class="badge rounded-pill px-2 py-1"
                                                style="background:#0d6efd;color:#fff;">
                                                <i class="bi bi-envelope me-1"></i>Email
                                            </span>
                                            <span class="text-dark">
                                                {{ $kontak->email }}
                                            </span>
                                        </div>
                                    @endif

                                    @if ($kontak->hari_layanan || $kontak->jam_layanan)
                                        <div class="small mt-3 text-muted border-top pt-2">
                                            <i class="bi bi-clock me-1"></i>
                                            Jam layanan:
                                            <strong>{{ $kontak->hari_layanan }}{{ $kontak->hari_layanan && $kontak->jam_layanan ? ', ' : '' }}{{ $kontak->jam_layanan }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486777.png" alt="Empty" width="80"
                            class="mb-3 opacity-50">
                        <p class="text-muted fw-semibold">Belum ada data kontak yang tersedia.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>
@endsection
