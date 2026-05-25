@extends('layouts.pmb')

@section('title', 'Kontak PMB - STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_kontak.css') }}">
@endpush

@section('content')
<div id="pmb-kontak">

    {{-- Page Hero --}}
    <div class="page-hero">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-2">
                <ol class="breadcrumb small mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                </ol>
            </nav>
            <h1>Kontak PMB</h1>
            <p class="hero-subtitle">Silakan hubungi narahubung kami untuk informasi pendaftaran dan bantuan teknis.</p>
        </div>
    </div>

    <section class="py-5">
        <div class="container">

            <div class="row g-4">
                @forelse ($kontaks as $kontak)
                    <div class="col-md-6">
                        <div class="card card-kontak card-base h-100">
                            <div class="card-body p-4 d-flex gap-3">
                                <div class="kontak-icon flex-shrink-0">
                                    <i class="bi bi-{{ $kontak->icon ?? 'telephone' }} fs-5"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="mb-1" style="color: var(--primary-maroon); font-size: 1rem;">{{ $kontak->nama }}</h5>
                                    <div class="small text-muted mb-3 fst-italic">{{ $kontak->tugas }}</div>

                                    @if ($kontak->nomor_hp)
                                        <div class="small mb-2 d-flex align-items-center gap-2">
                                            <span class="badge rounded-pill px-2 py-1"
                                                style="background:#25D366;color:#fff; font-family: 'Open Sans', sans-serif;">
                                                <i class="bi bi-whatsapp me-1"></i>WhatsApp
                                            </span>
                                            <span class="fw-medium">{{ $kontak->nomor_hp }}</span>
                                        </div>
                                    @endif

                                    @if ($kontak->email)
                                        <div class="small mb-2 d-flex align-items-center gap-2">
                                            <span class="badge rounded-pill px-2 py-1"
                                                style="background:#0d6efd;color:#fff; font-family: 'Open Sans', sans-serif;">
                                                <i class="bi bi-envelope me-1"></i>Email
                                            </span>
                                            <span>{{ $kontak->email }}</span>
                                        </div>
                                    @endif

                                    @if ($kontak->hari_layanan || $kontak->jam_layanan)
                                        <div class="small mt-3 text-muted pt-2" style="border-top: 1px solid #f0f0f0;">
                                            <i class="bi bi-clock me-1 opacity-75"></i>
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
                        <i class="bi bi-telephone-x display-4 text-muted d-block mb-3" style="opacity:0.4;"></i>
                        <p class="text-muted fw-semibold">Belum ada data kontak yang tersedia.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

</div>
@endsection
