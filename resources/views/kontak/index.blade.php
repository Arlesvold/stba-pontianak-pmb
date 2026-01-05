@extends('layouts.pmb')

@section('title', 'Kontak')

@section('content')
    <div class="container py-5">
        <h1 class="h3 mb-3" style="color: var(--primary-maroon);">Kontak PMB STBA Pontianak</h1>
        <p class="text-muted mb-4 small">
            Silakan hubungi narahubung berikut untuk informasi pendaftaran, program studi,
            dan bantuan teknis terkait PMB.
        </p>

        <div class="row g-4">
            {{-- Kontak 1 --}}
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex">
                        <div class="me-3 d-flex align-items-start">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                style="width:52px;height:52px;background:var(--primary-maroon);color:#fff;">
                                <i class="bi bi-person-lines-fill fs-4"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-semibold">Drs. Andi Pratama</h5>
                            <div class="small text-muted mb-2">Koordinator Penerimaan Mahasiswa Baru</div>
                            <div class="small mb-1">
                                <i class="bi bi-telephone me-1"></i> 0812‑3456‑7890
                            </div>
                            <div class="small mb-1">
                                <i class="bi bi-envelope me-1"></i>
                                <a href="mailto:andi.pmb@stbapontianak.ac.id" class="text-decoration-none">
                                    andi.pmb@stbapontianak.ac.id
                                </a>
                            </div>
                            <div class="small text-muted">
                                Jam layanan: Senin–Jumat, 08.00–15.00 WIB
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kontak 2 --}}
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex">
                        <div class="me-3 d-flex align-items-start">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                style="width:52px;height:52px;background:var(--primary-maroon);color:#fff;">
                                <i class="bi bi-headset fs-4"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-semibold">Rina Kartika, S.S.</h5>
                            <div class="small text-muted mb-2">Admin Informasi &amp; Layanan PMB</div>
                            <div class="small mb-1">
                                <i class="bi bi-whatsapp me-1"></i> 0851‑2345‑6789
                            </div>
                            <div class="small mb-1">
                                <i class="bi bi-envelope me-1"></i>
                                <a href="mailto:info.pmb@stbapontianak.ac.id" class="text-decoration-none">
                                    info.pmb@stbapontianak.ac.id
                                </a>
                            </div>
                            <div class="small text-muted">
                                Respons cepat melalui WhatsApp &amp; email pada jam kerja.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Alamat kampus singkat --}}
        <div class="mt-5">
            <h2 class="h6 fw-bold mb-2" style="color: var(--primary-maroon);">Alamat Kampus</h2>
            <p class="small text-muted mb-1">
                Jl. Contoh Alamat No. 123, Pontianak, Kalimantan Barat
            </p>
            <p class="small text-muted mb-0">
                Telp: (0561) 123456 • Website:
                <a href="https://www.stbapontianak.ac.id" target="_blank" class="text-decoration-none">
                    www.stbapontianak.ac.id
                </a>
            </p>
        </div>
    </div>
@endsection
