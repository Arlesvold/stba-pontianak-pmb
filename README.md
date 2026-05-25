# STBA Pontianak — Sistem PMB (Penerimaan Mahasiswa Baru)

Aplikasi web untuk **Penerimaan Mahasiswa Baru (PMB)** Sekolah Tinggi Bahasa Asing (STBA) Pontianak. Dibangun dengan **Laravel 12** dan panel admin **Filament v4**.

---

## Fitur Utama

- **Halaman Publik PMB** — Beranda, informasi pendaftaran, program studi (D3, S1, Sastra), berita, agenda, staf, kontak, dan dokumen.
- **Pendaftaran Online** — Calon mahasiswa dapat mendaftar, mengunggah dokumen, dan memantau status pendaftaran.
- **Manajemen Konten** — Admin dapat mengelola berita, agenda, event, kontak, staf, dan pengaturan marquee melalui panel Filament.
- **Manajemen Pendaftaran** — Admin dapat melihat dan mengelola data pendaftar serta status verifikasi.
- **Role & Permission** — Menggunakan `spatie/laravel-permission` untuk kontrol akses.

---

## Tech Stack

| Komponen | Teknologi |
|---|---|
| Framework | Laravel 12 |
| Admin Panel | Filament v4 |
| Database | MySQL |
| Auth | Laravel Breeze |
| Permission | Spatie Laravel Permission |
| Image Processing | Intervention Image v3 |
| Frontend | Bootstrap + Tailwind CSS |
| Environment | Laragon |

---

## Instalasi

### Prasyarat

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL

### Langkah-langkah

1. **Clone repository**
   ```bash
   git clone https://github.com/Arlesvold/stba-pontianak-pmb.git
   cd stba-pontianak-pmb
   ```

2. **Install dependensi PHP**
   ```bash
   composer install
   ```

3. **Install dependensi JavaScript**
   ```bash
   npm install
   ```

4. **Salin file environment**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Konfigurasi database** di file `.env`:
   ```
   DB_DATABASE=stba_pmb
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Jalankan migrasi dan seeder**
   ```bash
   php artisan migrate --seed
   ```

8. **Build aset frontend**
   ```bash
   npm run build
   ```

9. **Jalankan server**
   ```bash
   php artisan serve
   ```

---

## Struktur Utama

```
app/
├── Filament/Resources/   # Resource panel admin Filament
├── Http/Controllers/     # Controller publik & admin
│   ├── Admin/            # Controller admin (Berita, Agenda, Setting)
│   └── Pmb/              # Controller alur pendaftaran
└── Models/               # Eloquent Models (Berita, Agenda, Event, Registration, dst.)

resources/views/
├── pmb/                  # Halaman publik PMB
├── berita/               # Halaman berita
├── agenda/               # Halaman agenda
├── prodi/                # Halaman program studi
└── staf/                 # Halaman staf/dosen
```

---

## Panel Admin

Panel admin menggunakan **Filament v4** dan dapat diakses di `/admin` setelah login sebagai administrator.

Fitur yang tersedia di panel admin:
- Manajemen Berita
- Manajemen Agenda
- Manajemen Event
- Manajemen Staf
- Manajemen Dokumen
- Manajemen Kontak
- Data Pendaftaran & Verifikasi
- Pengaturan (Marquee, dll.)

---

## Lisensi

Proyek ini dikembangkan untuk keperluan internal STBA Pontianak.
