<?php

use App\Models\User;
use App\Models\Registration;

test('halaman daftar pmb bisa diakses oleh user yang login', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('pmb.daftar'));

    $response->assertOk();
});

test('user bisa submit form pendaftaran pmb', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post(route('pmb.daftar.submit'), [
            'nama_lengkap'    => 'Budi Santoso',
            'nik'             => '1234567890123456',
            'tanggal_lahir'   => '2005-01-01',
            'jenis_kelamin'   => 'L',
            'email'           => 'budi@example.com',
            'no_hp'           => '081234567890',
            'alamat'          => 'Jalan Pahlawan No. 1',
            'program_studi'   => 'S1 Sastra Inggris',
            'sistem_kuliah'   => 'Reguler (Pagi)',
            'sekolah_asal'    => 'SMA 1 Pontianak',
            'jurusan_sekolah' => 'IPA',
            'tahun_lulus'     => '2023',
            'setuju'          => 'on',
        ]);

    $response->assertSessionHasNoErrors();
    $response->assertRedirect(route('pmb.unggah-dokumen'));

    $this->assertDatabaseHas('registrations', [
        'user_id'       => $user->id,
        'nama_lengkap'  => 'Budi Santoso',
        'program_studi' => 'S1 Sastra Inggris',
        'step'          => 2,
    ]);
});

test('halaman daftar pmb tidak bisa diakses oleh guest', function () {
    $response = $this->get(route('pmb.daftar'));

    $response->assertRedirect(route('login'));
});

test('user bisa upload dokumen pmb termasuk kk dan transkrip', function () {
    \Illuminate\Support\Facades\Storage::fake('public');

    $user = User::factory()->create();
    $registration = Registration::create([
        'user_id' => $user->id,
        'nama_lengkap' => 'Budi Santoso',
        'nik' => '1234567890123456',
        'tanggal_lahir' => '2005-01-01',
        'jenis_kelamin' => 'L',
        'email' => 'budi@example.com',
        'no_hp' => '081234567890',
        'alamat' => 'Jalan',
        'program_studi' => 'S1 Sastra Inggris',
        'sistem_kuliah' => 'Reguler',
        'sekolah_asal' => 'SMA',
        'tahun_lulus' => '2023',
        'step' => 2,
    ]);

    $response = $this
        ->actingAs($user)
        ->post(route('pmb.unggah-dokumen.submit'), [
            'ijazah_rapor' => \Illuminate\Http\UploadedFile::fake()->image('ijazah.jpg'),
            'kk'           => \Illuminate\Http\UploadedFile::fake()->image('kk.jpg'),
            'transkrip_nilai' => \Illuminate\Http\UploadedFile::fake()->image('transkrip.jpg'),
            'pas_foto'     => \Illuminate\Http\UploadedFile::fake()->image('foto.jpg'),
        ]);

    $response->assertSessionHasNoErrors();
    $response->assertRedirect(route('pmb.verifikasi-tes'));

    $registration->refresh();

    $this->assertNotNull($registration->ijazah_path);
    $this->assertNotNull($registration->kk_path);
    $this->assertNotNull($registration->transkrip_path);
    $this->assertNotNull($registration->foto_path);
    $this->assertEquals(3, $registration->step);

    \Illuminate\Support\Facades\Storage::disk('public')->assertExists($registration->ijazah_path);
    \Illuminate\Support\Facades\Storage::disk('public')->assertExists($registration->kk_path);
    \Illuminate\Support\Facades\Storage::disk('public')->assertExists($registration->transkrip_path);
    \Illuminate\Support\Facades\Storage::disk('public')->assertExists($registration->foto_path);
});
