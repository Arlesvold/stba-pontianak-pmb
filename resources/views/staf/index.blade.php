@extends('layouts.pmb')

@section('title', 'Staf & Dosen - STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_staf.css') }}">
@endpush

@section('content')
<div id="staf-page">

    {{-- Page Hero --}}
    <div class="page-hero">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-2">
                <ol class="breadcrumb small mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Staf & Dosen</li>
                </ol>
            </nav>
            <h1>Staf &amp; Dosen</h1>
            <p class="hero-subtitle">Profil singkat tenaga pengajar dan staf STBA Pontianak.</p>
        </div>
    </div>

    <section class="py-5">
        <div class="container">

            <div class="row g-4">
                @forelse ($stafs as $staf)
                    <div class="col-md-3 col-sm-6">
                        <div class="card card-staf card-base h-100 text-center overflow-hidden p-0">
                            @if ($staf->foto)
                                <img src="{{ asset('storage/' . ltrim($staf->foto, '/')) }}"
                                    alt="{{ $staf->nama }}"
                                    loading="lazy"
                                    width="300"
                                    height="260"
                                    style="width:100%; height:260px; object-fit:cover; object-position:top;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                    style="height: 260px;">
                                    <i class="bi bi-person-circle fs-1 text-muted"></i>
                                </div>
                            @endif

                            <div class="card-body py-3 px-3">
                                <h5 class="card-title mb-1" style="font-size: 0.92rem; color: var(--primary-maroon);">
                                    {{ $staf->nama }}
                                </h5>
                                @if ($staf->posisi)
                                    <p class="card-text small text-muted mb-0">
                                        {{ $staf->posisi }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-people display-4 text-muted d-block mb-3" style="opacity:0.4;"></i>
                        <p class="text-muted small mb-0">Belum ada data staf yang ditampilkan.</p>
                    </div>
                @endforelse
            </div>

            @if ($stafs->hasPages())
                <div class="mt-5 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div class="text-muted small">
                        Menampilkan {{ $stafs->firstItem() }}–{{ $stafs->lastItem() }}
                        dari {{ $stafs->total() }} staf
                    </div>
                    <nav class="custom-pagination">
                        {{ $stafs->links('pagination::simple-bootstrap-5') }}
                    </nav>
                </div>
            @endif

        </div>
    </section>
</div>
@endsection
