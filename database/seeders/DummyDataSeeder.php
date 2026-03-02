<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Dokumen;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // ========== BERITA (25 data) ==========
        $beritaList = [
            'Wisuda Sarjana STBA Pontianak Angkatan ke-20',
            'STBA Pontianak Raih Akreditasi Unggul dari BAN-PT',
            'Seminar Nasional Linguistik dan Sastra 2026',
            'Mahasiswa STBA Juara 1 Lomba Debat Bahasa Inggris',
            'Kunjungan Duta Besar Jepang ke Kampus STBA',
            'Workshop Penulisan Jurnal Internasional',
            'Program Pertukaran Mahasiswa ke University of Malaya',
            'Peresmian Gedung Baru Laboratorium Bahasa',
            'STBA Pontianak Gelar Kuliah Umum Bersama Prof. Noam',
            'Pendaftaran Beasiswa Unggulan Kemendikbud Dibuka',
            'Festival Budaya Nusantara di STBA Pontianak',
            'Alumni STBA Sukses Berkarier di Perusahaan Multinasional',
            'Kerja Sama MoU dengan Universitas di Australia',
            'Tim Peneliti STBA Publikasi di Jurnal Scopus Q1',
            'Pembukaan Program Studi Baru: Sastra Mandarin',
            'STBA Pontianak Tuan Rumah Konferensi ASEAN Linguistics',
            'Mahasiswa STBA Ikuti Program Magang di Kedutaan Besar',
            'Pelatihan TOEFL Gratis untuk Mahasiswa Semester Akhir',
            'Dosen STBA Raih Penghargaan Peneliti Terbaik Nasional',
            'Open House STBA Pontianak: Kenali Kampus Lebih Dekat',
            'Launching E-Learning Platform STBA Pontianak',
            'Lomba Menulis Esai Bahasa Indonesia Tingkat Nasional',
            'STBA Pontianak Gandeng Duolingo untuk Program Sertifikasi',
            'Mahasiswa STBA Wakili Indonesia di Model United Nations',
            'Pengabdian Masyarakat: Kursus Bahasa Inggris Gratis di Desa',
        ];

        foreach ($beritaList as $i => $judul) {
            Berita::create([
                'judul'   => $judul,
                'slug'    => Str::slug($judul),
                'isi'     => $this->generateParagraphs($judul, rand(3, 6)),
                'tanggal' => now()->subDays(rand(1, 120)),
                'gambar'  => null,
            ]);
        }

        // ========== EVENT (25 data) ==========
        $eventList = [
            'Seminar Internasional Translation Studies',
            'Workshop Creative Writing in English',
            'Lomba Pidato Bahasa Inggris se-Kalimantan',
            'Webinar: Peluang Karier Lulusan Bahasa',
            'Kelas Terbuka: Introduction to Phonetics',
            'Talk Show: Belajar Bahasa Jepang dari Nol',
            'Kompetisi Storytelling Bahasa Inggris',
            'Pelatihan Public Speaking untuk Mahasiswa',
            'Cultural Exchange Day: STBA x Korea University',
            'Symposium Literature and Language Teaching',
            'Career Fair STBA Pontianak 2026',
            'Guest Lecture: Applied Linguistics Research',
            'Film Screening & Discussion: English Movies',
            'Workshop Penulisan Proposal Penelitian',
            'Pentas Seni Bahasa dan Budaya',
            'Seminar TESOL Methodology for EFL Teachers',
            'Hackathon Edutech Bahasa dan Sastra',
            'Pelatihan Interpreter dan Translator Profesional',
            'STBA Language Festival 2026',
            'Diskusi Panel: Masa Depan Pendidikan Bahasa di Indonesia',
            'Kompetisi Essay Writing Competition 2026',
            'Workshop Resume & Interview in English',
            'Perayaan Hari Bahasa Ibu Internasional',
            'Kunjungan Industri ke Perusahaan Penerjemahan',
            'Graduation Ceremony & Alumni Gathering 2026',
        ];

        foreach ($eventList as $i => $judul) {
            $mulai = now()->subDays(rand(-30, 90));
            Event::create([
                'judul'            => $judul,
                'slug'             => Str::slug($judul),
                'gambar'           => null,
                'deskripsi_singkat' => fake('id_ID')->sentence(15),
                'deskripsi'        => $this->generateParagraphs($judul, rand(2, 5)),
                'tanggal_mulai'    => $mulai,
                'tanggal_selesai'  => (clone $mulai)->addDays(rand(1, 3)),
                'lokasi'           => fake('id_ID')->randomElement([
                    'Aula Utama STBA Pontianak',
                    'Ruang Seminar Lt. 3',
                    'Gedung Laboratorium Bahasa',
                    'Hall Serbaguna Kampus',
                    'Online via Zoom',
                    'Auditorium STBA',
                ]),
            ]);
        }

        // ========== AGENDA (25 data) ==========
        $agendaList = [
            'Rapat Senat Akademik Semester Genap',
            'Ujian Tengah Semester Genap 2025/2026',
            'Ujian Akhir Semester Genap 2025/2026',
            'Pendaftaran Mata Kuliah Semester Ganjil',
            'Batas Akhir Pengumpulan Skripsi',
            'Sidang Skripsi Gelombang I',
            'Sidang Skripsi Gelombang II',
            'Wisuda Periode Maret 2026',
            'Libur Hari Raya Idul Fitri',
            'Pekan Orientasi Mahasiswa Baru',
            'Workshop Kurikulum Merdeka Belajar',
            'Rapat Koordinasi Dosen dan Staf',
            'Pelantikan BEM dan Organisasi Mahasiswa',
            'Hari Pendidikan Nasional',
            'Kegiatan Bakti Sosial Kampus',
            'Pelatihan Penggunaan Sistem Informasi Akademik',
            'Bimbingan Akademik Semester Baru',
            'Evaluasi Kinerja Dosen Semester Genap',
            'Penyerahan Nilai Akhir ke BAAK',
            'Pengumuman Kelulusan dan IPK',
            'Pendaftaran Yudisium Periode Juni',
            'Libur Semester Genap',
            'Registrasi Ulang Mahasiswa Lama',
            'Pembekalan KKN Mahasiswa',
            'Sosialisasi Program MBKM ke Mahasiswa',
        ];

        foreach ($agendaList as $i => $judul) {
            $mulai = now()->subDays(rand(-15, 60));
            Agenda::create([
                'judul'           => $judul,
                'tanggal_mulai'   => $mulai,
                'tanggal_selesai' => (clone $mulai)->addDays(rand(1, 7)),
                'deskripsi'       => fake('id_ID')->paragraph(rand(2, 4)),
            ]);
        }

        // ========== DOKUMEN (15 data) ==========
        $dokumenList = [
            ['judul' => 'Panduan Akademik 2025/2026', 'file' => 'dokumen/panduan-akademik-2025-2026.pdf', 'deskripsi' => 'Buku panduan akademik untuk tahun ajaran 2025/2026.'],
            ['judul' => 'Kalender Akademik Semester Genap', 'file' => 'dokumen/kalender-akademik-genap.pdf', 'deskripsi' => 'Jadwal kegiatan akademik semester genap 2025/2026.'],
            ['judul' => 'Formulir Pendaftaran Mahasiswa Baru', 'file' => 'dokumen/formulir-pendaftaran-maba.docx', 'deskripsi' => 'Formulir yang harus diisi oleh calon mahasiswa baru.'],
            ['judul' => 'Kurikulum Program Studi Sastra Inggris', 'file' => 'dokumen/kurikulum-sastra-inggris.pdf', 'deskripsi' => 'Struktur kurikulum lengkap Program Studi Sastra Inggris.'],
            ['judul' => 'Daftar Biaya Kuliah TA 2025/2026', 'file' => 'dokumen/biaya-kuliah-2025-2026.xlsx', 'deskripsi' => 'Rincian biaya kuliah per semester.'],
            ['judul' => 'Surat Keterangan Aktif Kuliah (Template)', 'file' => 'dokumen/template-surat-aktif-kuliah.docx', 'deskripsi' => 'Template surat keterangan aktif kuliah untuk keperluan administrasi.'],
            ['judul' => 'Panduan Penulisan Skripsi STBA', 'file' => 'dokumen/panduan-skripsi-stba.pdf', 'deskripsi' => 'Pedoman tata cara penulisan skripsi bagi mahasiswa tingkat akhir.'],
            ['judul' => 'Jadwal Ujian Akhir Semester Genap', 'file' => 'dokumen/jadwal-uas-genap.pdf', 'deskripsi' => 'Jadwal lengkap UAS semester genap 2025/2026.'],
            ['judul' => 'Rekap Nilai Mahasiswa Semester Ganjil', 'file' => 'dokumen/rekap-nilai-ganjil.xlsx', 'deskripsi' => 'Rekap nilai seluruh mahasiswa semester ganjil.'],
            ['judul' => 'Prosedur Pengajuan Cuti Akademik', 'file' => 'dokumen/prosedur-cuti-akademik.pdf', 'deskripsi' => 'Tata cara dan persyaratan pengajuan cuti akademik.'],
            ['judul' => 'MoU Kerja Sama University of Malaya', 'file' => 'dokumen/mou-university-malaya.pdf', 'deskripsi' => 'Dokumen MoU kerja sama internasional dengan University of Malaya.'],
            ['judul' => 'Daftar Dosen dan Jabatan Fungsional', 'file' => 'dokumen/daftar-dosen-jabfung.xlsx', 'deskripsi' => 'Data lengkap dosen beserta jabatan fungsional.'],
            ['judul' => 'Peraturan Akademik STBA Pontianak', 'file' => 'dokumen/peraturan-akademik-stba.pdf', 'deskripsi' => 'Peraturan akademik yang berlaku di STBA Pontianak.'],
            ['judul' => 'Formulir Pendaftaran KKN', 'file' => 'dokumen/formulir-kkn.docx', 'deskripsi' => 'Formulir pendaftaran Kuliah Kerja Nyata (KKN).'],
            ['judul' => 'Laporan Tahunan STBA Pontianak 2025', 'file' => 'dokumen/laporan-tahunan-2025.pdf', 'deskripsi' => 'Laporan kinerja dan capaian STBA Pontianak tahun 2025.'],
        ];

        foreach ($dokumenList as $dok) {
            Dokumen::create($dok);
        }

        $this->command->info('✅ 25 Berita, 25 Event, 25 Agenda, 15 Dokumen dummy berhasil dibuat.');
    }

    /**
     * Generate beberapa paragraf konten realistis.
     */
    private function generateParagraphs(string $topik, int $count): string
    {
        $paragraphs = [];
        $faker = fake('id_ID');

        $paragraphs[] = "Dalam rangka meningkatkan kualitas pendidikan bahasa di STBA Pontianak, kegiatan \"{$topik}\" diselenggarakan dengan penuh antusiasme. "
            . $faker->paragraph(3);

        for ($i = 1; $i < $count; $i++) {
            $paragraphs[] = $faker->paragraph(rand(3, 6));
        }

        return implode("\n\n", $paragraphs);
    }
}
