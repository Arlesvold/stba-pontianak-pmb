<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $beritas = [
            [
                'judul'   => 'Penerimaan Mahasiswa Baru STBA Pontianak Tahun Akademik 2026/2027 Gelombang 2 Dibuka',
                'slug'    => Str::slug('Penerimaan Mahasiswa Baru STBA Pontianak Tahun Akademik 2026/2027 Gelombang 2 Dibuka'),
                'tanggal' => '2026-03-01',
                'gambar'  => null,
                'isi'     => '<p>STBA Pontianak secara resmi membuka Penerimaan Mahasiswa Baru (PMB) Tahun Akademik 2026/2027 Gelombang 2. Pendaftaran berlangsung mulai 1 Maret hingga 30 Juni 2026.</p><p>Program studi yang ditawarkan antara lain Diploma (D3) Bahasa Inggris dan Sarjana (S1) Sastra Inggris. Biaya pendaftaran sangat terjangkau mulai Rp 2.000.000 langsung menjadi mahasiswa. Jalur KIP-Kuliah juga tersedia dengan diskon pendaftaran.</p><p>Calon mahasiswa dapat mendaftar secara online melalui portal resmi <a href="https://stbapontianak.ac.id/">stbapontianak.ac.id</a> atau menghubungi panitia PMB di nomor 0858-2238-5552 / 0822-5595-6887.</p>',
            ],

            [
                'judul'   => 'Mahasiswa Sastra Inggris STBA Pontianak Sukses Gelar Drama Performance “The Dream Realm”',
                'slug'    => Str::slug('Mahasiswa Sastra Inggris STBA Pontianak Sukses Gelar Drama Performance “The Dream Realm”'),
                'tanggal' => '2026-04-15',
                'gambar'  => null,
                'isi'     => '<p>Program Studi Sastra Inggris STBA Pontianak kembali menunjukkan kreativitas mahasiswanya melalui pentas drama berbahasa Inggris berjudul “The Dream Realm”.</p><p>Acara yang digelar di aula kampus ini melibatkan 25 mahasiswa dari berbagai semester. Drama ini merupakan proyek akhir mata kuliah Stage Performance dan Scriptwriting.</p><p>Kegiatan ini mendapat apresiasi tinggi dari dosen pembimbing dan undangan dari beberapa SMA di Pontianak. Acara serupa akan kembali digelar di akhir semester ini.</p>',
            ],
            [
                'judul'   => 'Webinar LPPM STBA Pontianak: Strategi Peningkatan Jabatan Fungsional Dosen',
                'slug'    => Str::slug('Webinar LPPM STBA Pontianak: Strategi Peningkatan Jabatan Fungsional Dosen'),
                'tanggal' => '2026-05-10',
                'gambar'  => null,
                'isi'     => '<p>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) STBA Pontianak sukses menyelenggarakan webinar nasional bertema “Strategi Peningkatan Jabatan Fungsional Dosen di Era Digital”.</p><p>Webinar ini diikuti lebih dari 150 dosen dari berbagai perguruan tinggi di Kalimantan Barat. Narasumber utama berasal dari LLDikti Wilayah XI.</p><p>Materi lengkap dan rekaman video sudah diunggah di channel YouTube resmi STBA Pontianak. Kegiatan ini merupakan bagian dari program pengabdian masyarakat kampus.</p>',
            ],
            [
                'judul'   => 'Kolaborasi PMB STBA Pontianak dan STIE Indonesia Pontianak: Satu Pintu Pendaftaran 2026/2027',
                'slug'    => Str::slug('Kolaborasi PMB STBA Pontianak dan STIE Indonesia Pontianak: Satu Pintu Pendaftaran 2026/2027'),
                'tanggal' => '2026-02-01',
                'gambar'  => null,
                'isi'     => '<p>STBA Pontianak dan STIE Indonesia Pontianak kembali menjalin kerjasama dalam penyelenggaraan Penerimaan Mahasiswa Baru (PMB) Tahun Akademik 2026/2027.</p><p>Dengan sistem satu pintu, calon mahasiswa dapat mendaftar di salah satu kampus dan memilih program studi di kedua perguruan tinggi tersebut. Fasilitas dan informasi terintegrasi sepenuhnya.</p><p>Kolaborasi ini semakin memudahkan masyarakat Pontianak dan sekitarnya yang ingin melanjutkan pendidikan tinggi di bidang bahasa dan ekonomi.</p>',
            ],
            [
                'judul'   => 'Pendaftaran Gelombang 3 PMB STBA Pontianak 2026/2027 Segera Dibuka',
                'slug'    => Str::slug('Pendaftaran Gelombang 3 PMB STBA Pontianak 2026/2027 Segera Dibuka'),
                'tanggal' => '2026-06-15',
                'gambar'  => null,
                'isi'     => '<p>STBA Pontianak mengumumkan bahwa Gelombang 3 Penerimaan Mahasiswa Baru Tahun Akademik 2026/2027 akan dibuka mulai 1 Juli hingga 12 September 2026.</p><p>Ini merupakan kesempatan terakhir bagi calon mahasiswa yang belum sempat mendaftar di gelombang sebelumnya. Kuota masih tersedia untuk kedua program studi unggulan.</p><p>Segera persiapkan dokumen Anda dan daftar sekarang melalui situs resmi kampus. Informasi lengkap dapat dilihat di Instagram @stbapontianak.</p>',
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }

        $this->command->info('✅ BeritaSeeder berhasil dijalankan dengan ' . count($beritas) . ' data berita aktual STBA Pontianak!');
    }
}
