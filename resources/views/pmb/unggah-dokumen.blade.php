@extends('layouts.pmb-dashboard')

@section('title', 'Unggah Dokumen PMB')

@section('content')
    {{-- Main Content Header --}}
    <div class="mb-4">
        <h1 class="h3 fw-bold mb-2 text-dark">Unggah Dokumen</h1>
        <p class="text-muted">Unggah dokumen di bawah ini untuk melengkapi pendaftaran Anda.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('pmb.unggah-dokumen.submit') }}" method="POST" enctype="multipart/form-data">
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

                        @if (optional($registration)->ijazah_path)
                            <div class="mb-3">
                                <div class="bg-light p-3 rounded-3 border d-flex align-items-center">
                                    <i class="bi bi-file-earmark-check-fill text-success fs-3 me-3"></i>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="small fw-bold text-dark">File Tersimpan</div>
                                        <div class="small text-muted text-truncate">
                                            {{-- Assuming the path is 'documents/ijazah/filename.ext' --}}
                                            <a href="{{ Storage::url($registration->ijazah_path) }}" target="_blank"
                                                class="text-decoration-none">
                                                Lihat Dokumen
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge bg-success mb-auto">Terupload</span>
                                </div>
                                <div class="form-text mt-2"><i class="bi bi-info-circle me-1"></i>Upload ulang jika ingin
                                    mengganti file.</div>
                            </div>
                        @endif

                        <input type="file" name="ijazah_rapor" id="ijazah_input"
                            class="form-control @error('ijazah_rapor') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">

                        {{-- Client-side Preview Container for Ijazah --}}
                        <div id="ijazah_preview_container" class="mt-3 d-none">
                            <div class="card border p-2">
                                <div class="d-flex align-items-center">
                                    <div id="ijazah_preview_icon" class="me-3 fs-1 text-danger"></div>
                                    <div class="overflow-hidden">
                                        <h6 class="mb-0 text-truncate" id="ijazah_filename">Filename.jpg</h6>
                                        <small class="text-muted" id="ijazah_filesize">0 KB</small>
                                    </div>
                                </div>
                                <img id="ijazah_preview_img" src="" class="img-fluid mt-2 rounded d-none"
                                    style="max-height: 200px; width: auto;">
                            </div>
                        </div>

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

                        @if (optional($registration)->foto_path)
                            <div class="mb-3">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="border rounded-2 p-1 bg-white shadow-sm"
                                        style="width: 100px; height: 120px;">
                                        <img src="{{ Storage::url($registration->foto_path) }}" alt="Preview Foto"
                                            class="w-100 h-100 object-fit-cover rounded-1">
                                    </div>
                                    <div>
                                        <div class="small fw-bold text-success mb-1"><i
                                                class="bi bi-check-circle-fill me-1"></i>Foto Tersimpan</div>
                                        <p class="small text-muted mb-0">Ini adalah foto yang akan digunakan untuk kartu
                                            ujian Anda.</p>
                                    </div>
                                </div>
                                <div class="form-text mt-2"><i class="bi bi-info-circle me-1"></i>Upload ulang jika ingin
                                    mengganti foto.</div>
                            </div>
                        @endif

                        <input type="file" name="pas_foto" id="foto_input"
                            class="form-control @error('pas_foto') is-invalid @enderror" accept=".jpg,.jpeg,.png">

                        {{-- Client-side Preview Container for Pas Foto --}}
                        <div id="foto_preview_container" class="mt-3 d-none">
                            <p class="small fw-bold mb-2">Preview Foto:</p>
                            <div class="border rounded-2 p-1 bg-white shadow-sm d-inline-block"
                                style="width: 120px; height: 150px;">
                                <img id="foto_preview_img" src="" alt="Preview Foto"
                                    class="w-100 h-100 object-fit-cover rounded-1">
                            </div>
                        </div>

                        @error('pas_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-maroon">
                        Kirim Dokumen
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
                        @if ($registration->ijazah_path)
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span class="small fw-bold text-success">Ijazah / rapor: Sudah diupload</span>
                        @else
                            <i class="bi bi-hourglass-split text-warning me-2"></i>
                            <span class="small text-muted">Ijazah / rapor: Menunggu upload</span>
                        @endif
                    </div>
                    <div class="d-flex align-items-center">
                        @if ($registration->foto_path)
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span class="small fw-bold text-success">Pas foto: Sudah diupload</span>
                        @else
                            <i class="bi bi-hourglass-split text-warning me-2"></i>
                            <span class="small text-muted">Pas foto: Menunggu upload</span>
                        @endif
                    </div>
                </div>

                @push('scripts')
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Preview Pas Foto
                            const fotoInput = document.getElementById('foto_input');
                            const fotoPreviewContainer = document.getElementById('foto_preview_container');
                            const fotoPreviewImg = document.getElementById('foto_preview_img');

                            if (fotoInput) {
                                fotoInput.addEventListener('change', function(e) {
                                    const file = e.target.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            fotoPreviewImg.src = e.target.result;
                                            fotoPreviewContainer.classList.remove('d-none');
                                        }
                                        reader.readAsDataURL(file);
                                    } else {
                                        fotoPreviewContainer.classList.add('d-none');
                                    }
                                });
                            }

                            // Preview Ijazah / Rapor
                            const ijazahInput = document.getElementById('ijazah_input');
                            const ijazahPreviewContainer = document.getElementById('ijazah_preview_container');
                            const ijazahFilename = document.getElementById('ijazah_filename');
                            const ijazahFilesize = document.getElementById('ijazah_filesize');
                            const ijazahPreviewImg = document.getElementById('ijazah_preview_img');
                            const ijazahPreviewIcon = document.getElementById('ijazah_preview_icon');

                            if (ijazahInput) {
                                ijazahInput.addEventListener('change', function(e) {
                                    const file = e.target.files[0];
                                    if (file) {
                                        ijazahPreviewContainer.classList.remove('d-none');
                                        ijazahFilename.textContent = file.name;
                                        ijazahFilesize.textContent = (file.size / 1024).toFixed(2) + ' KB';

                                        // Icon based on type
                                        if (file.type === 'application/pdf') {
                                            ijazahPreviewIcon.innerHTML = '<i class="bi bi-file-earmark-pdf-fill"></i>';
                                            ijazahPreviewImg.classList.add('d-none');
                                        } else if (file.type.startsWith('image/')) {
                                            ijazahPreviewIcon.innerHTML =
                                                '<i class="bi bi-file-earmark-image-fill text-primary"></i>';

                                            // Also show image preview
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                ijazahPreviewImg.src = e.target.result;
                                                ijazahPreviewImg.classList.remove('d-none');
                                            }
                                            reader.readAsDataURL(file);
                                        } else {
                                            ijazahPreviewIcon.innerHTML =
                                                '<i class="bi bi-file-earmark-fill text-secondary"></i>';
                                            ijazahPreviewImg.classList.add('d-none');
                                        }

                                    } else {
                                        ijazahPreviewContainer.classList.add('d-none');
                                    }
                                });
                            }
                        });
                    </script>
                @endpush
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Tips Upload Dokumen</h6>
                    <p class="small mb-2">• Gunakan scan/foto yang terang dan tidak blur.</p>
                    <p class="small mb-0">• Jika ukuran file terlalu besar, kompres terlebih dahulu.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
