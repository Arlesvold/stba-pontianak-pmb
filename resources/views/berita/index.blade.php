@extends('layouts.pmb')

@section('title', 'Berita Kampus - STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_berita.css') }}">
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
                <li class="breadcrumb-item active" aria-current="page">Berita Kampus</li>
            </ol>
        </nav>
        <h1 class="fw-bold mb-1" style="color: var(--primary-maroon); font-size: 1.75rem;">Berita Kampus</h1>
        <p class="text-muted mb-0 small">Kumpulan kegiatan dan informasi terbaru seputar STBA Pontianak.</p>
    </div>
</div>

<div id="berita-page">
    <div class="container py-5">
        <div class="mx-auto" style="max-width: 900px;">
            @forelse ($beritas as $berita)
                <div class="card card-berita mb-4 border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="row g-0">
                        {{-- Gambar --}}
                        <div class="col-md-4">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                    class="img-fluid w-100 h-100" style="object-fit: cover; min-height: 220px;">
                            @else
                                <div class="bg-light w-100 h-100 d-flex align-items-center justify-content-center"
                                    style="min-height: 220px; color: #adb5bd;">
                                    <i class="bi bi-newspaper" style="font-size: 2.5rem;"></i>
                                </div>
                            @endif
                        </div>

                        {{-- Konten --}}
                        <div class="col-md-8">
                            <div class="card-body px-4 py-4 d-flex flex-column h-100">
                                <div class="text-muted small mb-2">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $berita->tanggal->translatedFormat('d F Y') }}
                                </div>
                                <h2 class="h5 fw-bold mb-2" style="color: var(--primary-maroon);">
                                    <a href="{{ route('berita.show', $berita->id) }}"
                                        class="text-decoration-none text-reset stretched-link">
                                        {{ \Illuminate\Support\Str::limit($berita->judul, 80) }}
                                    </a>
                                </h2>
                                <p class="text-muted mb-0 small" style="line-height: 1.6;">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 130) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="py-5 text-center text-muted">
                    <i class="bi bi-newspaper display-4 d-block mb-3" style="color: #dee2e6;"></i>
                    <p class="mb-0">Belum ada berita yang tersedia.</p>
                </div>
            @endforelse

            @if ($beritas->hasPages())
                <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div class="text-muted small">
                        Menampilkan {{ $beritas->firstItem() }}–{{ $beritas->lastItem() }}
                        dari {{ $beritas->total() }} berita
                    </div>
                    <nav class="custom-pagination">
                        {{ $beritas->links('pagination::simple-bootstrap-5') }}
                    </nav>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
