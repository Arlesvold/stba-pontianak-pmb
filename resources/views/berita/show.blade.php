@extends('layouts.pmb')

@section('title', $berita->judul . ' - Berita STBA Pontianak')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                {{-- Breadcrumb --}}
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none"
                                style="color: var(--primary-maroon);">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('berita.index') }}" class="text-decoration-none"
                                style="color: var(--primary-maroon);">Berita Kampus</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                    </ol>
                </nav>

                {{-- News Content --}}
                <article class="bg-white rounded-4 shadow-sm overflow-hidden mb-5">
                    @if ($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-100" alt="{{ $berita->judul }}"
                            style="max-height: 500px; object-fit: cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center"
                            style="height: 300px; color: #aaa;">
                            <i class="bi bi-image" style="font-size: 5rem;"></i>
                        </div>
                    @endif

                    <div class="p-4 p-md-5">
                        <div class="d-flex flex-wrap align-items-center mb-4 gap-3 text-muted">
                            <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2 fw-semibold">
                                Berita Kampus
                            </span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-calendar3 me-2"></i>
                                {{ $berita->tanggal->format('d F Y') }}
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-clock me-2"></i>
                                Diperbarui {{ $berita->updated_at->diffForHumans() }}
                            </div>
                        </div>

                        <h1 class="fw-bold mb-4" style="color: var(--primary-maroon); line-height: 1.4;">
                            {{ $berita->judul }}
                        </h1>

                        <hr class="mb-4">

                        <div class="news-content" style="line-height: 1.8; font-size: 1.05rem;">
                            {!! $berita->isi !!}
                        </div>
                    </div>
                </article>

                {{-- Navigation Back --}}
                <div class="text-center">
                    <a href="{{ route('berita.index') }}" class="btn btn-outline-danger px-4 py-2 rounded-pill">
                        <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar Berita
                    </a>
                </div>

            </div>
        </div>
    </div>

    <style>
        .news-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 1.5rem 0;
        }
    </style>
@endsection
