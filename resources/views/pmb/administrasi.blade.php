@extends('layouts.pmb-dashboard')

@section('title', 'Proses Administrasi PMB')

@section('content')
    {{-- Main Content Header --}}
    <div class="mb-4">
        <h1 class="h3 fw-bold mb-2 text-dark">Proses Administrasi</h1>
        <p class="text-muted">Unggah dokumen di bawah ini untuk melengkapi pendaftaran Anda.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('pmb.administrasi.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Upload ijazah/rapor --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h5 class="card-title fw-bold text-dark mb-0">
                            <i class="bi bi-file-earmark-text me-2" style="color: var(--primary-maroon);"></i>
                            Scan Ijazah / Rapor
                        </h5>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <p class="small text-muted mb-3">
                            Upload ijazah terakhir atau rapor (semester akhir). Format JPG, PNG, atau PDF, maks. 4 MB.
                        </p>

                        @if(optional($registration)->ijazah_path)
                            <div class="mb-3">
                                <div class="bg-light p-3 rounded-3 border d-flex align-items-center">
                                    <i class="bi bi-file-earmark-check-fill text-success fs-3 me-3"></i>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="small fw-bold text-dark">File Tersimpan</div>
                                        <div class="small text-muted text-truncate">
                                            {{-- Assuming the path is 'documents/ijazah/filename.ext' --}}
                                            <a href="{{ Storage::url($registration->ijazah_path) }}" target="_blank" class="text-decoration-none">
                                                Lihat Dokumen
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge bg-success mb-auto">Terupload</span>
                                </div>
                                <div class="form-text mt-2"><i class="bi bi-info-circle me-1"></i>Upload ulang jika ingin mengganti file.</div>
                            </div>
                        @endif

                        <input type="file" name="ijazah_rapor"
                            class="form-control @error('ijazah_rapor') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">
                        @error('ijazah_rapor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Upload pas foto --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h5 class="card-title fw-bold text-dark mb-0">
                            <i class="bi bi-person-bounding-box me-2" style="color: var(--primary-maroon);"></i>
                            Pas Foto
                        </h5>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <p class="small text-muted mb-3">
                            Latar belakang polos (disarankan biru/merah), ukuran minimal 3x4, format JPG/PNG, maks. 1 MB.
                        </p>

                        @if(optional($registration)->foto_path)
                            <div class="mb-3">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="border rounded-2 p-1 bg-white shadow-sm" style="width: 100px; height: 120px;">
                                         <img src="{{ Storage::url($registration->foto_path) }}" 
                                              alt="Preview Foto" 
                                              class="w-100 h-100 object-fit-cover rounded-1">
                                    </div>
                                    <div>
                                        <div class="small fw-bold text-success mb-1"><i class="bi bi-check-circle-fill me-1"></i>Foto Tersimpan</div>
                                        <p class="small text-muted mb-0">Ini adalah foto yang akan digunakan untuk kartu ujian Anda.</p>
                                    </div>
                                </div>
                                <div class="form-text mt-2"><i class="bi bi-info-circle me-1"></i>Upload ulang jika ingin mengganti foto.</div>
                            </div>
                        @endif

                        <input type="file" name="pas_foto" class="form-control @error('pas_foto') is-invalid @enderror" accept=".jpg,.jpeg,.png">
                        @error('pas_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Status Berkas</h6>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-hourglass-split text-warning me-2"></i>
                        <span class="small">Ijazah / rapor: menunggu upload</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-hourglass-split text-warning me-2"></i>
                        <span class="small">Pas foto: menunggu upload</span>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Tips Upload Dokumen</h6>
                    <p class="small mb-2">• Gunakan scan/foto yang terang dan tidak blur.</p>
                    <p class="small mb-2">• Pastikan nama pada dokumen sama dengan nama di formulir.</p>
                    <p class="small mb-0">• Jika ukuran file terlalu besar, kompres terlebih dahulu.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
