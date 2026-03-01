@extends('layouts.pmb-dashboard')

@section('title', 'Verifikasi & Tes - PMB STBA Pontianak')

@section('content')
    <div class="mb-4">
        <h1 class="h3 fw-bold mb-2 text-dark">Status Pendaftaran</h1>
        <p class="text-muted">Pantau status verifikasi berkas dan jadwal tes seleksi Anda di sini.</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
    @endif

    {{-- Status Timeline --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            <div class="position-relative m-4">
                <div class="progress" style="height: 4px;">
                    <div class="progress-bar bg-maroon" role="progressbar"
                        style="width: {{ $registration->status == 'selesai' ? '100%' : ($registration->status == 'proses' ? '50%' : '0%') }};"
                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <button type="button"
                    class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-maroon rounded-pill fw-bold"
                    style="width: 2rem; height:2rem;">1</button>
                <button type="button"
                    class="position-absolute top-0 start-50 translate-middle btn btn-sm {{ $registration->status == 'proses' || $registration->status == 'selesai' ? 'btn-maroon' : 'btn-secondary' }} rounded-pill fw-bold"
                    style="width: 2rem; height:2rem;">2</button>
                <button type="button"
                    class="position-absolute top-0 start-100 translate-middle btn btn-sm {{ $registration->status == 'selesai' ? 'btn-maroon' : 'btn-secondary' }} rounded-pill fw-bold"
                    style="width: 2rem; height:2rem;">3</button>

                <div class="row mt-4 small fw-bold">
                    <div class="col-4 text-start">Berkas Masuk</div>
                    <div class="col-4 text-center">Verifikasi</div>
                    <div class="col-4 text-end">Selesai</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 mb-4 h-100">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                    <h5 class="card-title fw-bold text-dark mb-0">
                        <i class="bi bi-info-circle me-2" style="color: var(--primary-maroon);"></i>
                        Detail Status:
                        @if ($registration->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($registration->status == 'proses')
                            <span class="badge bg-info text-dark">Dalam Proses</span>
                        @elseif($registration->status == 'selesai')
                            <span class="badge bg-success">Selesai</span>
                        @endif
                    </h5>
                </div>
                <div class="card-body px-4 pb-4">
                    @if ($registration->status == 'pending')
                        <div class="alert alert-warning border-0 d-flex align-items-center" role="alert">
                            <i class="bi bi-hourglass-split fs-4 me-3"></i>
                            <div>
                                <strong>Menunggu Verifikasi Admin</strong>
                                <p class="mb-0 small">Berkas Anda sudah kami terima dan sedang dalam antrean verifikasi.
                                    Mohon menunggu 1-2 hari kerja.</p>
                            </div>
                        </div>
                        <p class="text-muted small">Tim PMB akan mengecek kelengkapan dokumen (Ijazah, Rapor, Foto, dll).
                        </p>
                    @elseif($registration->status == 'proses')
                        <div class="alert alert-info border-0 d-flex align-items-center" role="alert">
                            <i class="bi bi-gear-wide-connected fs-4 me-3"></i>
                            <div>
                                <strong>Sedang Diverifikasi</strong>
                                <p class="mb-0 small">Berkas sedang diperiksa oleh panitia. Pastikan nomor HP/Email Anda
                                    aktif jika kami perlu menghubungi Anda.</p>
                            </div>
                        </div>
                    @elseif($registration->status == 'selesai')
                        <div class="alert alert-success border-0 d-flex align-items-center" role="alert">
                            <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                            <div>
                                <strong>Verifikasi Selesai</strong>
                                <p class="mb-0 small">Berkas Anda valid. Silakan tunggu informasi selanjutnya melalui
                                    WhatsApp.</p>
                            </div>
                        </div>
                    @endif

                    {{-- Feedback dari Admin --}}
                    @if ($registration->feedback)
                        <div class="card mt-4 border-0 bg-light">
                            <div class="card-body">
                                <h6 class="fw-bold mb-2">
                                    <i class="bi bi-chat-left-text me-2" style="color: var(--primary-maroon);"></i>
                                    Feedback dari Admin
                                </h6>
                                <div class="p-3 bg-white rounded-3 border">
                                    <p class="mb-0">{{ $registration->feedback }}</p>
                                </div>
                                <small class="text-muted mt-2 d-block">
                                    <i class="bi bi-clock me-1"></i>
                                    Diperbarui: {{ $registration->updated_at->format('d M Y, H:i') }}
                                </small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            {{-- Summary Card --}}
            <div class="card border-0 shadow-sm rounded-4 mb-3">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Data Pendaftar</h6>
                    <ul class="list-unstyled small mb-0 spacing-y-2">
                        <li class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Nama:</span>
                            <span class="fw-bold text-end">{{ $registration->nama_lengkap }}</span>
                        </li>
                        <li class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Prodi:</span>
                            <span class="fw-bold text-end">{{ $registration->program_studi }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="text-muted">Tanggal Daftar:</span>
                            <span class="fw-bold text-end">{{ $registration->created_at->format('d M Y') }}</span>
                        </li>
                    </ul>
                    <hr>
                    <div class="d-grid">
                        <a href="{{ route('pmb.unggah-dokumen') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-eye me-2"></i>Lihat Dokumen
                        </a>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                    <h6 class="fw-bold mb-0">Bantuan ?</h6>
                </div>
                <div class="card-body px-4 pb-4">
                    <p class="small text-muted mb-3">Jika butuh bantuan, hubungi panitia PMB:</p>
                    <a href="#" class="btn btn-success btn-sm w-100 mb-2">
                        <i class="bi bi-whatsapp me-2"></i>Hubungi via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
