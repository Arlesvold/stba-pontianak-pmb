@extends('layouts.pmb')

@section('title', 'Kontak PMB - STBA Pontianak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_kontak.css') }}">
@endpush

@section('content')
<div id="pmb-kontak">

    {{-- Page Hero --}}
    <div class="page-hero">
        <div class="page-hero-inner">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="crumb mb-4">
                        <a href="{{ route('beranda') }}">Beranda</a>
                        <span class="sep">/</span>
                        <span>Kontak</span>
                    </div>
                    <h1>Hubungi <em>narahubung</em> kami.</h1>
                    <p class="hero-subtitle">Tim STBA Pontianak siap membantu &mdash; dari pertanyaan pendaftaran sampai layanan administrasi.</p>
                </div>
                <span class="page-hero-mark d-none d-md-inline-block mt-1">DIREKTORI / KONTAK</span>
            </div>
        </div>
    </div>

    <section style="background: var(--paper); padding: 72px 0;">
        <div class="container">

            {{-- Address panel --}}
            <div class="row g-4 mb-5">
                <div class="col-lg-5">
                    <div style="background: var(--maroon-deep); color: var(--paper); padding: 40px; height: 100%;">
                        <div class="mono mb-4" style="font-size: 0.62rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--gold-soft);">&#8627; Kantor Pusat</div>
                        <h3 class="h-display mb-4" style="font-size: 1.5rem; color: var(--paper);">STBA Pontianak</h3>
                        <p style="color: rgba(250,245,236,0.72); line-height: 1.75; font-size: 0.9rem; margin-bottom: 24px;">
                            Jl. Gajahmada No. 38<br>
                            Benua Melayu Darat, Kec. Pontianak Selatan<br>
                            Kota Pontianak &mdash; Kalimantan Barat 78121
                        </p>
                        <div style="display: flex; flex-direction: column; gap: 12px; font-size: 0.875rem;">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <i class="bi bi-telephone-fill" style="color: var(--gold-soft);"></i>
                                <span style="color: rgba(250,245,236,0.85);">0858-2238-5552</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <i class="bi bi-envelope-fill" style="color: var(--gold-soft);"></i>
                                <span style="color: rgba(250,245,236,0.85);">kampus@stbapontianak.ac.id</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div style="background: var(--paper-2); border: 1px solid var(--rule); height: 100%; min-height: 280px; display: grid; place-items: center; position: relative; overflow: hidden;">
                        <div style="text-align: center; color: var(--muted);">
                            <i class="bi bi-geo-alt" style="font-size: 2.5rem; color: var(--maroon); margin-bottom: 12px; display: block;"></i>
                            <div class="mono" style="font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted);">Jl. Gajahmada No. 38, Pontianak</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Narahubung --}}
            <div style="display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 32px; padding-bottom: 16px; border-bottom: 1.5px solid var(--ink);">
                <div>
                    <div class="section-num mb-2">&#8627; Narahubung</div>
                    <h2 class="h-display" style="font-size: 1.8rem; margin-bottom: 0;">Tim layanan STBA Pontianak</h2>
                </div>
                <span class="mono d-none d-md-inline" style="font-size: 0.65rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--muted);">Respon rata-rata 2 jam</span>
            </div>

            <div class="row g-4">
                @forelse ($kontaks as $kontak)
                    <div class="col-md-6">
                        <div style="background: var(--paper-warm); border: 1px solid var(--rule-soft); padding: 28px;">
                            <div class="d-flex align-items-start gap-3">
                                <div style="width: 48px; height: 48px; border-radius: 50%; background: var(--paper-3); display: grid; place-items: center; color: var(--maroon); flex-shrink: 0;">
                                    <i class="bi bi-{{ $kontak->icon ?? 'person' }}" style="font-size: 1.2rem;"></i>
                                </div>
                                <div style="flex: 1;">
                                    <div class="mono mb-1" style="font-size: 0.62rem; letter-spacing: 0.16em; text-transform: uppercase; color: var(--maroon);">{{ $kontak->tugas }}</div>
                                    <h5 class="h-card mb-3" style="font-size: 1rem; color: var(--ink);">{{ $kontak->nama }}</h5>

                                    <div style="display: grid; grid-template-columns: auto 1fr; gap: 8px 14px; font-size: 0.875rem; align-items: center;">
                                        @if ($kontak->nomor_hp)
                                            <span style="display: inline-flex; align-items: center; gap: 5px; color: #25D366; font-family: var(--font-mono); font-size: 0.62rem; letter-spacing: 0.12em; text-transform: uppercase;">
                                                <i class="bi bi-whatsapp"></i> WA
                                            </span>
                                            <span style="font-weight: 600; color: var(--ink);">{{ $kontak->nomor_hp }}</span>
                                        @endif

                                        @if ($kontak->email)
                                            <span style="display: inline-flex; align-items: center; gap: 5px; color: var(--maroon); font-family: var(--font-mono); font-size: 0.62rem; letter-spacing: 0.12em; text-transform: uppercase;">
                                                <i class="bi bi-envelope"></i> Email
                                            </span>
                                            <span style="font-family: var(--font-mono); font-size: 0.78rem; color: var(--ink-2);">{{ $kontak->email }}</span>
                                        @endif

                                        @if ($kontak->hari_layanan || $kontak->jam_layanan)
                                            <span style="display: inline-flex; align-items: center; gap: 5px; color: var(--muted); font-family: var(--font-mono); font-size: 0.62rem; letter-spacing: 0.12em; text-transform: uppercase;">
                                                <i class="bi bi-clock"></i> Jam
                                            </span>
                                            <span style="font-size: 0.82rem; color: var(--muted);">{{ $kontak->hari_layanan }}{{ $kontak->hari_layanan && $kontak->jam_layanan ? ' · ' : '' }}{{ $kontak->jam_layanan }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-telephone-x" style="font-size: 3rem; display: block; margin-bottom: 16px; color: var(--muted-2);"></i>
                        <p style="color: var(--muted); font-size: 0.9rem;" class="mb-0">Belum ada data kontak yang tersedia.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

</div>
@endsection
