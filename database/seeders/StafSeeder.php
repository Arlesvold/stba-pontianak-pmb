<?php

namespace Database\Seeders;

use App\Models\Staf;
use Illuminate\Database\Seeder;

class StafSeeder extends Seeder
{
    public function run(): void
    {
        $stafList = [
            ['nama' => 'Dr. H. Ahmad Fauzi, M.Pd.', 'posisi' => 'Ketua STBA Pontianak', 'display_order' => 1],
            ['nama' => 'Dr. Siti Nurhaliza, M.Hum.', 'posisi' => 'Wakil Ketua I Bidang Akademik', 'display_order' => 2],
            ['nama' => 'Drs. Budi Santoso, M.M.', 'posisi' => 'Wakil Ketua II Bidang Administrasi', 'display_order' => 3],
            ['nama' => 'Dr. Rina Marlina, M.A.', 'posisi' => 'Wakil Ketua III Bidang Kemahasiswaan', 'display_order' => 4],
            ['nama' => 'Prof. Dr. James Hartono, M.Litt.', 'posisi' => 'Ketua Program Studi Sastra Inggris', 'display_order' => 5],
            ['nama' => 'Dr. Yuliana Dewi, M.Pd.', 'posisi' => 'Sekretaris Program Studi Sastra Inggris', 'display_order' => 6],
            ['nama' => 'Dr. Hiroshi Tanaka, M.A.', 'posisi' => 'Ketua Program Studi Sastra Jepang', 'display_order' => 7],
            ['nama' => 'Dra. Mei Ling, M.Hum.', 'posisi' => 'Ketua Program Studi Sastra Mandarin', 'display_order' => 8],
            ['nama' => 'Dr. Andi Prasetyo, M.Pd.', 'posisi' => 'Kepala LPPM', 'display_order' => 9],
            ['nama' => 'Drs. Herman Wijaya, M.Si.', 'posisi' => 'Kepala BAAK', 'display_order' => 10],
            ['nama' => 'Dr. Linda Agustina, M.Pd.', 'posisi' => 'Kepala Perpustakaan', 'display_order' => 11],
            ['nama' => 'Ir. Teguh Firmansyah, M.Kom.', 'posisi' => 'Kepala UPT Teknologi Informasi', 'display_order' => 12],
            ['nama' => 'Dr. Sarah Johnson, M.TESOL', 'posisi' => 'Dosen Bahasa Inggris', 'display_order' => 13],
            ['nama' => 'Dr. Ratna Sari, M.Hum.', 'posisi' => 'Dosen Linguistik', 'display_order' => 14],
            ['nama' => 'Dr. Michael Chen, M.A.', 'posisi' => 'Dosen Penerjemahan', 'display_order' => 15],
            ['nama' => 'Dra. Fatimah Zahra, M.Pd.', 'posisi' => 'Dosen Sastra dan Budaya', 'display_order' => 16],
            ['nama' => 'Dr. David Kurniawan, M.Litt.', 'posisi' => 'Dosen Sastra Inggris', 'display_order' => 17],
            ['nama' => 'Dra. Yuki Nakamura, M.A.', 'posisi' => 'Dosen Bahasa Jepang', 'display_order' => 18],
            ['nama' => 'Dr. Wei Zhang, M.Hum.', 'posisi' => 'Dosen Bahasa Mandarin', 'display_order' => 19],
            ['nama' => 'Hendra Gunawan, S.Pd., M.Pd.', 'posisi' => 'Kepala Bagian Keuangan', 'display_order' => 20],
        ];

        foreach ($stafList as $staf) {
            Staf::create(array_merge($staf, [
                'foto' => null,
                'status_aktif' => true,
            ]));
        }

        $this->command->info('20 Staf dummy berhasil dibuat.');
    }
}
