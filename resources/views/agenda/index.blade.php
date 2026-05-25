@extends('layouts.pmb')

@section('title', 'Agenda Kegiatan - STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_agenda.css') }}">
@endpush

@section('content')
<div id="agenda-page">

    {{-- Page Hero --}}
    <div class="page-hero">
        <div class="page-hero-inner">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="crumb mb-4">
                        <a href="{{ route('beranda') }}">Beranda</a>
                        <span class="sep">/</span>
                        <span>Agenda Kegiatan</span>
                    </div>
                    <h1>Kalender akademik <em>& kegiatan</em> kampus.</h1>
                    <p class="hero-subtitle">Pantau seluruh agenda akademik, PMB, dan kegiatan kemahasiswaan di satu tempat.</p>
                </div>
                <span class="page-hero-mark d-none d-md-inline-block mt-1">KALENDER / AKADEMIK</span>
            </div>
        </div>
    </div>

    <section style="background: var(--paper); padding: 72px 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    @forelse ($agendas as $agenda)
                        @php
                            $mulai = \Carbon\Carbon::parse($agenda->tanggal_mulai);
                            $selesai = $agenda->tanggal_selesai
                                ? \Carbon\Carbon::parse($agenda->tanggal_selesai)
                                : null;
                        @endphp
                        <div style="display: grid; grid-template-columns: 100px 1fr; gap: 28px; padding: 28px 0; border-bottom: 1px solid var(--rule-soft); align-items: start;">
                            <div>
                                <div class="h-display" style="font-size: clamp(2.5rem, 5vw, 3.5rem); color: var(--maroon); line-height: 1; letter-spacing: -0.04em;">{{ $mulai->format('d') }}</div>
                                @if ($selesai && $selesai->ne($mulai))
                                    <div class="h-display" style="font-size: 1.4rem; color: var(--maroon); line-height: 1; opacity: 0.5;">&ndash;{{ $selesai->format('d') }}</div>
                                @endif
                            </div>
                            <div>
                                <div class="mono mb-1" style="font-size: 0.62rem; letter-spacing: 0.16em; text-transform: uppercase; color: var(--muted);">{{ $mulai->format('F Y') }}</div>
                                <h5 class="h-card mb-2" style="font-size: 1.05rem; color: var(--ink);">{{ $agenda->judul }}</h5>
                                <p style="color: var(--ink-2); font-size: 0.875rem; line-height: 1.65; margin-bottom: 0;">
                                    {{ $agenda->deskripsi ?: 'Informasi detail mengenai agenda ini belum tersedia.' }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div style="text-align: center; padding: 60px 0; color: var(--muted);">
                            <i class="bi bi-calendar-x" style="font-size: 3rem; display: block; margin-bottom: 16px; opacity: 0.3;"></i>
                            <p class="mb-0" style="font-size: 0.9rem;">Belum ada agenda yang dijadwalkan saat ini.</p>
                        </div>
                    @endforelse

                    @if ($agendas->hasPages())
                        <div class="mt-5 d-flex justify-content-between align-items-center flex-wrap gap-2 pt-3" style="border-top: 1px solid var(--rule);">
                            <div class="mono" style="font-size: 0.65rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--muted);">
                                Menampilkan {{ $agendas->firstItem() }}&ndash;{{ $agendas->lastItem() }}
                                dari {{ $agendas->total() }} agenda
                            </div>
                            <nav class="custom-pagination">
                                {{ $agendas->links('pagination::simple-bootstrap-5') }}
                            </nav>
                        </div>
                    @endif

                    <p class="mono mt-5 mb-0" style="font-size: 0.65rem; letter-spacing: 0.12em; color: var(--muted); text-align: center;">
                        * Jadwal dapat berubah sewaktu-waktu. Cek pengumuman resmi di halaman utama.
                    </p>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
