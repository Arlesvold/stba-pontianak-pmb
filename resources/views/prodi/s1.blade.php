{{-- resources/views/prodi/s1.blade.php --}}
@extends('layouts.pmb')

@section('title', 'Program Studi Sarjana (S1)')

@section('content')
    <div class="container py-5">
        {{-- Judul --}}
        <h1 class="h3 mb-3" style="color: var(--primary-maroon);">
            Sarjana (S1) Bahasa & Sastra Inggris
        </h1>
        <p class="text-muted small mb-4">
            Program akademik yang memadukan kajian bahasa, sastra, dan budaya Inggris dengan keterampilan abad 21,
            sehingga lulusan siap berkarya di dunia pendidikan, media, bisnis, dan bidang profesional lainnya.
        </p>

        {{-- Visi --}}
        <h2 class="h5 mt-4 mb-2">Visi</h2>
        <p class="small">
            Menjadi program studi yang unggul dalam pengembangan keilmuan bahasa dan sastra Inggris,
            berdaya saing nasional dan regional, serta berkontribusi pada pembangunan masyarakat yang berwawasan global.
        </p>

        {{-- Misi --}}
        <h2 class="h5 mt-4 mb-2">Misi</h2>
        <ul class="small">
            <li>Menyelenggarakan pendidikan tinggi di bidang bahasa dan sastra Inggris yang bermutu dan berorientasi pada
                kebutuhan masa depan.</li>
            <li>Mengembangkan kemampuan berpikir kritis, analitis, dan kreatif melalui kajian linguistik, sastra, dan
                budaya.</li>
            <li>Mendorong penelitian dan publikasi ilmiah dosen dan mahasiswa di bidang bahasa, sastra, dan pengajarannya.
            </li>
            <li>Mengadakan kegiatan pengabdian kepada masyarakat berbasis keilmuan bahasa dan sastra Inggris.</li>
        </ul>

        {{-- Tujuan --}}
        <h2 class="h5 mt-4 mb-2">Tujuan</h2>
        <ul class="small">
            <li>Menghasilkan lulusan yang menguasai teori dan praktik bahasa Inggris secara lisan maupun tulisan.</li>
            <li>Menghasilkan sarjana yang memiliki kepekaan budaya, integritas, dan etika profesional.</li>
            <li>Menyiapkan lulusan yang kompeten sebagai pendidik, peneliti, penulis, penerjemah, dan praktisi bahasa
                lainnya.</li>
        </ul>

        {{-- Peminatan / Konsentrasi --}}
        <h2 class="h5 mt-4 mb-2">Peminatan Studi</h2>
        <p class="small mb-1">
            Untuk mengakomodasi minat dan rencana karier mahasiswa, Program Studi S1 menyediakan beberapa bidang peminatan:
        </p>
        <ul class="small">
            <li>
                <strong>Linguistik Terapan</strong><br>
                Menekankan kajian struktur bahasa, analisis wacana, dan penerapan linguistik dalam pengajaran,
                penerjemahan, dan komunikasi profesional.
            </li>
            <li class="mt-2">
                <strong>Sastra & Kajian Budaya</strong><br>
                Mengkaji karya sastra, film, dan teks budaya berbahasa Inggris untuk membangun kepekaan estetis
                dan pemahaman kritis terhadap isu-isu sosial dan kemanusiaan.
            </li>
            <li class="mt-2">
                <strong>Pengajaran Bahasa Inggris</strong><br>
                Berfokus pada teori dan praktik pengajaran bahasa Inggris (ELT), termasuk perencanaan pembelajaran,
                pengembangan materi, dan evaluasi.
            </li>
        </ul>

        {{-- Kurikulum --}}
        <h2 class="h5 mt-4 mb-2">Kurikulum</h2>
        <p class="small mb-1">
            Kurikulum Sarjana (S1) dirancang mengintegrasikan mata kuliah keilmuan dasar, keahlian utama,
            serta mata kuliah pilihan yang adaptif terhadap perkembangan dunia kerja dan studi lanjut.
            Mahasiswa akan mengikuti perkuliahan, praktikum, penelitian skripsi, dan kegiatan pengembangan diri.
        </p>
        <p class="small mb-0">
            <a href="#" class="text-decoration-none" style="color: var(--primary-maroon);">
                Unduh ringkasan kurikulum S1 Bahasa & Sastra Inggris (PDF)
            </a>
        </p>

        {{-- Prospek Karier --}}
        <h2 class="h5 mt-4 mb-2">Karir Lulusan Sarjana (S1)</h2>
        <p class="small">
            Lulusan Program Studi S1 Bahasa & Sastra Inggris memiliki peluang karier yang luas, antara lain sebagai:
        </p>
        <ul class="small">
            <li>Guru atau instruktur bahasa Inggris di sekolah, lembaga kursus, dan institusi pendidikan lainnya.</li>
            <li>Penerjemah dan juru bahasa di lembaga pemerintah, perusahaan, dan organisasi internasional.</li>
            <li>Penulis konten, editor, dan pekerja kreatif di media cetak maupun digital.</li>
            <li>Staf komunikasi, public relations, dan corporate communication di berbagai jenis organisasi.</li>
            <li>Peneliti, akademisi, atau melanjutkan studi ke jenjang magister dan doktoral.</li>
        </ul>

        {{-- Call to action --}}
        <div class="mt-4 p-3 rounded-3" style="background-color:#fef2f4;border:1px solid #f7d9df;">
            <div class="small mb-1 fw-semibold" style="color: var(--primary-maroon);">
                Siap membangun karier bersama Sarjana (S1) Bahasa & Sastra Inggris?
            </div>
            <p class="small mb-2">
                Jelajahi informasi pendaftaran dan beasiswa melalui halaman PMB, atau hubungi narahubung resmi STBA
                Pontianak
                untuk konsultasi pilihan program studi.
            </p>
            <a href="{{ route('pmb.daftar') }}" class="btn btn-maroon btn-sm">
                Daftar S1 Sekarang
            </a>
        </div>
    </div>
@endsection
