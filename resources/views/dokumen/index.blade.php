@extends('layouts.pmb')

@section('title', 'Dokumen & Unduhan - STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_dokumen.css') }}">
@endpush

@section('content')
<div id="dokumen-page">

    {{-- Page Hero --}}
    <div class="page-hero">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-2">
                <ol class="breadcrumb small mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Dokumen & Unduhan</li>
                </ol>
            </nav>
            <h1>Dokumen &amp; Unduhan</h1>
            <p class="hero-subtitle">Kumpulan dokumen, formulir, dan file penting yang dapat diunduh.</p>
        </div>
    </div>

    <section class="py-5">
        <div class="container">

            <div class="row g-4 justify-content-center">
                @forelse ($dokumens as $dokumen)
                    @php
                        $extension = pathinfo($dokumen->file, PATHINFO_EXTENSION);
                        $icon = 'bi-file-earmark-text';
                        if (in_array($extension, ['pdf'])) {
                            $icon = 'bi-file-earmark-pdf';
                        } elseif (in_array($extension, ['doc', 'docx'])) {
                            $icon = 'bi-file-earmark-word';
                        } elseif (in_array($extension, ['xls', 'xlsx'])) {
                            $icon = 'bi-file-earmark-excel';
                        }
                    @endphp

                    <div class="col-md-6 col-lg-4">
                        <div class="card card-dokumen card-base h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start mb-3 gap-3">
                                    <div class="file-icon flex-shrink-0">
                                        <i class="bi {{ $icon }} fs-2"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1" style="color: var(--primary-maroon); font-size: 0.95rem; line-height: 1.4;">
                                            {{ $dokumen->judul }}
                                        </h5>
                                        <div class="small text-muted">
                                            <i class="bi bi-clock me-1 opacity-75"></i>{{ $dokumen->created_at->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>

                                @if ($dokumen->deskripsi)
                                    <p class="text-muted small mb-4" style="line-height: 1.65; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $dokumen->deskripsi }}
                                    </p>
                                @else
                                    <p class="text-muted small mb-4 fst-italic">Tidak ada deskripsi.</p>
                                @endif

                                <div class="d-flex gap-2 mt-auto">
                                    @if ($extension === 'pdf')
                                        <a href="{{ asset('storage/' . $dokumen->file) }}" target="_blank"
                                            class="btn btn-outline-maroon btn-sm w-50 rounded-pill fw-semibold">
                                            <i class="bi bi-eye me-1"></i> Preview
                                        </a>
                                    @endif
                                    <a href="{{ asset('storage/' . $dokumen->file) }}" download
                                        class="btn btn-maroon btn-sm {{ $extension === 'pdf' ? 'w-50' : 'w-100' }} rounded-pill fw-semibold">
                                        <i class="bi bi-download me-1"></i> Unduh
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 py-5 text-center">
                        <i class="bi bi-folder-x display-4 text-muted d-block mb-3" style="opacity:0.4;"></i>
                        <p class="text-muted">Belum ada dokumen yang tersedia untuk diunduh.</p>
                    </div>
                @endforelse
            </div>

            @if ($dokumens->hasPages())
                <div class="mt-5 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div class="text-muted small">
                        Menampilkan {{ $dokumens->firstItem() }}–{{ $dokumens->lastItem() }}
                        dari {{ $dokumens->total() }} dokumen
                    </div>
                    <nav class="custom-pagination">
                        {{ $dokumens->links('pagination::simple-bootstrap-5') }}
                    </nav>
                </div>
            @endif

        </div>
    </section>

</div>
@endsection
