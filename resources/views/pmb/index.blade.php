@extends('layouts.app')

@section('title', 'Penerimaan Mahasiswa Baru')

@section('content')
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-4">
                {{-- Teks kiri --}}
                <div class="col-lg-7">
                    <div class="hero-badge mb-3">
                        <span class="badge-dot bg-danger rounded-circle" style="width:8px;height:8px;"></span>
                        <span>Penerimaan Mahasiswa Baru</span>
                        <span class="text-muted">Tahun Akademik 2025/2026</span>
                    </div>

                    <h1 class="hero-title mb-3">
                        Wujudkan Masa Depan <span>Profesional</span> Bersama STBA Pontianak
                    </h1>

                    <p class="hero-subtitle mb-4">
                        Bergabunglah dengan kampus bahasa yang modern, berfokus pada kompetensi global,
                        dan didukung dosen berpengalaman untuk menyiapkan karier masa depan Anda.
                    </p>

                    <div class="hero-cta d-flex flex-wrap gap-2 mb-4">
                        <a href="{{ route('pmb.daftar') }}" class="btn btn-maroon">
                            Daftar Sekarang
                        </a>
                        <a href="{{ route('pmb.informasi') }}" class="btn btn-outline-maroon">
                            Informasi PMB
                        </a>
                    </div>

                    <div class="hero-highlight-box d-none d-md-block">
                        <h6>Kenapa memilih STBA Pontianak?</h6>
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <div class="small text-muted">Akreditasi</div>
                                <div class="stat">Program Studi Terakreditasi</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="small text-muted">Fokus</div>
                                <div class="stat">Bahasa & Sastra Inggris</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="small text-muted">Lulusan</div>
                                <div class="stat">Siap Kerja Global</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Ilustrasi kanan (bisa diganti gambar) --}}
                <div class="col-lg-5">
                    <div class="hero-illustration text-center">
                        <div class="position-relative d-inline-block">
                            <div class="rounded-4 bg-white shadow-sm p-4">
                                <h5 class="fw-semibold mb-2 text-center" style="color: var(--primary-maroon);">
                                    Jalur Pendaftaran PMB
                                </h5>
                                <ul class="list-unstyled small text-start mb-0">
                                    <li class="mb-2">• Jalur Reguler (Tes Tulis)</li>
                                    <li class="mb-2">• Jalur Prestasi Akademik & Non Akademik</li>
                                    <li class="mb-2">• Beasiswa Mitra / Kerjasama</li>
                                </ul>
                            </div>
                            <div class="position-absolute top-0 start-100 translate-middle d-none d-md-block">
                                <span class="badge rounded-pill bg-danger-subtle text-danger fw-semibold small">
                                    Kuota Terbatas
                                </span>
                            </div>
                        </div>

                        <p class="mt-3 small text-muted">
                            Pastikan mendaftar pada gelombang awal untuk peluang beasiswa dan pilihan kelas yang lebih
                            fleksibel.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- SECTION: 3 Program Studi --}}
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-4">
                    <h2 class="h4 fw-bold mb-2" style="color: var(--primary-maroon);">
                        Pilihan Program Studi
                    </h2>
                    <p class="text-muted mb-0">
                        Sesuaikan minat dan rencana karier Anda dengan program studi unggulan di STBA Pontianak.
                    </p>
                </div>

                <div class="row g-4">
                    {{-- Card D3 --}}
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow-sm"
                            style="transition: transform .18s ease, box-shadow .18s ease;">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold mb-2">Diploma (D3)</h5>
                                <p class="card-text small text-muted mb-3">
                                    Program vokasi dengan fokus keterampilan praktis bahasa untuk dunia kerja.
                                </p>
                                <ul class="small text-muted mb-3">
                                    <li>Durasi studi lebih singkat</li>
                                    <li>Siap kerja di berbagai sektor</li>
                                </ul>
                                <a href="{{ route('prodi.d3') }}" class="stretched-link text-decoration-none"
                                    style="color: var(--primary-maroon);">
                                    Lihat detail program →
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Card S1 --}}
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow-sm"
                            style="transition: transform .18s ease, box-shadow .18s ease;">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold mb-2">Sarjana (S1)</h5>
                                <p class="card-text small text-muted mb-3">
                                    Program akademik untuk membangun fondasi teori dan praktik yang seimbang.
                                </p>
                                <ul class="small text-muted mb-3">
                                    <li>Kurikulum adaptif kebutuhan industri</li>
                                    <li>Peluang karier dan studi lanjut</li>
                                </ul>
                                <a href="{{ route('prodi.s1') }}" class="stretched-link text-decoration-none"
                                    style="color: var(--primary-maroon);">
                                    Lihat detail program →
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Card Sastra Inggris --}}
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow-sm"
                            style="transition: transform .18s ease, box-shadow .18s ease;">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold mb-2">Sarjana Sastra Inggris</h5>
                                <p class="card-text small text-muted mb-3">
                                    Pendalaman bahasa, sastra, dan budaya untuk karier global di berbagai bidang.
                                </p>
                                <ul class="small text-muted mb-3">
                                    <li>Fokus linguistik dan sastra</li>
                                    <li>Peluang karier internasional</li>
                                </ul>
                                <a href="{{ route('prodi.sastra') }}" class="stretched-link text-decoration-none"
                                    style="color: var(--primary-maroon);">
                                    Lihat detail program →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- SECTION: Berita & Agenda --}}
        {{-- SECTION: Berita --}}
        <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h5 fw-bold mb-0" style="color: var(--primary-maroon);">
                        Berita Terbaru PMB
                    </h2>
                    <a href="{{ route('berita.index') }}" class="small text-decoration-none"
                        style="color: var(--primary-maroon);">
                        Lihat semua
                    </a>
                </div>

                <div class="row g-3">
                    {{-- Berita 1 --}}
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow-sm"
                            style="transition: transform .18s ease, box-shadow .18s ease;">
                            <div class="card-body p-3">
                                <span class="badge bg-light text-muted mb-2 small">1 Feb 2025</span>
                                <h6 class="fw-semibold mb-1" style="font-size: .95rem;">
                                    Pembukaan Pendaftaran Gelombang 1
                                </h6>
                                <p class="small text-muted mb-0">
                                    Informasi jadwal dan alur pendaftaran gelombang pertama.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Berita 2 --}}
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow-sm"
                            style="transition: transform .18s ease, box-shadow .18s ease;">
                            <div class="card-body p-3">
                                <span class="badge bg-light text-muted mb-2 small">15 Jan 2025</span>
                                <h6 class="fw-semibold mb-1" style="font-size: .95rem;">
                                    Info Beasiswa & Potongan UKT
                                </h6>
                                <p class="small text-muted mb-0">
                                    Skema beasiswa dan potongan biaya untuk mahasiswa baru.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Berita 3 --}}
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow-sm"
                            style="transition: transform .18s ease, box-shadow .18s ease;">
                            <div class="card-body p-3">
                                <span class="badge bg-light text-muted mb-2 small">10 Jan 2025</span>
                                <h6 class="fw-semibold mb-1" style="font-size: .95rem;">
                                    Sosialisasi PMB ke Sekolah Mitra
                                </h6>
                                <p class="small text-muted mb-0">
                                    Kegiatan promosi dan pengenalan kampus ke sekolah mitra.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- SECTION: Agenda --}}
        <section class="py-4">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h5 fw-bold mb-0" style="color: var(--primary-maroon);">
                        Agenda Penting
                    </h2>
                    <a href="{{ route('agenda.index') }}" class="small text-decoration-none"
                        style="color: var(--primary-maroon);">
                        Lihat semua
                    </a>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        {{-- Agenda 1 --}}
                        <div class="d-flex mb-3">
                            <div class="me-3 text-center">
                                <div class="badge bg-light text-muted small">1 Feb – 30 Apr</div>
                                <div class="small text-muted">2025</div>
                            </div>
                            <div>
                                <div class="fw-semibold mb-1">Pendaftaran PMB Gelombang 1</div>
                                <div class="small text-muted">Pendaftaran online untuk seluruh jalur masuk.</div>
                            </div>
                        </div>

                        {{-- Agenda 2 --}}
                        <div class="d-flex mb-3">
                            <div class="me-3 text-center">
                                <div class="badge bg-light text-muted small">10 Mei</div>
                                <div class="small text-muted">2025</div>
                            </div>
                            <div>
                                <div class="fw-semibold mb-1">Tes Seleksi & Wawancara</div>
                                <div class="small text-muted">Pelaksanaan tes tertulis dan wawancara terpadu.</div>
                            </div>
                        </div>

                        {{-- Agenda 3 --}}
                        <div class="d-flex">
                            <div class="me-3 text-center">
                                <div class="badge bg-light text-muted small">20 Mei</div>
                                <div class="small text-muted">2025</div>
                            </div>
                            <div>
                                <div class="fw-semibold mb-1">Pengumuman Hasil Seleksi</div>
                                <div class="small text-muted">Pengumuman melalui website resmi dan email.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>

    {{-- SECTION: Kontak --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-6">
                    <h2 class="h5 fw-bold mb-3" style="color: var(--primary-maroon);">
                        Hubungi Kami
                    </h2>
                    <p class="text-muted small mb-4">
                        Tim PMB STBA Pontianak siap membantu menjawab pertanyaan seputar pendaftaran,
                        program studi, dan beasiswa.
                    </p>

                    <div class="mb-3 small">
                        <div class="fw-semibold mb-1">Alamat Kampus</div>
                        <div>Jl. Contoh Alamat No. 123, Pontianak</div>
                    </div>
                    <div class="mb-3 small">
                        <div class="fw-semibold mb-1">Kontak</div>
                        <div>Telp: (0561) 123456</div>
                        <div>Email: pmb@stbapontianak.ac.id</div>
                    </div>
                    <div class="small">
                        <div class="fw-semibold mb-1">Jam Layanan</div>
                        <div>Senin – Jumat, 08.00 – 15.00 WIB</div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-maroon-soft border-0 shadow-sm rounded-4 hover-shadow-sm"
                        style="transition: transform .18s ease, box-shadow .18s ease;">
                        <div class="card-body">
                            <h3 class="h6 fw-semibold mb-3">Form Kontak</h3>
                            <form action="{{ route('kontak') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label small">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control form-control-sm" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Email</label>
                                    <input type="email" name="email" class="form-control form-control-sm" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Pesan</label>
                                    <textarea name="pesan" rows="3" class="form-control form-control-sm" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-maroon btn-sm">
                                    Kirim Pesan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    </section>
@endsection
