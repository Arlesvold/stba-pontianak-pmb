@extends('layouts.pmb')

@section('title', 'Staf & Dosen - STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_staf.css') }}">
@endpush

@section('content')
<div id="staf-page">

    {{-- Page Hero --}}
    <div class="page-hero">
        <div class="page-hero-inner">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="crumb mb-4">
                        <a href="{{ route('beranda') }}">Beranda</a>
                        <span class="sep">/</span>
                        <span>Staf &amp; Dosen</span>
                    </div>
                    <h1>Mereka yang <em>menghidupi</em> ruang belajar kami.</h1>
                    <p class="hero-subtitle">Profil singkat dosen tetap, pengajar tamu, dan staf STBA Pontianak.</p>
                </div>
                <span class="page-hero-mark d-none d-md-inline-block mt-1">DIREKTORI / PENGAJAR</span>
            </div>
        </div>
    </div>

    <section style="background: var(--paper); padding: 72px 0;">
        <div class="container">

            <div class="row g-4">
                @forelse ($stafs as $staf)
                    <div class="col-md-3 col-sm-6">
                        <div style="background: var(--paper-warm); border: 1px solid var(--rule-soft); overflow: hidden;">
                            @if ($staf->foto)
                                <img src="{{ asset('storage/' . ltrim($staf->foto, '/')) }}"
                                    alt="{{ $staf->nama }}"
                                    loading="lazy"
                                    style="width:100%; height:280px; object-fit:cover; object-position:top; display: block;">
                            @else
                                <div class="d-flex align-items-center justify-content-center"
                                    style="height: 280px; background: var(--paper-3); color: var(--maroon);">
                                    <i class="bi bi-person" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                            <div style="padding: 18px 18px 20px;">
                                <div class="mono mb-1" style="font-size: 0.62rem; letter-spacing: 0.16em; text-transform: uppercase; color: var(--maroon);">
                                    {{ $staf->posisi ?? 'Staf' }}
                                </div>
                                <h5 class="h-card mb-0" style="font-size: 0.95rem; color: var(--ink);">{{ $staf->nama }}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-people" style="font-size: 3rem; display: block; margin-bottom: 16px; color: var(--muted-2);"></i>
                        <p style="color: var(--muted); font-size: 0.9rem;" class="mb-0">Belum ada data staf yang ditampilkan.</p>
                    </div>
                @endforelse
            </div>

            @if ($stafs->hasPages())
                <div class="mt-5 d-flex justify-content-between align-items-center flex-wrap gap-2 pt-3" style="border-top: 1px solid var(--rule);">
                    <div class="mono" style="font-size: 0.65rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--muted);">
                        Menampilkan {{ $stafs->firstItem() }}&ndash;{{ $stafs->lastItem() }}
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
