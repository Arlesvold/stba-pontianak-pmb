{{-- resources/views/prodi/sastra.blade.php --}}
@extends('layouts.pmb')

@section('title', 'Program Studi Sastra Bahasa Inggris (S1)')

@section('content')
    <div class="container py-5">
        {{-- Judul --}}
        <h1 class="h3 mb-3" style="color: var(--primary-maroon);">
            Program Studi Sastra Bahasa Inggris (S1)
        </h1>
        <p class="text-muted small mb-4">
            Program ini memfokuskan diri pada kajian sastra, bahasa, dan budaya Inggris secara mendalam,
            sekaligus membekali mahasiswa dengan kemampuan analitis, kritis, dan kreatif yang dibutuhkan
            di dunia profesional dan akademik.
        </p>

        {{-- Visi --}}
        <h2 class="h5 mt-4 mb-2">Visi</h2>
        <p class="small">
            Menjadi program studi unggulan di bidang sastra dan budaya Inggris yang berwawasan global,
            humanis, dan responsif terhadap perkembangan ilmu pengetahuan, seni, dan teknologi.
        </p>

        {{-- Misi --}}
        <h2 class="h5 mt-4 mb-2">Misi</h2>
        <ul class="small">
            <li>Menyelenggarakan pendidikan sarjana di bidang sastra dan bahasa Inggris yang bermutu dan relevan dengan
                kebutuhan zaman.</li>
            <li>Mengembangkan kemampuan apresiasi sastra, pemikiran kritis, dan sensitivitas budaya pada mahasiswa.</li>
            <li>Mendorong penelitian dan publikasi ilmiah di bidang sastra, budaya, dan kajian bahasa.</li>
            <li>Melaksanakan pengabdian kepada masyarakat yang berlandaskan keilmuan sastra dan bahasa Inggris.</li>
        </ul>

        {{-- Tujuan --}}
        <h2 class="h5 mt-4 mb-2">Tujuan</h2>
        <ul class="small">
            <li>Menghasilkan sarjana yang menguasai teori dan kritik sastra berbahasa Inggris.</li>
            <li>Menghasilkan lulusan yang peka terhadap isu-isu budaya, sosial, dan kemanusiaan dalam teks sastra dan media.
            </li>
            <li>Menyiapkan lulusan yang siap berkarier sebagai penulis, editor, pekerja kreatif, peneliti, maupun pendidik.
            </li>
        </ul>

        {{-- Peminatan Studi --}}
        <h2 class="h5 mt-4 mb-2">Peminatan Studi</h2>
        <p class="small mb-1">
            Mahasiswa dapat memperdalam minat keilmuan melalui beberapa fokus kajian berikut:
        </p>
        <ul class="small">
            <li>
                <strong>Studi Sastra Modern dan Kontemporer</strong><br>
                Mengkaji novel, puisi, drama, dan karya sastra kontemporer untuk memahami tema, gaya, dan konteks sosialnya.
            </li>
            <li class="mt-2">
                <strong>Kajian Budaya dan Media</strong><br>
                Menganalisis film, teks media, dan budaya populer berbahasa Inggris dengan pendekatan teori budaya dan
                kritik wacana.
            </li>
            <li class="mt-2">
                <strong>Teori dan Kritik Sastra</strong><br>
                Memperdalam berbagai pendekatan teoretis dalam membaca dan menafsirkan teks sastra, dari strukturalisme
                hingga kajian poskolonial dan gender.
            </li>
        </ul>

        {{-- Kurikulum --}}
        <h2 class="h5 mt-4 mb-2">Kurikulum</h2>
        <p class="small mb-1">
            Kurikulum dirancang untuk menyeimbangkan penguasaan teori, pembacaan teks, dan produksi karya tulis.
            Mahasiswa akan mengikuti mata kuliah seperti Introduction to Literature, Poetry and Drama,
            Literary Criticism, Cultural Studies, Creative Writing, serta penelitian skripsi di semester akhir.
        </p>
        <p class="small mb-0">
            <a href="#" class="text-decoration-none" style="color: var(--primary-maroon);">
                Unduh ringkasan kurikulum Sastra Bahasa Inggris (PDF)
            </a>
        </p>

        {{-- Prospek Karier --}}
        <h2 class="h5 mt-4 mb-2">Karir Lulusan</h2>
        <p class="small">
            Lulusan Program Studi Sastra Bahasa Inggris memiliki peluang berkarier di berbagai bidang kreatif dan analitis,
            antara lain:
        </p>
        <ul class="small">
            <li>Penulis dan editor di penerbitan, media massa, maupun platform digital.</li>
            <li>Content writer, copywriter, dan kreator konten untuk perusahaan dan agensi.</li>
            <li>Peneliti dan akademisi di bidang sastra, budaya, dan kajian bahasa.</li>
            <li>Penerjemah sastra dan teks kreatif, juru bahasa, serta konsultan bahasa.</li>
            <li>Pendidik di sekolah, lembaga kursus, atau institusi pendidikan tinggi setelah studi lanjut.</li>
        </ul>

        {{-- Call to action --}}
        <div class="mt-4 p-3 rounded-3" style="background-color:#fef2f4;border:1px solid #f7d9df;">
            <div class="small mb-1 fw-semibold" style="color: var(--primary-maroon);">
                Tertarik mendalami Sastra Bahasa Inggris?
            </div>
            <p class="small mb-2">
                Pelajari lebih lanjut tentang proses pendaftaran dan peluang beasiswa melalui halaman PMB,
                atau konsultasikan rencana studi Anda dengan tim akademik STBA Pontianak.
            </p>
            <a href="{{ route('pmb.daftar') }}" class="btn btn-maroon btn-sm">
                Daftar Prodi Sastra Sekarang
            </a>
        </div>
    </div>
@endsection
