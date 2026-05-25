# User Manual - Sistem Informasi Penerimaan Mahasiswa Baru (PMB) STBA Pontianak

Buku panduan ini ditujukan bagi Pengurus/Admin dari STBA (Penerimaan Mahasiswa Baru) serta calon mahasiswa yang sedang mengurus pendaftaran. Sistem ini dibangun menggunakan Laravel 12 dan Panel Filament v4. Panduan ini dirancang lengkap agar mudah dipahami, serta disusun dengan format bersih agar rapi saat dicetak atau disave ke format PDF.

---

## 👥 BAGIAN I: PANDUAN PENGGUNA (CALON MAHASISWA & MASYARAKAT)

Halaman depan (Front-end) adalah antarmuka publik yang digunakan oleh pengunjung dan calon mahasiswa untuk melihat informasi STBA dan melakukan pendaftaran.

### 1. Navigasi Halaman Publik / Informasi Kampus

- **Beranda (Home):** Menampilkan profil ringkas kampus, sambutan, dan pintasan cepat (Quick Links) menuju ke Pendaftaran PMB.
- **Berita & Pengumuman:** Menampilkan timeline berita terkini. Jika sebuah berita diklik, sistem akan menampilkan isi berita secara detail beserta gambarnya. Fitur ini mempermudah pengguna memantau info seperti pembagian kuota mahasiswa atau pengumuman kampus.
- **Event:** Menampilkan kegiatan-kegiatan kampus yang akan atau sedang berlangsung (misal: "Seminar Nasional Mahasiswa Sastra").
- **Agenda PMB:** Kalender timeline pendaftaran, kapan gelombang 1 dibuka, pendaftaran ulang, masa penerimaan berkas, dan masa matrikulasi.
- **Staf / Kepengurusan:** Pengunjung dapat melihat daftar Dosen, Ketua, Wakil Ketua, dan Staf STBA beserta foto dan jabatan mereka.
- **Unduh Dokumen:** Tersedia halaman di mana pengunjung dapat mengunduh dokumen penting secara legal berbentuk PDF, seperti brosur PMB, tata cara pendaftaran jalur prestasi, atau rincian biaya SPP.
- **Kontak (Contact Us):** Calon mahasiswa dapat mengirimkan masalah kendala pendaftaran atau pertanyaan langsung dari form ini. Pertanyaan akan dijawab oleh staf pelayanan (CS).

### 2. Panduan Melakukan Pendaftaran PMB

1. **Mulai Mendaftar:** Pada halaman beranda, klik tombol **Daftar Sekarang**. Anda akan diarahkan ke form pendaftaran online.
2. **Data Pribadi:** Isikan field wajib seperti: `Nama Lengkap`, `NIK`, `Email`, `Nomor HP/WhatsApp`, alamat, dan `Tanggal Lahir`.
3. **Data Akademik:** Isikan info `Program Studi` yang dipilih, `Sekolah Asal`, serta jurusan sekolah dan tahun kelulusan Anda.
4. **Upload Dokumen Wajib:** Unggah `Pas Foto` terbaru (Format Gambar) dan `Ijazah/SKL` (Format PDF/Gambar) ke kolom yang telah disediakan.
5. **Submit & Selesai:** Klik simpan. Layar akan menampilkan notifikasi **sukses**. Anda juga akan menerima sebuah Email (`PmbSubmissionMail`) berisi ringkasan data sebagai bukti bahwa Anda resmi terdaftar pada database STBA namun berstatus "Pending".
6. **Tunggu Pengumuman:** Jika diverifikasi dan status diubah admin menjadi **Diterima / Lulus**, sistem akan mengirimkan Anda email kelulusan resmi (`PmbCompletedMail`) yang memuat langkah daftar ulang selanjutnya.

---

## 🛠️ BAGIAN II: PANDUAN ADMINISTRATOR (FILAMENT DASHBOARD)

Bagian ini khusus untuk Pengurus / Admin STBA untuk me-manage seluruh data pendaftaran (Admission), mengelola konten Web (CMS - Content Management System), dan mengatur pengaturan dasar institusi. Panel ini dibangun dengan **Filament Dashboard**.

### 1. Cara Login Administrator

1. Buka browser dan pergi ke URL: `http://domain-stba.com/admin`.
2. Halaman Login Filament akan terbuka. Masukkan **Email** administrator.
3. Masukkan **Password** akun Anda.
4. Klik tombol **Sign in**. Anda akan langsung dibawa ke layar Dashboard Utama.
5. _Catatan:_ Untuk keluar sistem dengan aman, klik profil Anda di ujung menu dan pilih **Sign out**.

---

### 2. MANAJEMEN PENDAFTARAN & MAHASISWA BARU (ADMISSION)

#### A. Menu "Registration" (Pendaftar Baru/Status Pending)

Menu ini menampung data calon mahasiswa yang baru saja mendaftar melalui website. Data yang diverifikasi dilakukan di sini.

- **Cara Akses:** Klik menu **Registration** di Sidebar kiri.
- **List Pendaftar:** Layar menampilkan tabel berisikan `Nama Lengkap`, `Email`, `No.HP`, `Program Studi`, dan `Status` (biasanya default: "Pending"). Anda bisa mem-filter berdasarkan "Program Studi" atau "Status" di header tabel.
- **Melihat Detail (View):** Klik icon mata (👁️ View) di sebelah kanan nama mahasiswa. Anda dapat memeriksa form pendaftar, membaca rekap data mahasiswa, dan mengepalkan tombol klik pada Foto/Dokumen Ijazah untuk melihat file yang mereka upload.
- **Ubah Status / Evaluasi (Edit):**
    1. Klik icon pensil (✏️ Edit).
    2. Pada _Section "Ubah Status & Feedback"_, Anda bisa mengubah `Status` dari Pending menjadi In Progress, Completed (Diterima), atau Rejected.
    3. Anda juga dapat memberikan `Feedback` (contoh: "Ijazah buram, harap bawa fotokopi ke kampus").
    4. Jika diubah menjadi _Completed_, biasanya pendaftar otomatis akan dihapus/dipindahkan dari daftar pending ini dan email bukti kelulusan otomatis terkirim. Klik **Save Changes**.

#### B. Menu "Completed Registration" (Data Pendaftar Lulus/Selesai)

Menu ini berfungsi sebagai Arsip final dari PMB. Mahasiswa yang sukses lolos seleksi dan telah memenuhi syarat akan masuk ke daftar ini.

- **Cara Akses:** Klik **Completed Registration**.
- **Fungsi Utama:** Ini berguna agar rekapitulasi data rapi, terpisah dari yang sedang diseleksi. Dari halaman ini, admin biasanya mengeksport data menjadi Excel (jika didukung bulk-action Export) untuk diimpor ke SIAKAD (Sistem Akademik).

---

### 3. MANAJEMEN KONTEN WEBSITE (CMS)

Semua modul di bawah ini akan memengaruhi konten Publik pada front-end.

#### A. Menu "Berita"

Tempat mengelola artikel, liputan acara, serta informasi pengumuman.

- **Tambah Baru:** Klik **+ New Berita**. Isi kolom `Judul`, `Slug` (ter-generate otomatis), pilih `Tanggal`, unggah `Gambar` cover berita, dan tulis `Isi` berita menggunakan text editor canggih (Rich Editor). Lalu klik **Create**.
- **Edit/Hapus:** Pada tabel, klik "Edit" di baris berita untuk mengubah jika ada salah ketik, atau "Delete" untuk menghapusnya sama sekali dari web.

#### B. Menu "Event"

Khusus untuk mengumumkan kegiatan dengan batas waktu, seperti _Live Session, Sosialisasi Kampus, dll_.

- **Tambah Baru:** Klik **+ New Event**. Isi `Judul`, `Upload Gambar`, tuliskan `Deskripsi Singkat`, isi `Deskripsi` lengkap, serta tentukan `Tanggal Mulai`, `Tanggal Selesai`, dan `Lokasi` acara berlangsung. Terakhir klik **Create**.

#### C. Menu "Agenda"

Berbeda dengan Event, agenda adalah pengaturan jadwal timeline dari sistem STBA. (Misal: Tanggal pendaftaran gelombang I, Tanggal Verifikasi, dll).

- **Tambah Baru:** Klik **+ New Agenda**. Di sini Anda cukup memasukkan `Judul` fase (contoh: "Matrikulasi"), `Tanggal Mulai`, `Tanggal Selesai`, dan `Deskripsi`. Timeline akan tersusun rapi di halaman depan.

---

### 4. MANAJEMEN DATA INFORMASI KAMPUS

#### A. Menu "Stafs" (Struktur Organisasi)

Digunakan untuk memasukkan daftar dosen atau pengurus di PMB / Kampus.

- **Tambah Baru:** Klik **Stafs** > **+ New Staf**.
- **Detail Form:** Upload `Foto Staf`. Masukkan `Nama Staf` secara lengkap (beserta gelar misal M.Hum, S.S). Masukkan `Posisi` (contoh: "Ketua Prodi", "Kepala BAK", "Dosen Sastra Inggris"). Simpan. Data akan muncul di halaman direktori Staf di website.

#### B. Menu "Dokumens" (Unduhan Publik)

Pusat file manager untuk publik.

- **Tambah Baru:** Klik **Dokumens** > **+ New Dokumen**.
- **Detail Form:** Isi `Judul` Dokumen (misal: "Brosur Biaya PMB 2026"). Pada kolom `File`, unggah dokumen berbentuk PDF, Word, atau Excel.
- Maksimal ukuran sangat bergantung pada panduan (sekitar 20MB). Begitu disimpan dengan klik **Create**, publik bisa menekan dan men-download file Anda.

#### C. Menu "Kontak" (Buku Tamu / Layanan Pengaduan)

Berbeda dengan menu lain, menu ini umumnya tidak diisi oleh admin, melainkan menampung data form kontak dari halaman Front-end.

- **Melihat Pesan:** Klik menu **Kontak**. Anda bisa melihat daftar nama pengunjung, `tugas/keperluan`, `nomor hp`, `email`, dan waktu (jadwal) yang mereka tinggalkan.
- Anda dapat menekan **View** untuk membaca detail pesan/jam layanannya, lalu membalas dan melakukan follow-up secara manual ke Email/WhatsApp calon pendaftar tersebut.

---

### 5. KONFIGURASI SISTEM / DATA MASTER

#### A. Menu "Setting" (Pengaturan Website Institusi)

Menu ini **sangat penting** karena mengatur identitas core/inti dari tampilan website STBA Pontianak.

- **Cara Mengedit:** Klik **Setting** dari sidebar, lalu pilih tombol Edit (jika bentuknya tabel).
- **Elemen yang bisa diubah:** (Tergantung isian keys konfigurasi yang disediakan)
    - _Nama Universitas:_ Text logo institusi.
    - _Alamat Institusi:_ Alamat surat/kampus.
    - _Sosial Media:_ Link instagram, facebook.
- Anda akan melihat Form `Value` bertipe _Textarea_ yang bisa diedit sesuai deskripsi di sampingnya. Begitu Anda ubah isinya lalu klik **Save**, komponen teks atau gambar di Footer dan Header front-end akan ikut berubah secara Real-time.

---

### ⚠️ TROUBLESHOOTING (MASALAH UMUM YANG SERING TERJADI)

Buku panduan pelengkap untuk pemecahan masalah:

1. **Email Tidak Terkirim:** Saat mengubah status "Completed", pendaftar mengaku tidak menerima email kelulusan maupun bukti pengumpulan di awal.
   _Solusi:_ Sistem email bergantung pada `.env` (MAIL_MAILER, SMTP, Password aplikasi server). Hubungi Web Developer tim IT untuk mengecek `App/Mail` atau konfigurasi Mail server Anda.
2. **Foto/Dokumen Pendaftar Tidak Tampil (Broken Image) di Admin:**
   _Solusi:_ Ini menandakan Laravel Storage Symbolic Link belum di-generate. Developer perlu menjalankan command `php artisan storage:link` dari folder aplikasi di server hosting (karena file tersimpan di storage/app/public).
3. **Mahasiswa Gagal Upload Berkas (Error: File Too Large):**
   _Solusi:_ File PDF calon mahasiswa terlalu besar. Sampaikan agar mereka men-compress ukurannya dibawah ukuran default sistem PHP (umumnya 2MB - 10MB).
4. **Lupa Password Admin:**
   _Solusi:_ Admin bisa me-reset password di Database `users` langsung oleh Server Master (IT) atau menggunakan form fitur 'Forgot Password' di panel jika tombol tersebut telah diaktifkan di konfigurasi Filament Auth.
