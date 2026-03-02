<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use Illuminate\Database\Seeder;

class DokumenSeeder extends Seeder
{
    public function run(): void
    {
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

        $this->command->info('15 Dokumen dummy berhasil dibuat.');
    }
}
