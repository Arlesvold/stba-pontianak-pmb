@extends('layouts.pmb-dashboard')

@section('title', 'Unggah Dokumen - PMB STBA Pontianak')

@push('styles')
<style>
    /* ---- Upload zone ---- */
    .upload-hint {
        font-size: 0.8125rem;
        color: #6b7280;
        margin-bottom: 0.875rem;
        line-height: 1.5;
    }

    .upload-hint strong {
        color: #374151;
        font-weight: 600;
    }

    .form-control[type="file"] {
        padding: 0.4375rem 0.875rem;
        cursor: pointer;
    }

    /* ---- Uploaded file indicator ---- */
    .file-uploaded-box {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        background: #f0fdf4;
        border: 1.5px solid #bbf7d0;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        margin-bottom: 0.75rem;
    }

    .file-uploaded-box .file-icon {
        font-size: 1.5rem;
        color: #16a34a;
        flex-shrink: 0;
    }

    .file-uploaded-box .file-info {
        flex: 1;
        min-width: 0;
    }

    .file-uploaded-box .file-info .label {
        font-size: 0.8125rem;
        font-weight: 600;
        color: #15803d;
    }

    .file-uploaded-box .file-info .link {
        font-size: 0.8125rem;
        color: #6b7280;
    }

    .file-uploaded-box .badge-uploaded {
        font-size: 0.7rem;
        font-weight: 600;
        background: #dcfce7;
        color: #15803d;
        padding: 0.25rem 0.625rem;
        border-radius: 9999px;
        flex-shrink: 0;
    }

    .replace-hint {
        font-size: 0.75rem;
        color: #9ca3af;
        margin-top: 0.375rem;
    }

    /* ---- File preview (after selecting) ---- */
    .file-preview-box {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        background: #f8f9fa;
        border: 1.5px solid #e5e7eb;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        margin-top: 0.625rem;
    }

    .file-preview-box .pv-icon {
        font-size: 1.5rem;
        color: #6b7280;
        flex-shrink: 0;
    }

    .file-preview-box .pv-info {
        flex: 1;
        min-width: 0;
    }

    .file-preview-box .pv-name {
        font-size: 0.875rem;
        font-weight: 600;
        color: #111827;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .file-preview-box .pv-size {
        font-size: 0.75rem;
        color: #6b7280;
    }

    .file-preview-box img {
        max-height: 180px;
        border-radius: 6px;
        margin-top: 0.5rem;
        display: block;
    }

    /* ---- Pas foto preview ---- */
    .foto-frame {
        width: 90px;
        height: 115px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        overflow: hidden;
        background: #f3f4f6;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .foto-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* ---- Status sidebar ---- */
    .status-item {
        display: flex;
        align-items: center;
        gap: 0.625rem;
        padding: 0.5rem 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .status-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .status-item .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .status-item .status-dot.done {
        background: #16a34a;
    }

    .status-item .status-dot.pending {
        background: #d1d5db;
    }

    .status-item .status-label {
        font-size: 0.8125rem;
        color: #374151;
        flex: 1;
    }

    .status-item .status-badge {
        font-size: 0.7rem;
        font-weight: 600;
        padding: 0.2rem 0.5rem;
        border-radius: 9999px;
    }

    .status-badge.done {
        background: #dcfce7;
        color: #15803d;
    }

    .status-badge.pending {
        background: #f3f4f6;
        color: #9ca3af;
    }

    @media (max-width: 991.98px) {
        .sticky-sidebar {
            position: static !important;
        }
    }
</style>
@endpush

@section('content')

    {{-- Page header --}}
    <div class="mb-4">
        <h1 class="fw-bold mb-1" style="font-size: 1.25rem; color: #111827;">Unggah Dokumen</h1>
        <p class="mb-0" style="font-size: 0.8125rem; color: #6b7280;">
            Langkah 2 dari 3 &mdash; Unggah semua dokumen yang diperlukan dalam format JPG, PNG, atau PDF.
        </p>
    </div>

    <div class="row g-4 align-items-start">

        {{-- ===== MAIN FORM ===== --}}
        <div class="col-lg-8">
            <form action="{{ route('pmb.unggah-dokumen.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ===== IJAZAH / RAPOR ===== --}}
                <div class="section-card card">
                    <div class="section-header">
                        <h2 class="section-title">
                            <span class="s-icon"><i class="bi bi-file-earmark-text-fill"></i></span>
                            Scan Ijazah / Rapor
                        </h2>
                    </div>
                    <div class="section-body">
                        <p class="upload-hint">
                            Upload <strong>ijazah terakhir</strong> atau <strong>rapor semester akhir</strong>.
                            Format JPG, PNG, atau PDF &mdash; maksimal <strong>4 MB</strong>.
                        </p>

                        @if (optional($registration)->ijazah_path)
                            <div class="file-uploaded-box">
                                <i class="bi bi-file-earmark-check-fill file-icon"></i>
                                <div class="file-info">
                                    <div class="label">File tersimpan</div>
                                    <div class="link">
                                        <a href="{{ Storage::url($registration->ijazah_path) }}" target="_blank"
                                            class="text-decoration-none" style="color: #6b7280;">Lihat dokumen</a>
                                    </div>
                                </div>
                                <span class="badge-uploaded">Terupload</span>
                            </div>
                            <p class="replace-hint"><i class="bi bi-info-circle me-1"></i>Upload ulang jika ingin mengganti file.</p>
                        @endif

                        <input type="file" name="ijazah_rapor" id="input_ijazah"
                            class="form-control @error('ijazah_rapor') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.pdf">

                        <div id="preview_ijazah" class="d-none">
                            <div class="file-preview-box flex-column align-items-start">
                                <div class="d-flex align-items-center gap-2 w-100">
                                    <i class="pv-icon" id="icon_ijazah"></i>
                                    <div class="pv-info">
                                        <div class="pv-name" id="name_ijazah"></div>
                                        <div class="pv-size" id="size_ijazah"></div>
                                    </div>
                                </div>
                                <img id="img_ijazah" src="" alt="Preview" class="d-none">
                            </div>
                        </div>

                        @error('ijazah_rapor')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- ===== KARTU KELUARGA ===== --}}
                <div class="section-card card">
                    <div class="section-header">
                        <h2 class="section-title">
                            <span class="s-icon"><i class="bi bi-people-fill"></i></span>
                            Kartu Keluarga (KK)
                        </h2>
                    </div>
                    <div class="section-body">
                        <p class="upload-hint">
                            Upload <strong>Kartu Keluarga</strong> yang masih berlaku.
                            Format JPG, PNG, atau PDF &mdash; maksimal <strong>4 MB</strong>.
                        </p>

                        @if (optional($registration)->kk_path)
                            <div class="file-uploaded-box">
                                <i class="bi bi-file-earmark-check-fill file-icon"></i>
                                <div class="file-info">
                                    <div class="label">File tersimpan</div>
                                    <div class="link">
                                        <a href="{{ Storage::url($registration->kk_path) }}" target="_blank"
                                            class="text-decoration-none" style="color: #6b7280;">Lihat dokumen</a>
                                    </div>
                                </div>
                                <span class="badge-uploaded">Terupload</span>
                            </div>
                            <p class="replace-hint"><i class="bi bi-info-circle me-1"></i>Upload ulang jika ingin mengganti file.</p>
                        @endif

                        <input type="file" name="kk" id="input_kk"
                            class="form-control @error('kk') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.pdf">

                        <div id="preview_kk" class="d-none">
                            <div class="file-preview-box flex-column align-items-start">
                                <div class="d-flex align-items-center gap-2 w-100">
                                    <i class="pv-icon" id="icon_kk"></i>
                                    <div class="pv-info">
                                        <div class="pv-name" id="name_kk"></div>
                                        <div class="pv-size" id="size_kk"></div>
                                    </div>
                                </div>
                                <img id="img_kk" src="" alt="Preview" class="d-none">
                            </div>
                        </div>

                        @error('kk')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- ===== TRANSKRIP NILAI ===== --}}
                <div class="section-card card">
                    <div class="section-header">
                        <h2 class="section-title">
                            <span class="s-icon"><i class="bi bi-file-earmark-bar-graph-fill"></i></span>
                            Transkrip Nilai
                        </h2>
                    </div>
                    <div class="section-body">
                        <p class="upload-hint">
                            Upload <strong>transkrip nilai terakhir</strong>.
                            Format JPG, PNG, atau PDF &mdash; maksimal <strong>4 MB</strong>.
                        </p>

                        @if (optional($registration)->transkrip_path)
                            <div class="file-uploaded-box">
                                <i class="bi bi-file-earmark-check-fill file-icon"></i>
                                <div class="file-info">
                                    <div class="label">File tersimpan</div>
                                    <div class="link">
                                        <a href="{{ Storage::url($registration->transkrip_path) }}" target="_blank"
                                            class="text-decoration-none" style="color: #6b7280;">Lihat dokumen</a>
                                    </div>
                                </div>
                                <span class="badge-uploaded">Terupload</span>
                            </div>
                            <p class="replace-hint"><i class="bi bi-info-circle me-1"></i>Upload ulang jika ingin mengganti file.</p>
                        @endif

                        <input type="file" name="transkrip_nilai" id="input_transkrip"
                            class="form-control @error('transkrip_nilai') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.pdf">

                        <div id="preview_transkrip" class="d-none">
                            <div class="file-preview-box flex-column align-items-start">
                                <div class="d-flex align-items-center gap-2 w-100">
                                    <i class="pv-icon" id="icon_transkrip"></i>
                                    <div class="pv-info">
                                        <div class="pv-name" id="name_transkrip"></div>
                                        <div class="pv-size" id="size_transkrip"></div>
                                    </div>
                                </div>
                                <img id="img_transkrip" src="" alt="Preview" class="d-none">
                            </div>
                        </div>

                        @error('transkrip_nilai')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- ===== PAS FOTO ===== --}}
                <div class="section-card card">
                    <div class="section-header">
                        <h2 class="section-title">
                            <span class="s-icon"><i class="bi bi-person-bounding-box"></i></span>
                            Pas Foto
                        </h2>
                    </div>
                    <div class="section-body">
                        <p class="upload-hint">
                            Latar belakang polos (<strong>disarankan biru atau merah</strong>), ukuran minimal 3&times;4.
                            Format JPG atau PNG &mdash; maksimal <strong>1 MB</strong>.
                        </p>

                        @if (optional($registration)->foto_path)
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="foto-frame">
                                    <img src="{{ Storage::url($registration->foto_path) }}" alt="Foto tersimpan">
                                </div>
                                <div>
                                    <div style="font-size: 0.8125rem; font-weight: 600; color: #15803d;">
                                        <i class="bi bi-check-circle-fill me-1"></i>Foto tersimpan
                                    </div>
                                    <p style="font-size: 0.8125rem; color: #6b7280;" class="mb-0 mt-1">
                                        Foto ini akan digunakan untuk kartu ujian Anda.
                                    </p>
                                </div>
                            </div>
                            <p class="replace-hint"><i class="bi bi-info-circle me-1"></i>Upload ulang jika ingin mengganti foto.</p>
                        @endif

                        <input type="file" name="pas_foto" id="input_foto"
                            class="form-control @error('pas_foto') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png">

                        <div id="preview_foto" class="d-none mt-2">
                            <p style="font-size: 0.8125rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Preview:</p>
                            <div class="foto-frame">
                                <img id="img_foto" src="" alt="Preview foto">
                            </div>
                        </div>

                        @error('pas_foto')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- ===== SUBMIT ===== --}}
                <div class="submit-bar">
                    <p class="hint mb-0">
                        <i class="bi bi-info-circle me-1"></i>
                        Pastikan semua dokumen terbaca jelas sebelum mengirim.
                    </p>
                    <button type="submit" class="btn-submit">
                        Kirim Dokumen
                        <i class="bi bi-arrow-right-short" style="font-size: 1.1rem;"></i>
                    </button>
                </div>

            </form>
        </div>

        {{-- ===== SIDEBAR ===== --}}
        <div class="col-lg-4">
            <div class="section-card card sticky-sidebar" style="top: 90px; position: sticky;">
                <div class="section-header">
                    <h2 class="section-title">
                        <span class="s-icon"><i class="bi bi-clipboard2-check-fill"></i></span>
                        Status Berkas
                    </h2>
                </div>
                <div class="section-body" style="padding-bottom: 1rem;">
                    <div class="status-item">
                        <span class="status-dot {{ $registration->ijazah_path ? 'done' : 'pending' }}"></span>
                        <span class="status-label">Ijazah / Rapor</span>
                        <span class="status-badge {{ $registration->ijazah_path ? 'done' : 'pending' }}">
                            {{ $registration->ijazah_path ? 'Terupload' : 'Belum' }}
                        </span>
                    </div>
                    <div class="status-item">
                        <span class="status-dot {{ $registration->kk_path ? 'done' : 'pending' }}"></span>
                        <span class="status-label">Kartu Keluarga</span>
                        <span class="status-badge {{ $registration->kk_path ? 'done' : 'pending' }}">
                            {{ $registration->kk_path ? 'Terupload' : 'Belum' }}
                        </span>
                    </div>
                    <div class="status-item">
                        <span class="status-dot {{ $registration->transkrip_path ? 'done' : 'pending' }}"></span>
                        <span class="status-label">Transkrip Nilai</span>
                        <span class="status-badge {{ $registration->transkrip_path ? 'done' : 'pending' }}">
                            {{ $registration->transkrip_path ? 'Terupload' : 'Belum' }}
                        </span>
                    </div>
                    <div class="status-item">
                        <span class="status-dot {{ $registration->foto_path ? 'done' : 'pending' }}"></span>
                        <span class="status-label">Pas Foto</span>
                        <span class="status-badge {{ $registration->foto_path ? 'done' : 'pending' }}">
                            {{ $registration->foto_path ? 'Terupload' : 'Belum' }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="section-card card">
                <div class="section-header">
                    <h2 class="section-title">
                        <span class="s-icon"><i class="bi bi-lightbulb-fill"></i></span>
                        Tips Upload
                    </h2>
                </div>
                <div class="section-body" style="padding-bottom: 1rem;">
                    <ul class="mb-0" style="font-size: 0.8125rem; color: #374151; padding-left: 1.25rem; line-height: 1.7;">
                        <li>Gunakan foto/scan yang terang dan tidak buram.</li>
                        <li>Pastikan semua teks pada dokumen terbaca jelas.</li>
                        <li>Jika file terlalu besar, kompres terlebih dahulu.</li>
                        <li>Pas foto harus tampak wajah secara jelas.</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
<script>
(function () {
    function fileSize(bytes) {
        if (bytes >= 1048576) return (bytes / 1048576).toFixed(1) + ' MB';
        return (bytes / 1024).toFixed(0) + ' KB';
    }

    function iconForType(type) {
        if (type === 'application/pdf') return '<i class="bi bi-file-earmark-pdf-fill" style="color:#ef4444;font-size:1.5rem;"></i>';
        if (type.startsWith('image/')) return '<i class="bi bi-file-earmark-image-fill" style="color:#3b82f6;font-size:1.5rem;"></i>';
        return '<i class="bi bi-file-earmark-fill" style="color:#6b7280;font-size:1.5rem;"></i>';
    }

    function setupDocPreview(inputId, previewId, iconId, nameId, sizeId, imgId) {
        var input   = document.getElementById(inputId);
        var preview = document.getElementById(previewId);
        if (!input || !preview) return;

        input.addEventListener('change', function () {
            var file = this.files[0];
            if (!file) { preview.classList.add('d-none'); return; }

            document.getElementById(iconId).innerHTML = iconForType(file.type);
            document.getElementById(nameId).textContent = file.name;
            document.getElementById(sizeId).textContent = fileSize(file.size);

            var img = document.getElementById(imgId);
            if (file.type.startsWith('image/')) {
                var reader = new FileReader();
                reader.onload = function (e) { img.src = e.target.result; img.classList.remove('d-none'); };
                reader.readAsDataURL(file);
            } else {
                img.classList.add('d-none');
            }
            preview.classList.remove('d-none');
        });
    }

    setupDocPreview('input_ijazah',    'preview_ijazah',    'icon_ijazah',    'name_ijazah',    'size_ijazah',    'img_ijazah');
    setupDocPreview('input_kk',        'preview_kk',        'icon_kk',        'name_kk',        'size_kk',        'img_kk');
    setupDocPreview('input_transkrip', 'preview_transkrip', 'icon_transkrip', 'name_transkrip', 'size_transkrip', 'img_transkrip');

    // Pas foto preview
    var inputFoto   = document.getElementById('input_foto');
    var previewFoto = document.getElementById('preview_foto');
    var imgFoto     = document.getElementById('img_foto');

    if (inputFoto) {
        inputFoto.addEventListener('change', function () {
            var file = this.files[0];
            if (!file) { previewFoto.classList.add('d-none'); return; }
            var reader = new FileReader();
            reader.onload = function (e) {
                imgFoto.src = e.target.result;
                previewFoto.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        });
    }
})();
</script>
@endpush
