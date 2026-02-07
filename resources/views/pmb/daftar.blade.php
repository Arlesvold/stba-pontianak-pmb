{{-- resources/views/pmb/daftar.blade.php --}}
@extends('layouts.pmb-dashboard')

@section('title', 'Isi Formulir - PMB STBA Pontianak')

@section('content')
    {{-- Main Content Header --}}
    <div class="mb-5">
        <h1 class="h3 fw-bold mb-2 text-dark">Isi Formulir Pendaftaran</h1>
        <p class="text-muted">Lengkapi data diri Anda dengan benar untuk melanjutkan proses pendaftaran.</p>
    </div>

    {{-- ALERT if needed in future --}}
    {{-- <div class="alert alert-warning border-0 shadow-sm rounded-3 d-flex align-items-center mb-4" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2 fs-5 text-warning"></i>
        <div>
            <strong>Perhatian:</strong> Pastikan data yang Anda isi sesuai dengan dokumen asli (Ijazah/KTP).
        </div>
    </div> --}}

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('pmb.daftar.submit') }}" method="POST">
                @csrf

                {{-- DATA PRIBADI --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h5 class="card-title fw-bold text-dark mb-0">
                            <i class="bi bi-person-lines-fill me-2" style="color: var(--primary-maroon);"></i>
                            Data Pribadi
                        </h5>
                    </div>
                    <div class="card-body px-4 pb-4">

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', optional($registration)->nama_lengkap) }}"
                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                placeholder="Sesuai ijazah">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">NIK</label>
                                <input type="text" name="nik" value="{{ old('nik', optional($registration)->nik) }}"
                                    class="form-control @error('nik') is-invalid @enderror"
                                    placeholder="Nomor Induk Kependudukan">
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', optional($registration)->tanggal_lahir) }}"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label d-block">Jenis Kelamin</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_l"
                                        value="L" {{ old('jenis_kelamin', optional($registration)->jenis_kelamin) == 'L' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jk_l">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_p"
                                        value="P" {{ old('jenis_kelamin', optional($registration)->jenis_kelamin) == 'P' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jk_p">Perempuan</label>
                                </div>
                                @error('jenis_kelamin')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" value="{{ old('email', optional($registration)->email) }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="email@contoh.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">No. HP (WhatsApp)</label>
                                <input type="text" name="no_hp" value="{{ old('no_hp', optional($registration)->no_hp) }}"
                                    class="form-control @error('no_hp') is-invalid @enderror" placeholder="08xxxxxxxxxx">
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="2"
                                placeholder="Sesuai KTP/domisili">{{ old('alamat', optional($registration)->alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                {{-- PILIHAN PROGRAM STUDI & SISTEM KULIAH --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h5 class="card-title fw-bold text-dark mb-0">
                            <i class="bi bi-mortarboard-fill me-2" style="color: var(--primary-maroon);"></i>
                            Pilihan Studi
                        </h5>
                    </div>
                    <div class="card-body px-4 pb-4">

                        <div class="mb-3">
                            <label class="form-label d-block">Program Studi</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="program_studi" id="prodi_d3"
                                    value="D3 Bahasa Inggris"
                                    {{ old('program_studi', optional($registration)->program_studi) == 'D3 Bahasa Inggris' ? 'checked' : '' }}>
                                <label class="form-check-label" for="prodi_d3">
                                    Diploma (D3) Bahasa Inggris
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="program_studi" id="prodi_s1"
                                    value="S1 Sastra Inggris"
                                    {{ old('program_studi', optional($registration)->program_studi) == 'S1 Sastra Inggris' ? 'checked' : '' }}>
                                <label class="form-check-label" for="prodi_s1">
                                    Sarjana (S1) Sastra Inggris
                                </label>
                            </div>
                            @error('program_studi')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Sistem Kuliah</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sistem_kuliah" id="reguler"
                                    value="Reguler (Pagi)"
                                    {{ old('sistem_kuliah', optional($registration)->sistem_kuliah) == 'Reguler (Pagi)' ? 'checked' : '' }}>
                                <label class="form-check-label" for="reguler">
                                    Reguler (Pagi)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sistem_kuliah" id="eksekutif"
                                    value="Eksekutif (Malam)"
                                    {{ old('sistem_kuliah', optional($registration)->sistem_kuliah) == 'Eksekutif (Malam)' ? 'checked' : '' }}>
                                <label class="form-check-label" for="eksekutif">
                                    Eksekutif (Malam)
                                </label>
                            </div>
                            @error('sistem_kuliah')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- DATA PENDIDIKAN TERAKHIR --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h5 class="card-title fw-bold text-dark mb-0">
                            <i class="bi bi-building-fill me-2" style="color: var(--primary-maroon);"></i>
                            Pendidikan Terakhir
                        </h5>
                    </div>
                    <div class="card-body px-4 pb-4">

                        <div class="mb-3">
                            <label class="form-label">Nama Sekolah Asal</label>
                            <input type="text" name="sekolah_asal" value="{{ old('sekolah_asal', optional($registration)->sekolah_asal) }}"
                                class="form-control @error('sekolah_asal') is-invalid @enderror">
                            @error('sekolah_asal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Jurusan</label>
                                <input type="text" name="jurusan_sekolah" value="{{ old('jurusan_sekolah', optional($registration)->jurusan_sekolah) }}"
                                    class="form-control @error('jurusan_sekolah') is-invalid @enderror"
                                    placeholder="IPA / IPS / Bahasa / lainnya">
                                @error('jurusan_sekolah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Tahun Lulus</label>
                                <input type="text" name="tahun_lulus" value="{{ old('tahun_lulus', optional($registration)->tahun_lulus) }}"
                                    class="form-control @error('tahun_lulus') is-invalid @enderror" placeholder="YYYY">
                                @error('tahun_lulus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- PERNYATAAN --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-3 fw-bold">Pernyataan</h5>
                        <div class="form-check">
                            <input class="form-check-input @error('setuju') is-invalid @enderror" type="checkbox"
                                id="setuju" name="setuju" value="1" {{ old('setuju') ? 'checked' : '' }}>
                            <label class="form-check-label" for="setuju">
                                Saya menyatakan bahwa seluruh data yang saya isi adalah benar dan
                                bersedia mengikuti ketentuan PMB STBA Pontianak.
                            </label>
                            @error('setuju')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" id="btn-lanjutkan" class="btn btn-maroon" disabled>
                        Lanjutkan (Proses Administrasi)
                    </button>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const checkbox = document.getElementById('setuju');
                        const button = document.getElementById('btn-lanjutkan');

                        function toggleButton() {
                            button.disabled = !checkbox.checked;
                        }

                        checkbox.addEventListener('change', toggleButton);
                        toggleButton(); // set awal berdasarkan old('setuju')
                    });
                </script>

            </form>
        </div>
    </div>
@endsection
