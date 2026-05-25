<?php

namespace Database\Seeders;

use App\Models\ProgramStudi;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    public function run(): void
    {
        ProgramStudi::updateOrCreate(['kode' => 'd3'], [
            'nama'    => 'Diploma (D3) Bahasa Inggris',
            'jenjang' => 'D3',
            'deskripsi' => 'Program Studi Diploma (D3) Bahasa Inggris dirancang untuk menghasilkan tenaga terampil yang menguasai bahasa Inggris praktis, siap bekerja di bidang administratif, pelayanan publik, pariwisata, dan industri jasa di era global.',
            'visi' => 'Menghasilkan lulusan Diploma yang unggul, profesional, dan berkarakter dalam menerapkan bahasa Inggris di lingkungan kerja modern, baik pada instansi pemerintah maupun sektor industri dan jasa.',
            'misi' => [
                ['item' => 'Menyelenggarakan pendidikan vokasi yang menekankan keterampilan berbahasa Inggris lisan dan tulisan untuk kebutuhan kerja.'],
                ['item' => 'Mengembangkan kemampuan mahasiswa dalam komunikasi bisnis, pelayanan pelanggan, dan korespondensi internasional.'],
                ['item' => 'Mendorong kegiatan praktik kerja lapangan dan kerja sama dengan dunia usaha/dunia industri (DUDI).'],
                ['item' => 'Menumbuhkan sikap profesional, disiplin, dan etika kerja yang tinggi pada setiap lulusan.'],
            ],
            'tujuan' => [
                ['item' => 'Menghasilkan lulusan yang kompeten menggunakan bahasa Inggris dalam situasi kerja sehari-hari.'],
                ['item' => 'Menghasilkan tenaga terampil yang siap ditempatkan di bidang administrasi, front office, dan layanan pelanggan.'],
                ['item' => 'Memberikan dasar kemampuan untuk melanjutkan studi ke jenjang Sarjana (S1) bagi lulusan yang berminat.'],
            ],
            'peminatan' => [
                [
                    'icon'     => 'bi-briefcase',
                    'judul'    => 'Layanan Perkantoran & Bisnis',
                    'deskripsi'=> 'Fokus pada keterampilan bahasa Inggris untuk korespondensi, administrasi, dan komunikasi bisnis di perusahaan maupun lembaga pemerintah.',
                ],
                [
                    'icon'     => 'bi-geo-alt',
                    'judul'    => 'Hospitality & Tourism',
                    'deskripsi'=> 'Fokus pada pelayanan tamu, front office, dan informasi wisata dengan bahasa Inggris di hotel, agen perjalanan, dan industri pariwisata.',
                ],
            ],
            'kurikulum' => 'Kurikulum D3 dirancang berbasis kebutuhan dunia kerja, dengan porsi praktik yang besar melalui mata kuliah seperti English for Office Administration, English Correspondence, Customer Service Communication, dan praktik kerja lapangan.',
            'kurikulum_pdf_url' => null,
            'karir_deskripsi' => 'Lulusan Program Studi Diploma (D3) Bahasa Inggris dipersiapkan untuk bekerja di berbagai sektor jasa dan bisnis, antara lain sebagai:',
            'karir_list' => [
                ['item' => 'Staf administrasi dan korespondensi berbahasa Inggris.'],
                ['item' => 'Front office / resepsionis di hotel, kantor, dan lembaga pendidikan.'],
                ['item' => 'Customer service di perusahaan swasta maupun BUMN.'],
                ['item' => 'Staf operasional di perusahaan tour & travel atau industri pariwisata.'],
                ['item' => 'Asisten pengajar bahasa Inggris dan tenaga pendukung kegiatan akademik.'],
            ],
        ]);

        ProgramStudi::updateOrCreate(['kode' => 's1'], [
            'nama'    => 'Sarjana (S1) Sastra Inggris',
            'jenjang' => 'S1',
            'deskripsi' => 'Program Studi Sarjana (S1) Sastra Inggris memadukan kajian bahasa, sastra, dan budaya Inggris dengan keterampilan abad 21, sehingga lulusan siap berkarya di dunia pendidikan, media, bisnis, dan bidang profesional lainnya.',
            'visi' => 'Menjadi program studi yang unggul dalam pengembangan keilmuan bahasa dan sastra Inggris, berdaya saing nasional dan regional, serta berkontribusi pada pembangunan masyarakat yang berwawasan global.',
            'misi' => [
                ['item' => 'Menyelenggarakan pendidikan tinggi di bidang bahasa dan sastra Inggris yang bermutu dan berorientasi pada kebutuhan masa depan.'],
                ['item' => 'Mengembangkan kemampuan berpikir kritis, analitis, dan kreatif melalui kajian linguistik, sastra, dan budaya.'],
                ['item' => 'Mendorong penelitian dan publikasi ilmiah dosen dan mahasiswa di bidang bahasa, sastra, dan pengajarannya.'],
                ['item' => 'Mengadakan kegiatan pengabdian kepada masyarakat berbasis keilmuan bahasa dan sastra Inggris.'],
            ],
            'tujuan' => [
                ['item' => 'Menghasilkan lulusan yang menguasai teori dan praktik bahasa Inggris secara lisan maupun tulisan.'],
                ['item' => 'Menghasilkan sarjana yang memiliki kepekaan budaya, integritas, dan etika profesional.'],
                ['item' => 'Menyiapkan lulusan yang kompeten sebagai pendidik, peneliti, penulis, penerjemah, dan praktisi bahasa lainnya.'],
            ],
            'peminatan' => [
                [
                    'icon'     => 'bi-translate',
                    'judul'    => 'Linguistik Terapan',
                    'deskripsi'=> 'Kajian struktur bahasa, analisis wacana, dan penerapan linguistik dalam pengajaran serta komunikasi profesional.',
                ],
                [
                    'icon'     => 'bi-book',
                    'judul'    => 'Sastra & Kajian Budaya',
                    'deskripsi'=> 'Mengkaji karya sastra, film, dan teks budaya berbahasa Inggris untuk membangun kepekaan estetis dan pemahaman kritis.',
                ],
                [
                    'icon'     => 'bi-mortarboard',
                    'judul'    => 'Pengajaran Bahasa Inggris',
                    'deskripsi'=> 'Teori dan praktik pengajaran bahasa Inggris (ELT), termasuk perencanaan pembelajaran dan pengembangan materi.',
                ],
            ],
            'kurikulum' => 'Kurikulum Sarjana (S1) dirancang mengintegrasikan mata kuliah keilmuan dasar, keahlian utama, serta mata kuliah pilihan yang adaptif terhadap perkembangan dunia kerja dan studi lanjut. Mahasiswa akan mengikuti perkuliahan, praktikum, penelitian skripsi, dan kegiatan pengembangan diri.',
            'kurikulum_pdf_url' => null,
            'karir_deskripsi' => 'Lulusan Program Studi S1 Bahasa & Sastra Inggris memiliki peluang karier yang luas, antara lain sebagai:',
            'karir_list' => [
                ['item' => 'Guru atau instruktur bahasa Inggris di sekolah, lembaga kursus, dan institusi pendidikan lainnya.'],
                ['item' => 'Penerjemah dan juru bahasa di lembaga pemerintah, perusahaan, dan organisasi internasional.'],
                ['item' => 'Penulis konten, editor, dan pekerja kreatif di media cetak maupun digital.'],
                ['item' => 'Staf komunikasi, public relations, dan corporate communication di berbagai jenis organisasi.'],
                ['item' => 'Peneliti, akademisi, atau melanjutkan studi ke jenjang magister dan doktoral.'],
            ],
        ]);

        $this->command->info('✅ ProgramStudiSeeder berhasil dijalankan.');
    }
}
