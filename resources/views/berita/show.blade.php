@extends('layouts.pmb')

@section('title', $berita->judul . ' - Berita STBA Pontianak')

@section('content')

{{-- Page Header --}}
<div style="background: linear-gradient(135deg, #fef2f4 0%, #f7d9df 100%); border-bottom: 1px solid #f0c6d0;">
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-0">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('beranda') }}" class="text-decoration-none" style="color: var(--primary-maroon);">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('berita.index') }}" class="text-decoration-none" style="color: var(--primary-maroon);">Berita Kampus</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <article class="bg-white rounded-3 shadow-sm overflow-hidden mb-5">
                @if ($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-100" alt="{{ $berita->judul }}"
                        style="max-height: 460px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center"
                        style="height: 260px; color: #adb5bd;">
                        <i class="bi bi-newspaper" style="font-size: 4rem;"></i>
                    </div>
                @endif

                <div class="p-4 p-md-5">
                    <div class="d-flex flex-wrap align-items-center mb-3 gap-2 text-muted small">
                        <span class="badge rounded-pill px-3 py-2 fw-semibold"
                            style="background-color: rgba(123,30,48,0.08); color: var(--primary-maroon);">
                            Berita Kampus
                        </span>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-calendar3 me-1"></i>
                            {{ $berita->tanggal->translatedFormat('d F Y') }}
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-clock me-1"></i>
                            Diperbarui {{ $berita->updated_at->diffForHumans() }}
                        </div>
                    </div>

                    <h1 class="fw-bold mb-4" style="color: var(--primary-maroon); line-height: 1.4; font-size: 1.6rem;">
                        {{ $berita->judul }}
                    </h1>

                    <hr class="mb-4">

                    <div class="news-content" style="line-height: 1.85; font-size: 1.02rem; text-align: justify;">
                        {!! $berita->isi !!}
                    </div>
                </div>
            </article>

            <div class="text-center">
                <a href="{{ route('berita.index') }}" class="btn btn-outline-maroon px-4 py-2 rounded-pill">
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
