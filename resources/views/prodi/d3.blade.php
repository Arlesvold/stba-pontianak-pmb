@extends('layouts.pmb')

@section('title', 'Diploma (D3) Bahasa Inggris - STBA Pontianak')

@section('content')

{{-- Page Header --}}
<div style="background: linear-gradient(135deg, #fef2f4 0%, #f7d9df 100%); border-bottom: 1px solid #f0c6d0;">
    <div class="container py-4">
        <nav aria-label="breadcrumb" class="mb-2">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('beranda') }}" class="text-decoration-none" style="color: var(--primary-maroon);">Beranda</a>
                </li>
                <li class="breadcrumb-item">Program Studi</li>
                <li class="breadcrumb-item active" aria-current="page">Diploma (D3)</li>
            </ol>
        </nav>
        <h1 class="fw-bold mb-1" style="color: var(--primary-maroon); font-size: 1.75rem;">Diploma (D3) Bahasa Inggris</h1>
        <p class="text-muted mb-0 small">Program vokasi yang berfokus pada penguasaan keterampilan bahasa Inggris praktis untuk dunia kerja.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">

            {{-- Deskripsi singkat --}}
            <p class="text-muted mb-5" style="line-height: 1.8;">
                Program Studi Diploma (D3) Bahasa Inggris dirancang untuk menghasilkan tenaga terampil yang
                menguasai bahasa Inggris praktis, siap bekerja di bidang administratif, pelayanan publik,
                pariwisata, dan industri jasa di era global.
            </p>

            {{-- Visi --}}
            <div class="mb-5">
                <h2 class="fw-bold mb-3" style="font-size: 1.05rem; color: var(--primary-maroon); padding-left: 0.75rem; border-left: 3px solid var(--primary-maroon);">
                    Visi
                </h2>
                <p class="text-muted mb-0" style="line-height: 1.8;">
                    Menghasilkan lulusan Diploma yang unggul, profesional, dan berkarakter dalam menerapkan bahasa Inggris
                    di lingkungan kerja modern, baik pada instansi pemerintah maupun sektor industri dan jasa.
                </p>
            </div>

            {{-- Misi --}}
            <div class="mb-5">
                <h2 class="fw-bold mb-3" style="font-size: 1.05rem; color: var(--primary-maroon); padding-left: 0.75rem; border-left: 3px solid var(--primary-maroon);">
                    Misi
                </h2>
                <ul class="text-muted ps-3 mb-0" style="line-height: 1.9;">
                    <li class="mb-1">Menyelenggarakan pendidikan vokasi yang menekankan keterampilan berbahasa Inggris lisan dan tulisan untuk kebutuhan kerja.</li>
                    <li class="mb-1">Mengembangkan kemampuan mahasiswa dalam komunikasi bisnis, pelayanan pelanggan, dan korespondensi internasional.</li>
                    <li class="mb-1">Mendorong kegiatan praktik kerja lapangan dan kerja sama dengan dunia usaha/dunia industri (DUDI).</li>
                    <li>Menumbuhkan sikap profesional, disiplin, dan etika kerja yang tinggi pada setiap lulusan.</li>
                </ul>
            </div>

            {{-- Tujuan --}}
            <div class="mb-5">
                <h2 class="fw-bold mb-3" style="font-size: 1.05rem; color: var(--primary-maroon); padding-left: 0.75rem; border-left: 3px solid var(--primary-maroon);">
                    Tujuan
                </h2>
                <ul class="text-muted ps-3 mb-0" style="line-height: 1.9;">
                    <li class="mb-1">Menghasilkan lulusan yang kompeten menggunakan bahasa Inggris dalam situasi kerja sehari-hari.</li>
                    <li class="mb-1">Menghasilkan tenaga terampil yang siap ditempatkan di bidang administrasi, front office, dan layanan pelanggan.</li>
                    <li>Memberikan dasar kemampuan untuk melanjutkan studi ke jenjang Sarjana (S1) bagi lulusan yang berminat.</li>
                </ul>
            </div>

            {{-- Peminatan --}}
            <div class="mb-5">
                <h2 class="fw-bold mb-3" style="font-size: 1.05rem; color: var(--primary-maroon); padding-left: 0.75rem; border-left: 3px solid var(--primary-maroon);">
                    Peminatan Studi
                </h2>
                <p class="text-muted mb-3" style="line-height: 1.8;">
                    Program Studi Diploma (D3) Bahasa Inggris memberikan kesempatan kepada mahasiswa untuk memperdalam bidang minat berikut:
                </p>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 h-100 rounded-3 border" style="border-color: #f0c6d0 !important; background-color: #fef9fa;">
                            <h6 class="fw-bold mb-2" style="color: var(--primary-maroon);">
                                <i class="bi bi-briefcase me-2"></i>Layanan Perkantoran & Bisnis
                            </h6>
                            <p class="text-muted small mb-0" style="line-height: 1.6;">
                                Fokus pada keterampilan bahasa Inggris untuk korespondensi, administrasi, dan komunikasi bisnis di perusahaan maupun lembaga pemerintah.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 h-100 rounded-3 border" style="border-color: #f0c6d0 !important; background-color: #fef9fa;">
                            <h6 class="fw-bold mb-2" style="color: var(--primary-maroon);">
                                <i class="bi bi-geo-alt me-2"></i>Hospitality & Tourism
                            </h6>
                            <p class="text-muted small mb-0" style="line-height: 1.6;">
                                Fokus pada pelayanan tamu, front office, dan informasi wisata dengan bahasa Inggris di hotel, agen perjalanan, dan industri pariwisata.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kurikulum --}}
            <div class="mb-5">
                <h2 class="fw-bold mb-3" style="font-size: 1.05rem; color: var(--primary-maroon); padding-left: 0.75rem; border-left: 3px solid var(--primary-maroon);">
                    Kurikulum
                </h2>
                <p class="text-muted mb-2" style="line-height: 1.8;">
                    Kurikulum D3 dirancang berbasis kebutuhan dunia kerja, dengan porsi praktik yang besar melalui mata kuliah
                    seperti English for Office Administration, English Correspondence, Customer Service Communication,
                    dan praktik kerja lapangan.
                </p>
                <a href="#" class="text-decoration-none small fw-semibold" style="color: var(--primary-maroon);">
                    <i class="bi bi-file-earmark-pdf me-1"></i> Lihat distribusi mata kuliah D3 selengkapnya
                </a>
            </div>

            {{-- Prospek Karier --}}
            <div class="mb-5">
                <h2 class="fw-bold mb-3" style="font-size: 1.05rem; color: var(--primary-maroon); padding-left: 0.75rem; border-left: 3px solid var(--primary-maroon);">
                    Karir Lulusan
                </h2>
                <p class="text-muted mb-3" style="line-height: 1.8;">
                    Lulusan Program Studi Diploma (D3) Bahasa Inggris dipersiapkan untuk bekerja di berbagai sektor jasa dan bisnis, antara lain sebagai:
                </p>
                <ul class="text-muted ps-3 mb-0" style="line-height: 1.9;">
                    <li class="mb-1">Staf administrasi dan korespondensi berbahasa Inggris.</li>
                    <li class="mb-1">Front office / resepsionis di hotel, kantor, dan lembaga pendidikan.</li>
                    <li class="mb-1">Customer service di perusahaan swasta maupun BUMN.</li>
                    <li class="mb-1">Staf operasional di perusahaan tour & travel atau industri pariwisata.</li>
                    <li>Asisten pengajar bahasa Inggris dan tenaga pendukung kegiatan akademik.</li>
                </ul>
            </div>

            {{-- CTA --}}
            <div class="p-4 rounded-3 border" style="background-color: #fef2f4; border-color: #f7d9df !important;">
                <h5 class="fw-bold mb-2" style="color: var(--primary-maroon);">Tertarik dengan Diploma (D3) Bahasa Inggris?</h5>
                <p class="text-muted mb-3" style="line-height: 1.7;">
                    Dapatkan informasi pendaftaran dan beasiswa pada menu PMB atau hubungi narahubung resmi kami pada halaman Kontak.
                </p>
                <a href="{{ route('pmb.daftar') }}" class="btn btn-maroon btn-sm px-4">
                    Daftar D3 Sekarang
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
