{{-- resources/views/pmb/daftar.blade.php --}}
@extends('layouts.pmb')

@section('title', 'Formulir Pendaftaran PMB')

@section('content')
    {{-- TRACK PROGRESS PMB --}}
    <div class="border-bottom" style="background-color:#f8fafc;">
        <div class="container py-3">
            <div class="d-flex align-items-center justify-content-between">

                {{-- Step 1: Isi Formulir (aktif) --}}
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
                        <div class="small text-muted">Data pribadi & pilihan studi</div>
                    </div>
                </div>

                {{-- Garis penghubung --}}
                <div class="flex-fill d-none d-md-block mx-2">
                    <div style="height:3px; background: linear-gradient(to right, var(--primary-maroon), #e5e7eb);"></div>
                </div>

                {{-- Step 2 --}}
                <div class="d-flex align-items-center flex-fill">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width:32px;height:32px;
                                background-color:#e5e7eb;
                                color:#6b7280; font-size:14px;">
                        2
                    </div>
                    <div class="ms-2">
                        <div class="small fw-semibold text-muted">Proses Administrasi</div>
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
                        <div class="small text-muted">Jadwal tes / wawancara</div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="h3 mb-3" style="color: var(--primary-maroon);">
                    Formulir Pendaftaran PMB
                </h1>
                <p class="text-muted mb-4">
                    Silakan isi formulir berikut dengan data yang benar untuk mendaftar sebagai calon
                    mahasiswa STBA Pontianak.
                </p>

                <form action="{{ route('pmb.daftar.submit') }}" method="POST">
                    @csrf

                    {{-- DATA PRIBADI --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Data Pribadi</h5>

                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                                    class="form-control @error('nama_lengkap') is-invalid @enderror"
                                    placeholder="Sesuai ijazah">
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">NIK</label>
                                    <input type="text" name="nik" value="{{ old('nik') }}"
                                        class="form-control @error('nik') is-invalid @enderror"
                                        placeholder="Nomor Induk Kependudukan">
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
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
                                            value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="jk_l">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_p"
                                            value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
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
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="email@contoh.com">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">No. HP (WhatsApp)</label>
                                    <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                                        class="form-control @error('no_hp') is-invalid @enderror"
                                        placeholder="08xxxxxxxxxx">
                                    @error('no_hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="2"
                                    placeholder="Sesuai KTP/domisili">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- PILIHAN PROGRAM STUDI & SISTEM KULIAH --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Pilihan Studi</h5>

                            <div class="mb-3">
                                <label class="form-label d-block">Program Studi</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="program_studi" id="prodi_d3"
                                        value="D3 Bahasa Inggris"
                                        {{ old('program_studi') == 'D3 Bahasa Inggris' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="prodi_d3">
                                        Diploma (D3) Bahasa Inggris
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="program_studi" id="prodi_s1"
                                        value="S1 Sastra Inggris"
                                        {{ old('program_studi') == 'S1 Sastra Inggris' ? 'checked' : '' }}>
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
                                        {{ old('sistem_kuliah') == 'Reguler (Pagi)' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="reguler">
                                        Reguler (Pagi)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sistem_kuliah" id="eksekutif"
                                        value="Eksekutif (Malam)"
                                        {{ old('sistem_kuliah') == 'Eksekutif (Malam)' ? 'checked' : '' }}>
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
                        <div class="card-body">
                            <h5 class="card-title mb-3">Pendidikan Terakhir</h5>

                            <div class="mb-3">
                                <label class="form-label">Nama Sekolah Asal</label>
                                <input type="text" name="sekolah_asal" value="{{ old('sekolah_asal') }}"
                                    class="form-control @error('sekolah_asal') is-invalid @enderror">
                                @error('sekolah_asal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Jurusan</label>
                                    <input type="text" name="jurusan_sekolah" value="{{ old('jurusan_sekolah') }}"
                                        class="form-control @error('jurusan_sekolah') is-invalid @enderror"
                                        placeholder="IPA / IPS / Bahasa / lainnya">
                                    @error('jurusan_sekolah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Tahun Lulus</label>
                                    <input type="text" name="tahun_lulus" value="{{ old('tahun_lulus') }}"
                                        class="form-control @error('tahun_lulus') is-invalid @enderror"
                                        placeholder="YYYY">
                                    @error('tahun_lulus')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PERNYATAAN --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Pernyataan</h5>
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

            {{-- Sisi kanan: info singkat --}}
            <div class="col-lg-4 mt-4 mt-lg-0">
                {{-- Info biaya & gelombang --}}
                <div class="card border-0 shadow-sm rounded-4 mb-3">
                    <div class="card-body">
                        <h6 class="fw-bold mb-2">Biaya Pendaftaran</h6>
                        <p class="small mb-2">
                            Biaya formulir pendaftaran: <span class="fw-bold">Rp300.000,-</span>
                        </p>

                        <h6 class="fw-bold mb-2 mt-3">Gelombang Pendaftaran</h6>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-1">
                                <span class="fw-bold">Gelombang 1</span><br>
                                <span class="text-muted">1 Feb – 30 Apr</span>
                            </li>
                            <li class="mb-1">
                                <span class="fw-bold">Gelombang 2</span><br>
                                <span class="text-muted">1 Mei – 30 Jun</span>
                            </li>
                            <li>
                                <span class="fw-bold">Gelombang 3</span><br>
                                <span class="text-muted">1 Jul – 15 Ags</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Track progress PMB --}}
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Progress Pendaftaran</h6>

                        <ol class="small mb-0 ps-3">
                            <li class="mb-2">
                                <span class="fw-bold text-success">Isi Formulir Online</span><br>
                                <span class="text-muted">Langkah yang sedang Anda lakukan sekarang.</span>
                            </li>
                            <li class="mb-2">
                                <span class="fw-bold">Proses Administrasi</span><br>
                                <span class="text-muted">
                                    Upload bukti pembayaran biaya pendaftaran dan berkas pendukung
                                    (ijazah, foto, dll) pada halaman berikutnya.
                                </span>
                            </li>
                            <li class="mb-2">
                                <span class="fw-bold">Verifikasi & Jadwal Tes</span><br>
                                <span class="text-muted">
                                    Panitia PMB memeriksa berkas Anda dan mengirimkan jadwal tes/wawancara.
                                </span>
                            </li>
                            <li>
                                <span class="fw-bold">Pengumuman & Registrasi Ulang</span><br>
                                <span class="text-muted">
                                    Hasil seleksi diumumkan melalui website & WhatsApp, kemudian dilanjutkan
                                    dengan registrasi ulang bagi yang dinyatakan diterima.
                                </span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
