{{-- resources/views/pmb/daftar.blade.php --}}
@extends('layouts.pmb-dashboard')

@section('title', 'Isi Formulir - PMB STBA Pontianak')

@push('styles')
<style>
    /* ---- Gender inline radio ---- */
    .gender-group {
        display: flex;
        gap: 0.625rem;
        flex-wrap: wrap;
    }

    .gender-option {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        cursor: pointer;
        font-size: 0.875rem;
        font-weight: 500;
        color: #374151;
        transition: border-color 0.15s, background 0.15s, color 0.15s;
        user-select: none;
    }

    .gender-option input[type="radio"] {
        accent-color: var(--primary-maroon);
        width: 15px;
        height: 15px;
        cursor: pointer;
    }

    .gender-option:has(input:checked) {
        border-color: var(--primary-maroon);
        background: rgba(123, 30, 48, 0.05);
        color: var(--primary-maroon);
    }

    /* ---- Option cards (program studi / sistem kuliah) ---- */
    .option-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.75rem;
    }

    @media (max-width: 575.98px) {
        .option-grid {
            grid-template-columns: 1fr;
        }
    }

    .option-card {
        position: relative;
    }

    .option-card input[type="radio"] {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
        pointer-events: none;
    }

    .option-card label {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.875rem 1rem;
        border: 1.5px solid #e5e7eb;
        border-radius: 10px;
        cursor: pointer;
        transition: border-color 0.15s, background 0.15s, color 0.15s;
        background: #fff;
        margin: 0;
        user-select: none;
    }

    .option-card label:hover {
        border-color: #c0a0a8;
        background: #fdf8f8;
    }

    .option-card input[type="radio"]:checked + label {
        border-color: var(--primary-maroon);
        background: rgba(123, 30, 48, 0.05);
    }

    .radio-dot {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        border: 2px solid #d1d5db;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: border-color 0.15s, background 0.15s;
    }

    .option-card input[type="radio"]:checked + label .radio-dot {
        border-color: var(--primary-maroon);
        background: var(--primary-maroon);
    }

    .radio-dot::after {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: transparent;
        transition: background 0.15s;
    }

    .option-card input[type="radio"]:checked + label .radio-dot::after {
        background: #fff;
    }

    .option-text strong {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: #111827;
        line-height: 1.3;
    }

    .option-card input[type="radio"]:checked + label .option-text strong {
        color: var(--primary-maroon);
    }

    .option-text small {
        font-size: 0.75rem;
        color: #6b7280;
        font-weight: 400;
    }

    /* ---- Declaration ---- */
    .declaration-box {
        background: #f9fafb;
        border: 1.5px solid #e5e7eb;
        border-radius: 10px;
        padding: 1rem 1.125rem;
        transition: border-color 0.15s, background 0.15s;
    }

    .declaration-box.checked {
        background: rgba(123, 30, 48, 0.04);
        border-color: rgba(123, 30, 48, 0.35);
    }

    .declaration-box .form-check-input {
        width: 1.1em;
        height: 1.1em;
        margin-top: 0.15em;
        accent-color: var(--primary-maroon);
        flex-shrink: 0;
        cursor: pointer;
    }

    .declaration-box .form-check-label {
        font-size: 0.875rem;
        color: #374151;
        line-height: 1.55;
        cursor: pointer;
    }

</style>
@endpush

@section('content')

    {{-- Page header --}}
    <div class="mb-4">
        <h1 class="fw-bold mb-1" style="font-size: 1.25rem; color: #111827;">Formulir Pendaftaran</h1>
        <p class="mb-0" style="font-size: 0.8125rem; color: #6b7280;">
            Langkah 1 dari 3 &mdash; Lengkapi data diri dengan benar sesuai dokumen asli.
        </p>
    </div>

    <form action="{{ route('pmb.daftar.submit') }}" method="POST" id="form-pendaftaran" novalidate>
        @csrf

        {{-- ===== DATA PRIBADI ===== --}}
        <div class="section-card card">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="s-icon"><i class="bi bi-person-lines-fill"></i></span>
                    Data Pribadi
                </h2>
            </div>
            <div class="section-body">

                <div class="mb-3">
                    <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap"
                        value="{{ old('nama_lengkap', optional($registration)->nama_lengkap) }}"
                        class="form-control @error('nama_lengkap') is-invalid @enderror"
                        placeholder="Sesuai ijazah / KTP">
                    @error('nama_lengkap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="nik">NIK</label>
                        <input type="text" id="nik" name="nik"
                            value="{{ old('nik', optional($registration)->nik) }}"
                            class="form-control @error('nik') is-invalid @enderror"
                            placeholder="16 digit, sesuai KTP"
                            inputmode="numeric" maxlength="16" pattern="\d{16}">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', optional($registration)->tanggal_lahir) }}"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Jenis Kelamin</label>
                    <div class="gender-group">
                        <label class="gender-option">
                            <input type="radio" name="jenis_kelamin" value="L"
                                {{ old('jenis_kelamin', optional($registration)->jenis_kelamin) == 'L' ? 'checked' : '' }}>
                            <i class="bi bi-gender-male" style="font-size: 1rem;"></i> Laki-laki
                        </label>
                        <label class="gender-option">
                            <input type="radio" name="jenis_kelamin" value="P"
                                {{ old('jenis_kelamin', optional($registration)->jenis_kelamin) == 'P' ? 'checked' : '' }}>
                            <i class="bi bi-gender-female" style="font-size: 1rem;"></i> Perempuan
                        </label>
                    </div>
                    @error('jenis_kelamin')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email"
                            value="{{ old('email', optional($registration)->email) }}"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="email@contoh.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="no_hp">No. HP (WhatsApp)</label>
                        <input type="text" id="no_hp" name="no_hp"
                            value="{{ old('no_hp', optional($registration)->no_hp) }}"
                            class="form-control @error('no_hp') is-invalid @enderror"
                            placeholder="08xxxxxxxxxx"
                            inputmode="numeric" maxlength="15">
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-0">
                    <label class="form-label" for="alamat">Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat"
                        class="form-control @error('alamat') is-invalid @enderror"
                        rows="2"
                        placeholder="Sesuai KTP / domisili">{{ old('alamat', optional($registration)->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

        {{-- ===== PILIHAN STUDI ===== --}}
        <div class="section-card card">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="s-icon"><i class="bi bi-mortarboard-fill"></i></span>
                    Pilihan Studi
                </h2>
            </div>
            <div class="section-body">

                <div class="mb-4">
                    <label class="form-label d-block mb-2">Program Studi</label>
                    <div class="option-grid">
                        <div class="option-card">
                            <input type="radio" id="prodi_d3" name="program_studi"
                                value="D3 Bahasa Inggris"
                                {{ old('program_studi', optional($registration)->program_studi) == 'D3 Bahasa Inggris' ? 'checked' : '' }}>
                            <label for="prodi_d3">
                                <span class="radio-dot"></span>
                                <span class="option-text">
                                    <strong>Diploma III (D3)</strong>
                                    <small>Bahasa Inggris</small>
                                </span>
                            </label>
                        </div>
                        <div class="option-card">
                            <input type="radio" id="prodi_s1" name="program_studi"
                                value="S1 Sastra Inggris"
                                {{ old('program_studi', optional($registration)->program_studi) == 'S1 Sastra Inggris' ? 'checked' : '' }}>
                            <label for="prodi_s1">
                                <span class="radio-dot"></span>
                                <span class="option-text">
                                    <strong>Sarjana (S1)</strong>
                                    <small>Sastra Inggris</small>
                                </span>
                            </label>
                        </div>
                    </div>
                    @error('program_studi')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-0">
                    <label class="form-label d-block mb-2">Sistem Kuliah</label>
                    <div class="option-grid">
                        <div class="option-card">
                            <input type="radio" id="reguler" name="sistem_kuliah"
                                value="Reguler (Pagi)"
                                {{ old('sistem_kuliah', optional($registration)->sistem_kuliah) == 'Reguler (Pagi)' ? 'checked' : '' }}>
                            <label for="reguler">
                                <span class="radio-dot"></span>
                                <span class="option-text">
                                    <strong>Reguler</strong>
                                    <small>Pagi hari</small>
                                </span>
                            </label>
                        </div>
                        <div class="option-card">
                            <input type="radio" id="eksekutif" name="sistem_kuliah"
                                value="Eksekutif (Malam)"
                                {{ old('sistem_kuliah', optional($registration)->sistem_kuliah) == 'Eksekutif (Malam)' ? 'checked' : '' }}>
                            <label for="eksekutif">
                                <span class="radio-dot"></span>
                                <span class="option-text">
                                    <strong>Eksekutif</strong>
                                    <small>Malam hari</small>
                                </span>
                            </label>
                        </div>
                    </div>
                    @error('sistem_kuliah')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

        {{-- ===== PENDIDIKAN TERAKHIR ===== --}}
        <div class="section-card card">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="s-icon"><i class="bi bi-building-fill"></i></span>
                    Pendidikan Terakhir
                </h2>
            </div>
            <div class="section-body">

                <div class="mb-3">
                    <label class="form-label" for="sekolah_asal">Nama Sekolah Asal</label>
                    <input type="text" id="sekolah_asal" name="sekolah_asal"
                        value="{{ old('sekolah_asal', optional($registration)->sekolah_asal) }}"
                        class="form-control @error('sekolah_asal') is-invalid @enderror"
                        placeholder="Contoh: SMA Negeri 1 Pontianak">
                    @error('sekolah_asal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 mb-0">
                    <div class="col-md-6">
                        <label class="form-label" for="jurusan_sekolah">Jurusan</label>
                        <input type="text" id="jurusan_sekolah" name="jurusan_sekolah"
                            value="{{ old('jurusan_sekolah', optional($registration)->jurusan_sekolah) }}"
                            class="form-control @error('jurusan_sekolah') is-invalid @enderror"
                            placeholder="Contoh: IPA / IPS / Bahasa">
                        @error('jurusan_sekolah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="tahun_lulus">Tahun Lulus</label>
                        <input type="text" id="tahun_lulus" name="tahun_lulus"
                            value="{{ old('tahun_lulus', optional($registration)->tahun_lulus) }}"
                            class="form-control @error('tahun_lulus') is-invalid @enderror"
                            placeholder="Contoh: 2024"
                            inputmode="numeric" maxlength="4" pattern="\d{4}">
                        @error('tahun_lulus')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
        </div>

        {{-- ===== PERNYATAAN ===== --}}
        <div class="section-card card">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="s-icon"><i class="bi bi-shield-check-fill"></i></span>
                    Pernyataan
                </h2>
            </div>
            <div class="section-body">
                <div class="declaration-box" id="declarationBox">
                    <div class="form-check d-flex align-items-start gap-2 m-0">
                        <input class="form-check-input @error('setuju') is-invalid @enderror"
                            type="checkbox" id="setuju" name="setuju" value="1"
                            {{ old('setuju') ? 'checked' : '' }}>
                        <label class="form-check-label" for="setuju">
                            Saya menyatakan bahwa seluruh data yang saya isi adalah
                            <strong>benar dan dapat dipertanggungjawabkan</strong>,
                            serta bersedia mengikuti ketentuan Penerimaan Mahasiswa Baru (PMB)
                            STBA Pontianak.
                        </label>
                        @error('setuju')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== SUBMIT ===== --}}
        <div class="submit-bar">
            <p class="hint mb-0">
                <i class="bi bi-info-circle me-1"></i>
                Pastikan semua data sudah benar sebelum melanjutkan.
            </p>
            <button type="submit" id="btn-lanjutkan" class="btn-submit" disabled>
                Lanjut ke Unggah Dokumen
                <i class="bi bi-arrow-right-short" style="font-size: 1.1rem;"></i>
            </button>
        </div>

    </form>

@endsection

@push('scripts')
<script>
(function () {
    var checkbox = document.getElementById('setuju');
    var button   = document.getElementById('btn-lanjutkan');
    var box      = document.getElementById('declarationBox');

    function sync() {
        button.disabled = !checkbox.checked;
        box.classList.toggle('checked', checkbox.checked);
    }

    checkbox.addEventListener('change', sync);
    sync();
})();
</script>
@endpush
