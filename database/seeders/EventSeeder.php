<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'judul'             => 'Sintang Education Expo 2026 – NextGen Future Pathways',
                'slug'              => Str::slug('Sintang Education Expo 2026 – NextGen Future Pathways'),
                'gambar'            => null,
                'deskripsi_singkat' => 'STBA Pontianak dan STIE Indonesia Pontianak ikut serta dalam Education Expo terbesar di Sintang.',
                'deskripsi'         => '<p>STBA Pontianak bersama STIE Indonesia Pontianak turut berpartisipasi dalam Sintang Education Expo 2026 bertema “NextGen Future Pathways”.</p><p>Acara ini digelar selama dua hari penuh dan menjadi ajang promosi program studi serta layanan Penerimaan Mahasiswa Baru (PMB) langsung di Sintang, Kalimantan Barat.</p><p>Calon mahasiswa bisa mendapatkan informasi lengkap, konsultasi jurusan, dan pendaftaran on-the-spot.</p>',
                'tanggal_mulai'     => '2026-01-15',
                'tanggal_selesai'   => '2026-01-16',
                'lokasi'            => 'Sintang, Kalimantan Barat',
            ],
            [
                'judul'             => 'Pementasan Drama Bahasa Inggris “The Dream Realm”',
                'slug'              => Str::slug('Pementasan Drama Bahasa Inggris “The Dream Realm”'),
                'gambar'            => null,
                'deskripsi_singkat' => 'Mahasiswa Sastra Inggris STBA Pontianak sukses menggelar drama berbahasa Inggris dengan nuansa kearifan lokal.',
                'deskripsi'         => '<p>Program Studi Sastra Inggris STBA Pontianak kembali menghadirkan pentas drama berjudul “The Dream Realm: A Cultural Fiction”.</p><p>Acara yang melibatkan puluhan mahasiswa ini merupakan proyek akhir mata kuliah Stage Performance dan Scriptwriting.</p><p>Drama ini berhasil menyuguhkan cerita yang memadukan bahasa Inggris dengan elemen budaya lokal Kalimantan Barat dan mendapat apresiasi tinggi dari penonton serta dosen pembimbing.</p>',
                'tanggal_mulai'     => '2026-04-15',
                'tanggal_selesai'   => '2026-04-15',
                'lokasi'            => 'Aula Kampus STBA Pontianak',
            ],
            [
                'judul'             => 'Webinar LPPM STBA Pontianak: Strategi Peningkatan Jabatan Fungsional Dosen',
                'slug'              => Str::slug('Webinar LPPM STBA Pontianak: Strategi Peningkatan Jabatan Fungsional Dosen'),
                'gambar'            => null,
                'deskripsi_singkat' => 'Webinar nasional yang diikuti lebih dari 150 dosen se-Kalimantan Barat.',
                'deskripsi'         => '<p>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) STBA Pontianak sukses menyelenggarakan webinar nasional bertema “Strategi Peningkatan Jabatan Fungsional Dosen di Era Digital”.</p><p>Acara ini menghadirkan narasumber dari LLDikti Wilayah XI dan diikuti ratusan dosen dari berbagai perguruan tinggi.</p><p>Rekaman webinar telah diunggah di channel YouTube resmi kampus untuk dapat diakses secara gratis.</p>',
                'tanggal_mulai'     => '2026-05-10',
                'tanggal_selesai'   => '2026-05-10',
                'lokasi'            => 'Zoom Meeting (Online)',
            ],
            [
                'judul'             => 'Sosialisasi Kampus STBA & STIE ke SMK Panca Karsa Sungai Pinyuh',
                'slug'              => Str::slug('Sosialisasi Kampus STBA & STIE ke SMK Panca Karsa Sungai Pinyuh'),
                'gambar'            => null,
                'deskripsi_singkat' => 'Kegiatan sosialisasi langsung ke sekolah untuk memperkenalkan program studi dan PMB 2026/2027.',
                'deskripsi'         => '<p>STBA Pontianak dan STIE Indonesia Pontianak menggelar sosialisasi kampus di SMK Panca Karsa Sungai Pinyuh.</p><p>Kegiatan ini bertujuan memberikan motivasi kepada siswa kelas XII agar lebih siap melanjutkan pendidikan tinggi di bidang bahasa dan ekonomi.</p><p>Para siswa mendapatkan penjelasan lengkap mengenai program studi, biaya kuliah, beasiswa KIP-Kuliah, serta kesempatan tanya jawab langsung dengan tim PMB.</p>',
                'tanggal_mulai'     => '2026-03-20',
                'tanggal_selesai'   => '2026-03-20',
                'lokasi'            => 'SMK Panca Karsa Sungai Pinyuh',
            ],
            [
                'judul'             => 'Open House PMB STBA Pontianak Gelombang 2 Tahun 2026',
                'slug'              => Str::slug('Open House PMB STBA Pontianak Gelombang 2 Tahun 2026'),
                'gambar'            => null,
                'deskripsi_singkat' => 'Kenali kampus secara langsung, bertemu dosen, dan dapatkan info PMB terbaru.',
                'deskripsi'         => '<p>Open House PMB STBA Pontianak Gelombang 2 memberikan kesempatan bagi calon mahasiswa untuk mengenal lingkungan kampus, fasilitas, dan bertemu langsung dengan dosen serta mahasiswa aktif.</p><p>Agenda meliputi tur kampus, sesi tanya jawab, simulasi perkuliahan, serta pendaftaran langsung dengan diskon khusus.</p><p>Acara ini sangat direkomendasikan bagi yang masih ragu memilih jurusan Bahasa Inggris.</p>',
                'tanggal_mulai'     => '2026-05-25',
                'tanggal_selesai'   => '2026-05-25',
                'lokasi'            => 'Kampus STBA Pontianak, Jl. Gajahmada No.38',
            ],
            [
                'judul'             => 'Film Screening Kelas Drama “40 Days in That House”',
                'slug'              => Str::slug('Film Screening Kelas Drama “40 Days in That House”'),
                'gambar'            => null,
                'deskripsi_singkat' => 'Penayangan film pendek hasil karya mahasiswa kelas Drama STBA Pontianak.',
                'deskripsi'         => '<p>Mahasiswa/i kelas Drama STBA Pontianak mempersembahkan film pendek berbahasa Inggris berjudul “40 Days in That House”.</p><p>Film yang mengangkat tema perjalanan spiritual dan persahabatan ini tayang perdana di BCLC UNTAN pada 28 Juni 2025 dan mendapat sambutan hangat dari penonton.</p><p>Acara ini menjadi bukti nyata kreativitas mahasiswa Prodi Sastra Inggris dalam memadukan bahasa dan seni perfilman.</p>',
                'tanggal_mulai'     => '2026-06-28',
                'tanggal_selesai'   => '2026-06-28',
                'lokasi'            => 'BCLC UNTAN Pontianak',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }

        $this->command->info('✅ EventSeeder berhasil dijalankan dengan ' . count($events) . ' data event aktual STBA Pontianak!');
    }
}
