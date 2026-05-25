@extends('layouts.pmb')

@section('title', $prodi->nama . ' - STBA Pontianak')

@section('content')

{{-- Page Header --}}
<div style="background: linear-gradient(135deg, #fef2f4 0%, #f7d9df 100%); border-bottom: 1px solid #f0c6d0;">
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-2">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('beranda') }}" class="text-decoration-none" style="color: var(--primary-maroon);">Beranda</a>
                </li>
                <li class="breadcrumb-item">Program Studi</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $prodi->jenjang }}</li>
            </ol>
        </nav>
        <h1 class="fw-bold mb-0" style="color: var(--primary-maroon); font-size: 1.75rem;">{{ $prodi->nama }}</h1>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">

            @if ($prodi->deskripsi)
                <p class="text-muted mb-5" style="line-height: 1.8;">{{ $prodi->deskripsi }}</p>
            @endif

            {{-- Visi --}}
            @if ($prodi->visi)
                <div class="mb-5">
                    <h2 class="fw-bold mb-3" style="font-size: 1.05rem; color: var(--primary-maroon); padding-left: 0.75rem; border-left: 3px solid var(--primary-maroon);">Visi</h2>
                    <p class="text-muted mb-0" style="line-height: 1.8;">{{ $prodi->visi }}</p>
                </div>
            @endif

            {{-- Misi --}}
            @if ($prodi->misi)
                <div class="mb-5">
                    <h2 class="fw-bold mb-3" style="font-size: 1.05rem; color: var(--primary-maroon); padding-left: 0.75rem; border-left: 3px solid var(--primary-maroon);">Misi</h2>
                    <ul class="text-muted ps-3 mb-0" style="line-height: 1.9;">
                        @foreach ($prodi->misi as $m)
                            <li class="mb-1">{{ $m['item'] }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Tujuan --}}
            @if ($prodi->tujuan)
                <div class="mb-5">
                    <h2 class="fw-bold mb-3" style="font-size: 1.05rem; color: var(--primary-maroon); padding-left: 0.75rem; border-left: 3px solid var(--primary-maroon);">Tujuan</h2>
                    <ul class="text-muted ps-3 mb-0" style="line-height: 1.9;">
                        @foreach ($prodi->tujuan as $t)
                            <li class="mb-1">{{ $t['item'] }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Peminatan --}}
            @if ($prodi->peminatan)
                <div class="mb-5">
                    <h2 class="fw-bold mb-3" style="font-size: 1.05rem; color: var(--primary-maroon); padding-left: 0.75rem; border-left: 3px solid var(--primary-maroon);">Peminatan Studi</h2>
                    <div class="row g-3">
                        @foreach ($prodi->peminatan as $p)
                            <div class="col-md-6">
                                <div class="p-3 h-100 rounded-3 border" style="border-color: #f0c6d0 !important; background-color: #fef9fa;">
                                    <h6 class="fw-bold mb-2" style="color: var(--primary-maroon);">
                                        @if (!empty($p['icon']))
                                            <i class="bi {{ $p['icon'] }} me-2"></i>
                                        @endif
                                        {{ $p['judul'] }}
                                    </h6>
                                    <p class="text-muted small mb-0" style="line-height: 1.6;">{{ $p['deskripsi'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Kurikulum --}}
            @if ($prodi->kurikulum)
                <div class="mb-5">
                    <h2 class="fw-bold mb-3" style="font-size: 1.05rem; color: var(--primary-maroon); padding-left: 0.75rem; border-left: 3px solid var(--primary-maroon);">Kurikulum</h2>
                    <p class="text-muted mb-2" style="line-height: 1.8;">{{ $prodi->kurikulum }}</p>
                    @if ($prodi->kurikulum_pdf_url)
                        <a href="{{ $prodi->kurikulum_pdf_url }}" target="_blank" class="text-decoration-none small fw-semibold" style="color: var(--primary-maroon);">
                            <i class="bi bi-file-earmark-pdf me-1"></i> Lihat distribusi mata kuliah selengkapnya
                        </a>
                    @endif
                </div>
            @endif

            {{-- Karir Lulusan --}}
            @if ($prodi->karir_list)
                <div class="mb-5">
                    <h2 class="fw-bold mb-3" style="font-size: 1.05rem; color: var(--primary-maroon); padding-left: 0.75rem; border-left: 3px solid var(--primary-maroon);">Karir Lulusan</h2>
                    @if ($prodi->karir_deskripsi)
                        <p class="text-muted mb-3" style="line-height: 1.8;">{{ $prodi->karir_deskripsi }}</p>
                    @endif
                    <ul class="text-muted ps-3 mb-0" style="line-height: 1.9;">
                        @foreach ($prodi->karir_list as $k)
                            <li class="mb-1">{{ $k['item'] }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- CTA --}}
            <div class="p-4 rounded-3 border" style="background-color: #fef2f4; border-color: #f7d9df !important;">
                <h5 class="fw-bold mb-2" style="color: var(--primary-maroon);">Tertarik dengan {{ $prodi->nama }}?</h5>
                <p class="text-muted mb-3" style="line-height: 1.7;">
                    Dapatkan informasi pendaftaran dan beasiswa pada menu PMB atau hubungi narahubung resmi kami pada halaman Kontak.
                </p>
                <a href="{{ route('pmb.daftar') }}" class="btn btn-maroon btn-sm px-4">
                    Daftar {{ $prodi->jenjang }} Sekarang
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
