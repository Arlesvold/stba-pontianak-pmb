    @extends('layouts.pmb')

    @section('title', 'Penerimaan Mahasiswa Baru')

    @section('content')
        <section class="hero-section position-relative d-flex align-items-center"
            style="min-height: 600px; overflow: hidden;">

            {{-- Background image + overlay --}}
            <div class="position-absolute top-0 start-0 w-100 h-100">
                <img src="{{ asset('images/hero1.jpg') }}" alt="Penerimaan Mahasiswa Baru STBA Pontianak" class="w-100 h-100"
                    style="object-fit: cover; object-position: center; transform: scale(1.05);">
                <div class="position-absolute top-0 start-0 w-100 h-100"
                    style="background: linear-gradient(to right,
                             rgba(0,0,0,0.80),
                             rgba(0,0,0,0.55),
                             rgba(0,0,0,0.10));">
                </div>
            </div>

            {{-- Konten existing hero --}}
            <div class="container position-relative" style="z-index: 1;">
                <div class="row align-items-center g-4">
                    {{-- Teks kiri --}}
                    <div class="col-lg-7">
                        <div class="hero-badge mb-3">
                            <span class="badge-dot bg-danger rounded-circle" style="width:8px;height:8px;"></span>
                            <span style="color: white;">Penerimaan Mahasiswa Baru</span>
                            <span style="color: white;">Tahun Akademik 2025/2026</span>
                        </div>

                        <h1 class="hero-title mb-3" style="color: white;">
                            Wujudkan Masa Depan <span>Anda</span> Bersama STBA Pontianak
                        </h1>

                        <p class="hero-subtitle mb-4" style="color: white;">
                            Bergabunglah dengan kampus bahasa yang modern, berfokus pada kompetensi global,
                            dan didukung dosen berpengalaman untuk menyiapkan karier masa depan Anda.
                        </p>

                        <div class="hero-cta d-flex flex-wrap gap-2 mb-4">
                            <a href="{{ route('pmb.daftar') }}" class="btn btn-maroon">
                                Daftar Sekarang
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
        </section>

        {{-- SECTION: 3 Program Studi --}}
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
                        <a href="{{ route('prodi.d3') }}" class="text-decoration-none text-reset">
                            <div class="card h-100 border-0 shadow-sm text-center px-4 py-5 hover-shadow-sm"
                                style="background-color:#ffffff; cursor:pointer;">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-3"
                                        style="width:90px;height:90px;background:var(--primary-maroon); box-shadow:0 10px 20px rgba(123,30,48,0.35);">
                                        <i class="bi bi-mortarboard text-white fs-1"></i>
                                    </div>
                                </div>
                                <h4 class="fw-bold mb-3" style="color:var(--primary-maroon);">
                                    Diploma (D3)
                                </h4>
                                <p class="text-muted small mb-0">
                                    Mempersiapkan lulusan dengan kompetensi bahasa, penelitian, dan soft skill untuk
                                    karier
                                    di pendidikan, media, bisnis internasional, serta lembaga pemerintahan.
                                </p>
                                <span class="stretched-link"></span>
                            </div>
                        </a>
                    </div>

                    {{-- Card S1 --}}
                    <div class="col-md-4">
                        <a href="{{ route('prodi.s1') }}" class="text-decoration-none text-reset">
                            <div class="card h-100 border-0 shadow-sm text-center px-4 py-5 hover-shadow-sm"
                                style="background-color:#ffffff; cursor:pointer;">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-3"
                                        style="width:90px;height:90px;background:var(--primary-maroon); box-shadow:0 10px 20px rgba(123,30,48,0.35);">
                                        <i class="bi bi-briefcase text-white fs-1"></i>
                                    </div>
                                </div>
                                <h4 class="fw-bold mb-3" style="color:var(--primary-maroon);">
                                    Sarjana (S1)
                                </h4>
                                <p class="text-muted small mb-0">
                                    Fokus pada keterampilan praktis untuk dunia kerja: administrasi perkantoran,
                                    hospitality,
                                    front office, dan layanan pelanggan dengan kemampuan bahasa asing yang kuat.
                                </p>
                                <span class="stretched-link"></span>
                            </div>
                        </a>
                    </div>

                    {{-- Card Sastra Inggris --}}
                    <div class="col-md-4">
                        <a href="{{ route('prodi.sastra') }}" class="text-decoration-none text-reset">
                            <div class="card h-100 border-0 shadow-sm text-center px-4 py-5 hover-shadow-sm"
                                style="background-color:#ffffff; cursor:pointer;">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-3"
                                        style="width:90px;height:90px;background:var(--primary-maroon); box-shadow:0 10px 20px rgba(123,30,48,0.35);">
                                        <i class="bi bi-journal-text text-white fs-1"></i>
                                    </div>
                                </div>
                                <h4 class="fw-bold mb-3" style="color:var(--primary-maroon);">
                                    Sarjana Sastra Inggris
                                </h4>
                                <p class="text-muted small mb-0">
                                    Pendalaman bahasa, sastra, dan budaya Inggris untuk karier di penerjemahan,
                                    pendidikan,
                                    media, riset, dan berbagai bidang internasional lainnya.
                                </p>
                                <span class="stretched-link"></span>
                            </div>
                        </a>
                    </div>
                </div>


            </div>
        </section>


        {{-- SECTION: Berita --}}
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-4">
                    <h2 class="h4 fw-bold mb-1" style="color: var(--primary-maroon);">
                        Berita Kampus
                    </h2>
                    <p class="text-muted mb-0 small">
                        Kegiatan dan informasi terbaru seputar STBA Pontianak.
                    </p>
                </div>

                <div class="row g-4">
                    @forelse ($beritaTerbaru as $berita)
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow-sm"
                                style="transition: transform .18s ease, box-shadow .18s ease;">
                                {{-- Gambar --}}
                                @if ($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                                        class="card-img-top rounded-top-4" alt="{{ $berita->judul }}"
                                        style="height: 210px; object-fit: cover;">
                                @else
                                    <div class="card-img-top rounded-top-4 bg-light d-flex align-items-center justify-content-center"
                                        style="height: 210px;">
                                        <span class="text-muted small">Tidak ada gambar</span>
                                    </div>
                                @endif

                                {{-- Isi --}}
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold mb-2"
                                        style="font-size: 1rem; color: var(--primary-maroon);">
                                        {{ $berita->judul }}
                                    </h5>

                                    <p class="card-text small text-muted mb-1">
                                        STBA Pontianak • {{ $berita->tanggal->format('Y') }}
                                    </p>

                                    @php
                                        $preview = \Illuminate\Support\Str::limit(strip_tags($berita->isi), 60);
                                    @endphp
                                    <p class="card-text small text-muted mb-2" style="min-height: 48px;">
                                        {{ $preview }}
                                    </p>

                                    <a href="{{ route('berita.index') }}" class="small text-decoration-none"
                                        style="color: var(--primary-maroon);">
                                        Read more →
                                    </a>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center text-muted small mb-0">
                                Belum ada berita kampus.
                            </p>
                        </div>
                    @endforelse
                </div>

                {{-- Link ke halaman semua berita --}}
                <div class="text-center mt-4">
                    <a href="{{ route('berita.index') }}" class="small text-decoration-none"
                        style="color: var(--primary-maroon);">
                        Lihat semua berita kampus →
                    </a>
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

                        @forelse ($agendas as $agenda)
                            <div class="row mb-3 {{ $loop->last ? 'mb-0' : '' }}">
                                {{-- Kolom tanggal --}}
                                <div class="col-md-2 col-3 text-center">
                                    <div class="badge bg-light text-muted small">
                                        @if ($agenda->tanggal_selesai)
                                            {{ $agenda->tanggal_mulai->format('d M') }}
                                            – {{ $agenda->tanggal_selesai->format('d M') }}
                                        @else
                                            {{ $agenda->tanggal_mulai->format('d M') }}
                                        @endif
                                    </div>
                                    <div class="small text-muted">
                                        {{ $agenda->tanggal_mulai->format('Y') }}
                                    </div>
                                </div>

                                {{-- Kolom judul & deskripsi --}}
                                <div class="col-md-10 col-9">
                                    <div class="fw-semibold">
                                        {{ $agenda->judul }}
                                    </div>
                                    <div class="small text-muted">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($agenda->deskripsi), 100) }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-muted small py-2">
                                Belum ada agenda yang dijadwalkan.
                            </div>
                        @endforelse

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
                                        <input type="text" name="nama" class="form-control form-control-sm"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small">Email</label>
                                        <input type="email" name="email" class="form-control form-control-sm"
                                            required>
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
