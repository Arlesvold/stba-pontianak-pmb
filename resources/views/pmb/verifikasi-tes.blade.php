@extends('layouts.pmb-dashboard')

@section('title', 'Status Pendaftaran - PMB STBA Pontianak')

@push('styles')
<style>
    /* ---- Progress tracker ---- */
    .tracker {
        display: flex;
        align-items: flex-start;
        gap: 0;
        padding: 0.5rem 0;
    }

    .tracker-step {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        text-align: center;
    }

    .tracker-step:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 15px;
        left: calc(50% + 16px);
        right: calc(-50% + 16px);
        height: 2px;
        background: #e5e7eb;
        z-index: 0;
    }

    .tracker-step.done:not(:last-child)::after,
    .tracker-step.active:not(:last-child)::after {
        background: var(--primary-maroon);
    }

    .tracker-step.done:not(:last-child)::after {
        background: var(--primary-maroon);
    }

    /* only color line after "done" steps */
    .tracker-step.pending:not(:last-child)::after {
        background: #e5e7eb;
    }

    .tracker-circle {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8125rem;
        font-weight: 700;
        z-index: 1;
        position: relative;
        transition: all 0.2s;
    }

    .tracker-step.done .tracker-circle {
        background: var(--primary-maroon);
        color: #fff;
        border: 2px solid var(--primary-maroon);
    }

    .tracker-step.active .tracker-circle {
        background: #fff;
        color: var(--primary-maroon);
        border: 2px solid var(--primary-maroon);
        box-shadow: 0 0 0 4px rgba(123, 30, 48, 0.1);
    }

    .tracker-step.pending .tracker-circle {
        background: #f3f4f6;
        color: #9ca3af;
        border: 2px solid #e5e7eb;
    }

    .tracker-label {
        font-size: 0.75rem;
        font-weight: 600;
        margin-top: 0.5rem;
        line-height: 1.3;
    }

    .tracker-step.done .tracker-label,
    .tracker-step.active .tracker-label {
        color: var(--primary-maroon);
    }

    .tracker-step.pending .tracker-label {
        color: #9ca3af;
    }

    /* ---- Status banner ---- */
    .status-banner {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem 1.125rem;
        border-radius: 10px;
        margin-bottom: 1rem;
    }

    .status-banner.pending {
        background: #fffbeb;
        border: 1.5px solid #fde68a;
    }

    .status-banner.proses {
        background: #eff6ff;
        border: 1.5px solid #bfdbfe;
    }

    .status-banner.selesai {
        background: #f0fdf4;
        border: 1.5px solid #bbf7d0;
    }

    .status-banner .banner-icon {
        font-size: 1.375rem;
        flex-shrink: 0;
        line-height: 1;
    }

    .status-banner.pending .banner-icon { color: #d97706; }
    .status-banner.proses  .banner-icon { color: #2563eb; }
    .status-banner.selesai .banner-icon { color: #16a34a; }

    .status-banner .banner-title {
        font-size: 0.9375rem;
        font-weight: 700;
        margin-bottom: 0.2rem;
    }

    .status-banner.pending .banner-title { color: #92400e; }
    .status-banner.proses  .banner-title { color: #1e40af; }
    .status-banner.selesai .banner-title { color: #15803d; }

    .status-banner .banner-desc {
        font-size: 0.8125rem;
        line-height: 1.55;
        margin: 0;
    }

    .status-banner.pending .banner-desc { color: #78350f; }
    .status-banner.proses  .banner-desc { color: #1e3a8a; }
    .status-banner.selesai .banner-desc { color: #14532d; }

    /* ---- Feedback box ---- */
    .feedback-box {
        background: #f9fafb;
        border: 1.5px solid #e5e7eb;
        border-radius: 10px;
        padding: 1rem 1.125rem;
        margin-top: 1rem;
    }

    .feedback-box .fb-label {
        font-size: 0.8125rem;
        font-weight: 700;
        color: #374151;
        margin-bottom: 0.625rem;
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .feedback-box .fb-label i {
        color: var(--primary-maroon);
    }

    .feedback-box .fb-content {
        font-size: 0.875rem;
        color: #111827;
        line-height: 1.6;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 0.75rem 1rem;
    }

    .feedback-box .fb-time {
        font-size: 0.75rem;
        color: #9ca3af;
        margin-top: 0.5rem;
    }

    /* ---- Summary list in sidebar ---- */
    .summary-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .summary-list li {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        gap: 0.5rem;
        padding: 0.5rem 0;
        border-bottom: 1px solid #f3f4f6;
        font-size: 0.8125rem;
    }

    .summary-list li:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .summary-list .sl-label {
        color: #6b7280;
        flex-shrink: 0;
    }

    .summary-list .sl-value {
        font-weight: 600;
        color: #111827;
        text-align: right;
    }

    /* ---- Contact button ---- */
    .btn-wa {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        background: #16a34a;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 0.625rem 1rem;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        width: 100%;
        transition: background 0.2s;
    }

    .btn-wa:hover {
        background: #15803d;
        color: #fff;
    }

    .btn-outline-doc {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        background: #fff;
        color: #374151;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        padding: 0.5625rem 1rem;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        width: 100%;
        transition: border-color 0.15s, background 0.15s;
        margin-top: 0.625rem;
    }

    .btn-outline-doc:hover {
        border-color: var(--primary-maroon);
        color: var(--primary-maroon);
        background: rgba(123, 30, 48, 0.03);
    }
</style>
@endpush

@section('content')

    {{-- Page header --}}
    <div class="mb-4">
        <h1 class="fw-bold mb-1" style="font-size: 1.25rem; color: #111827;">Status Pendaftaran</h1>
        <p class="mb-0" style="font-size: 0.8125rem; color: #6b7280;">
            Langkah 3 dari 3 &mdash; Pantau progres verifikasi berkas Anda di bawah ini.
        </p>
    </div>

    @if (session('success'))
        <div class="status-banner selesai mb-4">
            <i class="bi bi-check-circle-fill banner-icon"></i>
            <div>
                <div class="banner-title">Berhasil</div>
                <p class="banner-desc">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if (session('success') && $waAdmin)
        @php
            $waMessage = urlencode(
                "Halo Admin PMB STBA Pontianak, saya {$registration->nama_lengkap} baru saja mengunggah dokumen pendaftaran.\n\n"
                . "Detail:\n"
                . "Nama: {$registration->nama_lengkap}\n"
                . "Program Studi: {$registration->program_studi}\n"
                . "Sistem Kuliah: {$registration->sistem_kuliah}\n"
                . "No. HP: {$registration->no_hp}\n\n"
                . "Mohon segera ditindaklanjuti. Terima kasih."
            );
        @endphp
        <div class="status-banner proses mb-4">
            <i class="bi bi-whatsapp banner-icon" style="color: #16a34a;"></i>
            <div style="flex: 1;">
                <div class="banner-title" style="color: #15803d;">Beritahu Admin via WhatsApp</div>
                <p class="banner-desc" style="color: #14532d; margin-bottom: 0.75rem;">
                    Dokumen Anda sudah diterima. Kirim notifikasi ke admin PMB agar proses verifikasi lebih cepat.
                </p>
                <a href="https://wa.me/{{ $waAdmin }}?text={{ $waMessage }}"
                   target="_blank"
                   class="btn-wa"
                   style="display: inline-flex; width: auto; padding: 0.5rem 1.25rem;">
                    <i class="bi bi-whatsapp"></i> Kirim Notifikasi ke Admin
                </a>
            </div>
        </div>
    @endif

    {{-- ===== PROGRESS TRACKER ===== --}}
    @php
        $isDone   = $registration->status === 'selesai';
        $isProses = $registration->status === 'proses';

        $step1 = 'done';
        $step2 = $isDone ? 'done' : ($isProses ? 'active' : 'pending');
        $step3 = $isDone ? 'active' : 'pending';
    @endphp

    <div class="section-card card mb-4">
        <div class="section-body">
            <div class="tracker">
                <div class="tracker-step {{ $step1 }}">
                    <div class="tracker-circle">
                        <i class="bi bi-check-lg" style="font-size: 0.875rem;"></i>
                    </div>
                    <div class="tracker-label">Berkas Masuk</div>
                </div>

                <div class="tracker-step {{ $step2 }}">
                    <div class="tracker-circle">
                        @if ($isDone)
                            <i class="bi bi-check-lg" style="font-size: 0.875rem;"></i>
                        @else
                            2
                        @endif
                    </div>
                    <div class="tracker-label">Verifikasi</div>
                </div>

                <div class="tracker-step {{ $step3 }}">
                    <div class="tracker-circle">
                        @if ($isDone)
                            <i class="bi bi-check-lg" style="font-size: 0.875rem;"></i>
                        @else
                            3
                        @endif
                    </div>
                    <div class="tracker-label">Selesai</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 align-items-start">

        {{-- ===== MAIN STATUS DETAIL ===== --}}
        <div class="col-lg-8">
            <div class="section-card card">
                <div class="section-header">
                    <h2 class="section-title">
                        <span class="s-icon"><i class="bi bi-info-circle-fill"></i></span>
                        Detail Status
                        @if ($registration->status === 'pending')
                            <span style="font-size: 0.7rem; font-weight: 600; padding: 0.2rem 0.625rem; border-radius: 9999px; background: #fef3c7; color: #92400e; margin-left: 0.25rem;">Menunggu</span>
                        @elseif ($registration->status === 'proses')
                            <span style="font-size: 0.7rem; font-weight: 600; padding: 0.2rem 0.625rem; border-radius: 9999px; background: #dbeafe; color: #1e40af; margin-left: 0.25rem;">Dalam Proses</span>
                        @elseif ($registration->status === 'selesai')
                            <span style="font-size: 0.7rem; font-weight: 600; padding: 0.2rem 0.625rem; border-radius: 9999px; background: #dcfce7; color: #15803d; margin-left: 0.25rem;">Selesai</span>
                        @endif
                    </h2>
                </div>
                <div class="section-body">

                    @if ($registration->status === 'pending')
                        <div class="status-banner pending">
                            <i class="bi bi-hourglass-split banner-icon"></i>
                            <div>
                                <div class="banner-title">Menunggu Verifikasi Admin</div>
                                <p class="banner-desc">
                                    Berkas Anda sudah kami terima dan sedang dalam antrean verifikasi.
                                    Mohon menunggu <strong>1&ndash;2 hari kerja</strong>.
                                </p>
                            </div>
                        </div>
                        <p style="font-size: 0.8125rem; color: #6b7280; margin: 0;">
                            Tim PMB akan mengecek kelengkapan seluruh dokumen yang Anda unggah.
                            Anda akan dihubungi jika ada kekurangan.
                        </p>

                    @elseif ($registration->status === 'proses')
                        <div class="status-banner proses">
                            <i class="bi bi-gear-wide-connected banner-icon"></i>
                            <div>
                                <div class="banner-title">Sedang Diverifikasi</div>
                                <p class="banner-desc">
                                    Berkas sedang diperiksa oleh panitia PMB.
                                    Pastikan nomor HP dan email Anda aktif agar kami dapat menghubungi Anda.
                                </p>
                            </div>
                        </div>

                    @elseif ($registration->status === 'selesai')
                        <div class="status-banner selesai">
                            <i class="bi bi-check-circle-fill banner-icon"></i>
                            <div>
                                <div class="banner-title">Verifikasi Selesai</div>
                                <p class="banner-desc">
                                    Berkas Anda telah terverifikasi dan dinyatakan valid.
                                    Silakan tunggu informasi selanjutnya melalui WhatsApp atau email Anda.
                                </p>
                            </div>
                        </div>
                    @endif

                    {{-- Feedback dari Admin --}}
                    @if ($registration->feedback)
                        <div class="feedback-box">
                            <div class="fb-label">
                                <i class="bi bi-chat-left-quote-fill"></i>
                                Catatan dari Admin
                            </div>
                            <div class="fb-content">{{ $registration->feedback }}</div>
                            <div class="fb-time">
                                <i class="bi bi-clock me-1"></i>
                                Diperbarui: {{ $registration->updated_at->format('d M Y, H:i') }} WIB
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        {{-- ===== SIDEBAR ===== --}}
        <div class="col-lg-4">

            {{-- Data ringkasan --}}
            <div class="section-card card" style="position: sticky; top: 90px;">
                <div class="section-header">
                    <h2 class="section-title">
                        <span class="s-icon"><i class="bi bi-person-fill"></i></span>
                        Data Pendaftar
                    </h2>
                </div>
                <div class="section-body">
                    <ul class="summary-list">
                        <li>
                            <span class="sl-label">Nama</span>
                            <span class="sl-value">{{ $registration->nama_lengkap }}</span>
                        </li>
                        <li>
                            <span class="sl-label">Program Studi</span>
                            <span class="sl-value">{{ $registration->program_studi }}</span>
                        </li>
                        <li>
                            <span class="sl-label">Sistem Kuliah</span>
                            <span class="sl-value">{{ $registration->sistem_kuliah }}</span>
                        </li>
                        <li>
                            <span class="sl-label">Tanggal Daftar</span>
                            <span class="sl-value">{{ $registration->created_at->format('d M Y') }}</span>
                        </li>
                    </ul>

                    <div class="mt-3">
                        <a href="{{ route('pmb.unggah-dokumen') }}" class="btn-outline-doc">
                            <i class="bi bi-folder2-open"></i> Lihat Dokumen Saya
                        </a>
                    </div>
                </div>
            </div>

            {{-- Bantuan --}}
            <div class="section-card card">
                <div class="section-header">
                    <h2 class="section-title">
                        <span class="s-icon"><i class="bi bi-headset"></i></span>
                        Butuh Bantuan?
                    </h2>
                </div>
                <div class="section-body">
                    <p style="font-size: 0.8125rem; color: #6b7280; margin-bottom: 0.875rem;">
                        Hubungi panitia PMB jika ada pertanyaan seputar proses pendaftaran Anda.
                    </p>
                    @if ($waAdmin)
                        <a href="https://wa.me/{{ $waAdmin }}" target="_blank" class="btn-wa">
                            <i class="bi bi-whatsapp" style="font-size: 1rem;"></i>
                            Hubungi via WhatsApp
                        </a>
                    @else
                        <p style="font-size: 0.8125rem; color: #9ca3af; margin: 0;">
                            Nomor WhatsApp admin belum dikonfigurasi.
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

@endsection
