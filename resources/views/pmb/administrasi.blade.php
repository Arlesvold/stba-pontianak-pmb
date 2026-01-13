@extends('layouts.pmb')

@section('title', 'Proses Administrasi PMB')

@section('content')
    {{-- TRACK PROGRESS: langkah 2 aktif --}}
    <div class="border-bottom" style="background-color:#f8fafc;">
        <div class="container py-3">
            <div class="d-flex align-items-center justify-content-between">

                {{-- Step 1: sudah dilalui --}}
                <div class="d-flex align-items-center flex-fill">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width:32px;height:32px;
                                background-color: var(--primary-maroon);
                                color:#fff; font-size:14px;">
                        1
                    </div>
                    <div class="ms-2">
                        <div class="small fw-bold" style="color: var(--primary-maroon);">
                            Isi Formulir
                        </div>
                        <div class="small text-muted">Selesai</div>
                    </div>
                </div>

                <div class="flex-fill d-none d-md-block mx-2">
                    <div
                        style="height:3px; background: linear-gradient(to right, var(--primary-maroon), var(--primary-maroon));">
                    </div>
                </div>

                {{-- Step 2: aktif --}}
                <div class="d-flex align-items-center flex-fill">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width:32px;height:32px;
                                background-color: var(--primary-maroon);
                                color:#fff; font-size:14px;">
                        2
                    </div>
                    <div class="ms-2">
                        <div class="small fw-bold" style="color: var(--primary-maroon);">
                            Proses Administrasi
                        </div>
                        <div class="small text-muted">Upload berkas & pembayaran</div>
                    </div>
                </div>

                <div class="flex-fill d-none d-md-block mx-2">
                    <div style="height:3px; background-color:#e5e7eb;"></div>
                </div>

                {{-- Step 3 --}}
                <div class="d-flex align-items-center flex-fill d-none d-lg-flex">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width:32px;height:32px;
                                background-color:#e5e7eb;
                                color:#6b7280; font-size:14px;">
                        3
                    </div>
                    <div class="ms-2">
                        <div class="small fw-semibold text-muted">Verifikasi & Tes</div>
                        <div class="small text-muted">Menunggu jadwal</div>
                    </div>
                </div>

                <div class="flex-fill d-none d-lg-block mx-2">
                    <div style="height:3px; background-color:#e5e7eb;"></div>
                </div>

                {{-- Step 4 --}}
                <div class="d-flex align-items-center flex-fill d-none d-xl-flex">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width:32px;height:32px;
                                background-color:#e5e7eb;
                                color:#6b7280; font-size:14px;">
                        4
                    </div>
                    <div class="ms-2">
                        <div class="small fw-semibold text-muted">Pengumuman</div>
                        <div class="small text-muted">Registrasi ulang</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="h4 mb-3" style="color: var(--primary-maroon);">
                    Proses Administrasi PMB
                </h1>
                <p class="text-muted mb-4">
                    Unggah dokumen di bawah ini untuk melengkapi pendaftaran Anda. Gunakan scan/foto yang jelas
                    dan pastikan ukuran file tidak melebihi batas yang ditentukan.
                </p>

                <form action="{{ route('pmb.administrasi.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Upload ijazah/rapor --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-2">Scan Ijazah / Rapor</h5>
                            <p class="small text-muted mb-3">
                                Upload ijazah terakhir atau rapor (semester akhir). Format JPG, PNG, atau PDF, maks. 4 MB.
                            </p>
                            <div class="mb-3">
                                <input type="file" name="ijazah_rapor"
                                    class="form-control @error('ijazah_rapor') is-invalid @enderror">
                                @error('ijazah_rapor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Upload pas foto --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-2">Pas Foto</h5>
                            <p class="small text-muted mb-3">
                                Latar belakang polos (disarankan biru/merah), ukuran minimal 3x4, format JPG/PNG, maks. 1
                                MB.
                            </p>
                            <div class="mb-3">
                                <input type="file" name="pas_foto"
                                    class="form-control @error('pas_foto') is-invalid @enderror">
                                @error('pas_foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-maroon">
                            Kirim Dokumen Administrasi
                        </button>
                    </div>
                </form>
            </div>

            {{-- Ringkasan status / tips --}}
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card border-0 shadow-sm rounded-4 mb-3">
                    <div class="card-body">
                        <h6 class="fw-bold mb-2">Status Berkas</h6>
                        <ul class="small mb-0">
                            <li class="mb-1">Ijazah / rapor: <span class="text-muted">menunggu upload</span></li>
                            <li>Pas foto: <span class="text-muted">menunggu upload</span></li>
                        </ul>
                        {{-- nanti bisa diganti dinamis sesuai data di database --}}
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-2">Tips Upload Dokumen</h6>
                        <p class="small mb-1">• Gunakan scan/foto yang terang dan tidak blur.</p>
                        <p class="small mb-1">• Pastikan nama pada dokumen sama dengan nama di formulir.</p>
                        <p class="small mb-0">• Jika ukuran file terlalu besar, kompres terlebih dahulu sebelum upload.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
