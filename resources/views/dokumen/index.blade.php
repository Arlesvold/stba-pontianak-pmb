@extends('layouts.pmb')

@section('title', 'Dokumen & Unduhan - STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_dokumen.css') }}">
@endpush

@section('content')
<div id="dokumen-page">

    {{-- Page Hero --}}
    <div class="page-hero">
        <div class="page-hero-inner">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="crumb mb-4">
                        <a href="{{ route('beranda') }}">Beranda</a>
                        <span class="sep">/</span>
                        <span>Dokumen &amp; Unduhan</span>
                    </div>
                    <h1>Pusat <em>dokumen</em> &amp; unduhan.</h1>
                    <p class="hero-subtitle">Formulir resmi, panduan akademik, dan dokumen rujukan yang dapat diunduh secara terbuka.</p>
                </div>
                <span class="page-hero-mark d-none d-md-inline-block mt-1">ARSIP / DOKUMEN</span>
            </div>
        </div>
    </div>

    <section style="background: var(--paper); padding: 72px 0;">
        <div class="container">

            <div style="border-top: 1.5px solid var(--ink); margin-bottom: 0;">
                @forelse ($dokumens as $dokumen)
                    @php
                        $extension = pathinfo($dokumen->file, PATHINFO_EXTENSION);
                        $isPdf = $extension === 'pdf';
                        $isDoc = in_array($extension, ['doc', 'docx']);
                    @endphp
                    <div style="display: grid; grid-template-columns: 56px 1fr auto; gap: 24px; padding: 24px 0; border-bottom: 1px solid var(--rule-soft); align-items: center;">
                        <div style="width: 48px; height: 60px; background: {{ $isPdf ? 'var(--maroon-soft)' : 'rgba(91,122,74,0.08)' }}; border: 1px solid var(--rule); display: grid; place-items: center; color: {{ $isPdf ? 'var(--maroon)' : 'var(--leaf)' }}; flex-shrink: 0; position: relative;">
                            <i class="bi bi-file-earmark-{{ $isPdf ? 'pdf' : ($isDoc ? 'word' : 'text') }}" style="font-size: 1.3rem;"></i>
                            <span class="mono" style="position: absolute; bottom: 4px; font-size: 0.5rem; letter-spacing: 0.1em; font-weight: 700;">{{ strtoupper($extension) }}</span>
                        </div>
                        <div>
                            <h5 class="h-card mb-1" style="font-size: 0.95rem; color: var(--ink); line-height: 1.35;">{{ $dokumen->judul }}</h5>
                            @if ($dokumen->deskripsi)
                                <p style="color: var(--muted); font-size: 0.82rem; margin-bottom: 4px; line-height: 1.55;">{{ \Illuminate\Support\Str::limit($dokumen->deskripsi, 120) }}</p>
                            @endif
                            <div class="mono" style="font-size: 0.62rem; letter-spacing: 0.12em; text-transform: uppercase; color: var(--muted-2);">
                                <i class="bi bi-calendar3 me-1"></i>{{ $dokumen->created_at->format('d M Y') }}
                            </div>
                        </div>
                        <div style="display: flex; gap: 8px; flex-shrink: 0;">
                            @if ($isPdf)
                                <a href="{{ asset('storage/' . $dokumen->file) }}" target="_blank" class="btn btn-outline-maroon btn-sm">
                                    <i class="bi bi-eye me-1"></i> Lihat
                                </a>
                            @endif
                            <a href="{{ asset('storage/' . $dokumen->file) }}" download class="btn btn-maroon btn-sm">
                                <i class="bi bi-download me-1"></i> Unduh
                            </a>
                        </div>
                    </div>
                @empty
                    <div style="text-align: center; padding: 60px 0; color: var(--muted);">
                        <i class="bi bi-folder-x" style="font-size: 3rem; display: block; margin-bottom: 16px; opacity: 0.3;"></i>
                        <p class="mb-0" style="font-size: 0.9rem;">Belum ada dokumen yang tersedia untuk diunduh.</p>
                    </div>
                @endforelse
            </div>

            @if ($dokumens->hasPages())
                <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap gap-2 pt-3">
                    <div class="mono" style="font-size: 0.65rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--muted);">
                        Menampilkan {{ $dokumens->firstItem() }}&ndash;{{ $dokumens->lastItem() }}
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
