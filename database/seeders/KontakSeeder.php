<?php

namespace Database\Seeders;

use App\Models\Kontak;
use Illuminate\Database\Seeder;

class KontakSeeder extends Seeder
{
    public function run(): void
    {
        $kontaks = [
            [
                'nama'         => 'Drs. Andi Pratama, M.Pd.',
                'tugas'        => 'Koordinator Penerimaan Mahasiswa Baru',
                'nomor_hp'     => '0812-3456-7890',
                'email'        => 'andi.pmb@stbapontianak.ac.id',
                'hari_layanan' => 'Senin–Jumat',
                'jam_layanan'  => '08.00–15.00 WIB',
                'aktif'        => true,
            ],
            [
                'nama'         => 'Rina Kartika, S.S.',
                'tugas'        => 'Admin Informasi & Layanan PMB',
                'nomor_hp'     => '0851-2345-6789',
                'email'        => 'info.pmb@stbapontianak.ac.id',
                'hari_layanan' => 'Senin–Jumat',
                'jam_layanan'  => '08.00–16.00 WIB',
                'aktif'        => true,
            ],
            [
                'nama'         => 'Budi Santoso, S.Pd.',
                'tugas'        => 'Staf Akademik & Registrasi Mahasiswa',
                'nomor_hp'     => '0823-4567-8901',
                'email'        => 'akademik@stbapontianak.ac.id',
                'hari_layanan' => 'Senin–Kamis',
                'jam_layanan'  => '08.00–15.00 WIB',
                'aktif'        => true,
            ],
            [
                'nama'         => 'Sari Dewi Lestari, S.Kom.',
                'tugas'        => 'Admin Teknologi Informasi & Sistem Pendaftaran Online',
                'nomor_hp'     => '0857-6789-0123',
                'email'        => 'it@stbapontianak.ac.id',
                'hari_layanan' => 'Senin–Jumat',
                'jam_layanan'  => '09.00–17.00 WIB',
                'aktif'        => true,
            ],
            [
                'nama'         => 'Dr. Hj. Yuliana, M.Hum.',
                'tugas'        => 'Wakil Ketua Bidang Akademik & Kemahasiswaan',
                'nomor_hp'     => '0811-9876-5432',
                'email'        => 'wakil.akademik@stbapontianak.ac.id',
                'hari_layanan' => 'Selasa & Kamis',
                'jam_layanan'  => '09.00–12.00 WIB',
                'aktif'        => true,
            ],
        ];

        foreach ($kontaks as $kontak) {
            Kontak::create($kontak);
        }
    }
}
