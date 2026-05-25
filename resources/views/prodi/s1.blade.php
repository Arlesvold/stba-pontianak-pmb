@extends('layouts.pmb')

@section('title', $prodi->nama . ' - STBA Pontianak')

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
    <div class="page-hero-inner">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <div class="crumb mb-4">
                    <a href="{{ route('beranda') }}">Beranda</a>
                    <span class="sep">/</span>
                    <a href="#">Program Studi</a>
                    <span class="sep">/</span>
                    <span>{{ $prodi->jenjang }}</span>
                </div>
                <h1>{{ $prodi->nama }} <em>({{ $prodi->jenjang }})</em></h1>
                <p class="hero-subtitle">{{ $prodi->deskripsi ?? ($prodi->jenjang . ' &mdash; STBA Pontianak') }}</p>
            </div>
            <div class="d-none d-md-flex flex-column gap-2 align-items-end mt-1">
                <span class="page-hero-mark">PRODI / {{ strtoupper($prodi->jenjang) }}</span>
            </div>
        </div>
    </div>
</div>

<section style="background: var(--paper);">
    <div class="container">
        <div class="row g-5 py-5">

            {{-- Main content --}}
            <div class="col-lg-8">

                {{-- Visi --}}
                @if ($prodi->visi)
                    <div class="mb-5">
                        <div style="display: flex; align-items: baseline; gap: 14px; margin-bottom: 16px;">
                            <span class="mono" style="font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--maroon);">&sect; 01</span>
                            <h2 class="h-display mb-0" style="font-size: 1.5rem;">Visi</h2>
                        </div>
                        <p style="font-family: var(--font-display); font-style: italic; font-size: 1.05rem; line-height: 1.75; color: var(--ink-2); border-left: 2px solid var(--maroon); padding-left: 20px; margin: 0;">{{ $prodi->visi }}</p>
                    </div>
                @endif

                {{-- Misi --}}
                @if ($prodi->misi)
                    <div class="mb-5">
                        <div style="display: flex; align-items: baseline; gap: 14px; margin-bottom: 16px;">
                            <span class="mono" style="font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--maroon);">&sect; 02</span>
                            <h2 class="h-display mb-0" style="font-size: 1.5rem;">Misi</h2>
                        </div>
                        <ol style="list-style: none; padding: 0; margin: 0;">
                            @foreach ($prodi->misi as $i => $m)
                                <li style="display: grid; grid-template-columns: 52px 1fr; gap: 0; padding: 16px 0; border-top: {{ $i === 0 ? '1px solid var(--rule)' : 'none' }}; border-bottom: 1px solid var(--rule-soft);">
                                    <span class="h-display" style="font-size: 1.4rem; color: var(--maroon); opacity: 0.45;">0{{ $i + 1 }}</span>
                                    <span style="color: var(--ink-2); line-height: 1.7;">{{ $m['item'] }}</span>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                @endif

                {{-- Tujuan --}}
                @if ($prodi->tujuan)
                    <div class="mb-5">
                        <div style="display: flex; align-items: baseline; gap: 14px; margin-bottom: 16px;">
                            <span class="mono" style="font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--maroon);">&sect; 03</span>
                            <h2 class="h-display mb-0" style="font-size: 1.5rem;">Tujuan</h2>
                        </div>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            @foreach ($prodi->tujuan as $t)
                                <li style="display: flex; gap: 10px; padding: 12px 0; border-bottom: 1px solid var(--rule-soft); font-size: 0.9rem; line-height: 1.6;">
                                    <span style="color: var(--maroon); margin-top: 3px;">&#8627;</span>
                                    <span style="color: var(--ink-2);">{{ $t['item'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Peminatan --}}
                @if ($prodi->peminatan)
                    <div class="mb-5">
                        <div style="display: flex; align-items: baseline; gap: 14px; margin-bottom: 20px;">
                            <span class="mono" style="font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--maroon);">&sect; 04</span>
                            <h2 class="h-display mb-0" style="font-size: 1.5rem;">Peminatan Studi</h2>
                        </div>
                        <div>
                            @foreach ($prodi->peminatan as $i => $p)
                                <div style="padding: 22px 0; border-top: 1px solid var(--rule); {{ ($i === count($prodi->peminatan) - 1) ? 'border-bottom: 1px solid var(--rule);' : '' }} display: grid; grid-template-columns: 60px 1fr; gap: 20px; align-items: start;">
                                    <div class="h-display" style="font-size: 2rem; color: var(--maroon); letter-spacing: -0.02em; line-height: 1;">0{{ $i + 1 }}</div>
                                    <div>
                                        <h4 class="h-card mb-2" style="font-size: 1.05rem; color: var(--ink);">{{ $p['judul'] }}</h4>
                                        <p style="color: var(--ink-2); font-size: 0.875rem; line-height: 1.7; margin: 0;">{{ $p['deskripsi'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Kurikulum --}}
                @if ($prodi->kurikulum)
                    <div class="mb-5">
                        <div style="display: flex; align-items: baseline; gap: 14px; margin-bottom: 16px;">
                            <span class="mono" style="font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--maroon);">&sect; 05</span>
                            <h2 class="h-display mb-0" style="font-size: 1.5rem;">Kurikulum</h2>
                        </div>
                        <p style="color: var(--ink-2); line-height: 1.75; margin-bottom: 16px;">{{ $prodi->kurikulum }}</p>
                        @if ($prodi->kurikulum_pdf_url)
                            <a href="{{ $prodi->kurikulum_pdf_url }}" target="_blank" class="link-more">
                                <i class="bi bi-file-earmark-pdf me-1"></i> Unduh ringkasan kurikulum selengkapnya <span class="arr">&#8594;</span>
                            </a>
                        @endif
                    </div>
                @endif

                {{-- Karir Lulusan --}}
                @if ($prodi->karir_list)
                    <div class="mb-5">
                        <div style="display: flex; align-items: baseline; gap: 14px; margin-bottom: 16px;">
                            <span class="mono" style="font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--maroon);">&sect; 06</span>
                            <h2 class="h-display mb-0" style="font-size: 1.5rem;">Karir Lulusan</h2>
                        </div>
                        @if ($prodi->karir_deskripsi)
                            <p style="color: var(--ink-2); line-height: 1.75; margin-bottom: 20px;">{{ $prodi->karir_deskripsi }}</p>
                        @endif
                        <ul style="list-style: none; padding: 0; display: grid; grid-template-columns: 1fr 1fr; gap: 0;">
                            @foreach ($prodi->karir_list as $k)
                                <li style="display: flex; gap: 10px; padding: 13px 14px; border-top: 1px solid var(--rule-soft); {{ $loop->even ? '' : 'border-right: 1px solid var(--rule-soft);' }} font-size: 0.875rem; line-height: 1.55;">
                                    <span style="color: var(--maroon); margin-top: 2px;">&#8627;</span>
                                    <span style="color: var(--ink-2);">{{ $k['item'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- CTA --}}
                <div style="padding: 32px; background: var(--paper-2); border: 1px solid var(--maroon-tint); display: grid; grid-template-columns: 1fr auto; gap: 20px; align-items: center;">
                    <div>
                        <h3 class="h-card mb-2" style="font-size: 1.2rem; color: var(--maroon);">Siap bergabung dengan {{ $prodi->jenjang }}?</h3>
                        <p style="color: var(--ink-2); font-size: 0.9rem; line-height: 1.65; margin: 0;">Dapatkan informasi pendaftaran dan beasiswa. Hubungi narahubung kami untuk konsultasi gratis.</p>
                    </div>
                    <a href="{{ route('pmb.daftar') }}" class="btn btn-maroon btn-sm px-4 flex-shrink-0">
                        Daftar Sekarang &#8594;
                    </a>
                </div>

            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">
                <div style="position: sticky; top: 24px;">
                    <div style="background: var(--paper-warm); border: 1px solid var(--rule-soft); padding: 28px;">
                        <div class="mono mb-4" style="font-size: 0.62rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--maroon);">&#8627; Lembar Ringkas</div>
                        @foreach([
                            ['Jenjang', $prodi->jenjang],
                            ['Nama Program', $prodi->nama],
                            ['Akreditasi', 'B — BAN-PT'],
                            ['Sistem Kuliah', 'Reguler · Eksekutif'],
                        ] as $f)
                            <div style="display: flex; justify-content: space-between; padding: 11px 0; border-bottom: 1px solid var(--rule-soft); font-size: 0.85rem; gap: 12px;">
                                <span class="mono" style="color: var(--muted); text-transform: uppercase; font-size: 0.62rem; letter-spacing: 0.12em; white-space: nowrap;">{{ $f[0] }}</span>
                                <span style="font-weight: 600; color: var(--ink); text-align: right;">{{ $f[1] }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div style="background: var(--ink); color: var(--paper); padding: 28px; margin-top: 16px;">
                        <div class="mono mb-3" style="font-size: 0.62rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--gold-soft);">Konsultasi</div>
                        <h4 class="h-card mb-2" style="font-size: 1rem; color: var(--paper); line-height: 1.3;">Ngobrol dengan Tim PMB</h4>
                        <p style="font-size: 0.82rem; color: rgba(250,245,236,0.7); line-height: 1.6; margin-bottom: 18px;">Konsultasi peminatan, beasiswa, dan alur pendaftaran tersedia setiap hari kerja.</p>
                        <a href="{{ route('kontak') }}" class="link-more" style="color: var(--gold-soft);">Lihat kontak kami <span class="arr">&#8594;</span></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
