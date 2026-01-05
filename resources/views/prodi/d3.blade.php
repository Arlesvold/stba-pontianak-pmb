{{-- resources/views/prodi/d3.blade.php --}}
@extends('layouts.pmb')

@section('title', 'Program Studi Diploma (D3)')

@section('content')
    <div class="container py-5">
        {{-- Judul --}}
        <h1 class="h3 mb-3" style="color: var(--primary-maroon);">
            Diploma (D3) Bahasa Inggris
        </h1>
        <p class="text-muted small mb-4">
            Program vokasi yang berfokus pada penguasaan keterampilan bahasa Inggris praktis untuk dunia kerja,
            khususnya di bidang administratif, pelayanan publik, pariwisata, dan industri jasa.
        </p>

        {{-- Visi --}}
        <h2 class="h5 mt-4 mb-2">Visi</h2>
        <p class="small">
            Menghasilkan lulusan Diploma yang unggul, profesional, dan berkarakter dalam menerapkan bahasa Inggris
            di lingkungan kerja modern, baik pada instansi pemerintah maupun sektor industri dan jasa.
        </p>

        {{-- Misi --}}
        <h2 class="h5 mt-4 mb-2">Misi</h2>
        <ul class="small">
            <li>Menyelenggarakan pendidikan vokasi yang menekankan keterampilan berbahasa Inggris lisan dan tulisan untuk
                kebutuhan kerja.</li>
            <li>Mengembangkan kemampuan mahasiswa dalam komunikasi bisnis, pelayanan pelanggan, dan korespondensi
                internasional.</li>
            <li>Mendorong kegiatan praktik kerja lapangan dan kerja sama dengan dunia usaha/dunia industri (DUDI).</li>
            <li>Menumbuhkan sikap profesional, disiplin, dan etika kerja yang tinggi pada setiap lulusan.</li>
        </ul>

        {{-- Tujuan --}}
        <h2 class="h5 mt-4 mb-2">Tujuan</h2>
        <ul class="small">
            <li>Menghasilkan lulusan yang kompeten menggunakan bahasa Inggris dalam situasi kerja sehari-hari.</li>
            <li>Menghasilkan tenaga terampil yang siap ditempatkan di bidang administrasi, front office, dan layanan
                pelanggan.</li>
            <li>Memberikan dasar kemampuan untuk melanjutkan studi ke jenjang Sarjana (S1) bagi lulusan yang berminat.</li>
        </ul>

        {{-- Peminatan / Konsentrasi --}}
        <h2 class="h5 mt-4 mb-2">Peminatan Studi</h2>
        <p class="small">
            Program Studi Diploma (D3) Bahasa Inggris memberikan kesempatan kepada mahasiswa untuk memperdalam bidang minat
            berikut:
        </p>
        <ul class="small">
            <li>
                <strong>Layanan Perkantoran dan Bisnis</strong><br>
                Fokus pada keterampilan bahasa Inggris untuk korespondensi, administrasi, dan komunikasi bisnis di
                perusahaan maupun lembaga pemerintah.
            </li>
            <li class="mt-2">
                <strong>Hospitality & Tourism Communication</strong><br>
                Fokus pada pelayanan tamu, front office, dan informasi wisata dengan bahasa Inggris di hotel, agen
                perjalanan, dan industri pariwisata lainnya.
            </li>
        </ul>

        {{-- Kurikulum (ringkas + link) --}}
        <h2 class="h5 mt-4 mb-2">Kurikulum</h2>
        <p class="small mb-1">
            Kurikulum D3 dirancang berbasis kebutuhan dunia kerja, dengan porsi praktik yang besar melalui mata kuliah
            seperti English for Office Administration, English Correspondence, Customer Service Communication,
            dan praktik kerja lapangan.
        </p>
        <p class="small mb-0">
            <a href="#" class="text-decoration-none" style="color: var(--primary-maroon);">
                Lihat distribusi mata kuliah D3 selengkapnya (PDF)
            </a>
        </p>

        {{-- Prospek Karier --}}
        <h2 class="h5 mt-4 mb-2">Karir Lulusan Diploma (D3)</h2>
        <p class="small">
            Lulusan Program Studi Diploma (D3) Bahasa Inggris dipersiapkan untuk bekerja di berbagai sektor jasa dan bisnis,
            antara lain sebagai:
        </p>
        <ul class="small">
            <li>Staf administrasi dan korespondensi berbahasa Inggris.</li>
            <li>Front office / resepsionis di hotel, kantor, dan lembaga pendidikan.</li>
            <li>Customer service di perusahaan swasta maupun BUMN.</li>
            <li>Staf operasional di perusahaan tour & travel atau industri pariwisata.</li>
            <li>Asisten pengajar bahasa Inggris dan tenaga pendukung kegiatan akademik.</li>
        </ul>

        {{-- Call to action kecil --}}
        <div class="mt-4 p-3 rounded-3" style="background-color:#fef2f4;border:1px solid #f7d9df;">
            <div class="small mb-1 fw-semibold" style="color: var(--primary-maroon);">
                Tertarik dengan Diploma (D3) Bahasa Inggris?
            </div>
            <p class="small mb-2">
                Dapatkan informasi pendaftaran dan beasiswa pada menu PMB atau hubungi narahubung resmi kami pada halaman
                Kontak.
            </p>
            <a href="{{ route('pmb.daftar') }}" class="btn btn-maroon btn-sm">
                Daftar D3 Sekarang
            </a>
        </div>
    </div>
@endsection
