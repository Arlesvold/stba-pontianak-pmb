# User Manual - Sistem Penerimaan Mahasiswa Baru (PMB) STBA Pontianak

Buku panduan ini ditujukan bagi Pengurus/Admin dari STBA (Penerimaan Mahasiswa Baru) serta calon mahasiswa yang sedang mengurus pendaftaran. Sistem ini dibangun menggunakan Laravel 12 dan Panel Filament v4. Panduan ini dirancang lengkap agar mudah dipahami, serta disusun dengan format bersih agar rapi saat dicetak.

---

## 👥 BAGIAN I: PANDUAN PENGGUNA (USER/CALON MAHASISWA)

Halaman depan (Front-end) adalah antarmuka publik yang digunakan oleh pengunjung dan calon mahasiswa untuk melihat informasi STBA dan melakukan pendaftaran.

### 1. Navigasi Halaman Publik / Informasi Kampus

- **Beranda (Home):** Menampilkan profil ringkas kampus, sambutan, dan pintasan cepat (Quick Links) menuju ke Pendaftaran PMB.
- **Berita & Pengumuman:** Menampilkan timeline berita terkini. Jika sebuah berita diklik, sistem akan menampilkan isi berita secara detail beserta gambarnya. Fitur ini mempermudah pengguna memantau info seperti pembagian kuota mahasiswa atau pengumuman kampus.
- **Event:** Menampilkan kegiatan-kegiatan kampus yang akan atau sedang berlangsung (misal: "Seminar Nasional Mahasiswa Sastra").
- **Agenda:** Kalender seperti timeline pendaftaran, kapan gelombang 1 dibuka, pendaftaran ulang, masa penerimaan berkas, dll.
- **Staf / Kepengurusan:** Pengunjung dapat melihat daftar Dosen, Ketua, Wakil Ketua, dan Staf STBA beserta foto dan jabatan mereka.
- **Unduh Dokumen:** Tersedia halaman di mana pengunjung dapat mengunduh dokumen secara legal berbentuk PDF.
- **Kontak :** Calon mahasiswa dapat mengirimkan masalah kendala pendaftaran atau pertanyaan lewat nomor yang tertera. Pertanyaan akan dijawab oleh staf pelayanan (CS).

### 2. Panduan Melakukan Pendaftaran PMB

1. **Mulai Mendaftar:** Pada halaman beranda, klik tombol **Daftar Sekarang**. Anda akan diarahkan ke form pendaftaran online.
2. **Data Pribadi:** Isikan field wajib seperti: `Nama Lengkap`, `NIK`, `Email`, `Nomor HP/WhatsApp`, alamat, dan `Tanggal Lahir`.
3. **Data Akademik:** Isikan info `Program Studi` yang dipilih, `Sekolah Asal`, serta jurusan sekolah dan tahun kelulusan Anda.
4. **Upload Dokumen Wajib:** Unggah `Pas Foto` terbaru (Format Gambar) dan `Ijazah/SKL` (Format PDF/Gambar) ke kolom yang telah disediakan.
5. **Submit & Selesai:** Klik simpan. Layar akan menampilkan notifikasi **sukses**. Anda juga akan menerima sebuah Email (`PmbSubmissionMail`) berisi ringkasan data sebagai bukti bahwa Anda resmi terdaftar pada database STBA namun berstatus "Pending".
6. **Tunggu Pengumuman:** Jika diverifikasi dan status diubah admin menjadi **Selesai / Lulus**, sistem akan mengirimkan Anda email kelulusan resmi (`PmbCompletedMail`) yang memuat langkah daftar ulang selanjutnya.

---

## 🛠️ BAGIAN II: PANDUAN ADMINISTRATOR (FILAMENT DASHBOARD)

Bagian ini khusus untuk Pengurus / Admin STBA untuk me-manage seluruh data pendaftaran (Admission), mengelola konten Web (CMS - Content Management System), dan mengatur pengaturan dasar institusi. Panel ini dibangun dengan **Filament Dashboard**.

### 1. Cara Login Administrator

1. Buka browser dan pergi ke URL: `https://stbapontianak.ac.id/admin`.
2. Halaman Login Filament akan terbuka. Masukkan **Email** administrator.
3. Masukkan **Password** akun Anda.
4. Klik tombol **Sign in**. Anda akan langsung dibawa ke layar Dashboard Utama.
5. _Catatan:_ Untuk keluar sistem dengan aman, klik profil Anda di ujung menu dan pilih **Sign out**.

---

### 2. MANAJEMEN PENDAFTARAN & MAHASISWA BARU (ADMISSION)

#### A. Menu "Pendaftaran PMB" (Pendaftar Baru/Status Pending)

Menu ini menampung data calon mahasiswa yang mendaftar melalui website. Data yang diverifikasi dilakukan di sini.

- **Cara Akses:** Klik menu **Pendaftaran PMB** di Sidebar kiri.
- **List Pendaftar:** Layar menampilkan tabel berisikan `Nama Lengkap`, `Email`, `No.HP`, `Program Studi`, dan `Status` (biasanya default: "Pending"). Anda bisa mem-filter berdasarkan "Program Studi" atau "Status" di header tabel.
- **Melihat Detail (View):** Klik icon mata (👁️ View) di sebelah tombol edit. Anda dapat memeriksa form pendaftar, membaca rekap data mahasiswa, dan mengepalkan tombol klik pada Foto/Dokumen Ijazah untuk melihat file yang mereka upload.
- **Ubah Status / Evaluasi (Edit):**
    1. Klik icon pensil (✏️ Edit).
    2. Pada _Section "Ubah Status & Feedback"_, Anda bisa mengubah `Status` dari Pending menjadi Dalam Proses, dan Selesai.
    3. Anda juga dapat memberikan `Feedback` (contoh: "Ijazah buram, harap bawa fotokopi ke kampus").
    4. Jika diubah menjadi _Completed_ atau selesai, pendaftar otomatis akan dihapus/dipindahkan dari Pendaftaran PMB ini ke menu Selesai dan email bukti verifikasi otomatis terkirim. Klik **Save Changes**.

#### B. Menu "Selesai" (Data Pendaftar Selesai)

Menu ini berfungsi sebagai Arsip final dari PMB. Mahasiswa yang sukses lolos seleksi dan telah memenuhi syarat akan masuk ke daftar ini.

- **Cara Akses:** Ubah status ke **selesai**.
- **Fungsi Utama:** Ini berguna agar rekapitulasi data rapi, terpisah dari yang sedang diseleksi.

---

### 3. MANAJEMEN KONTEN WEBSITE (CMS)

Semua modul di bawah ini akan memengaruhi konten Publik pada front-end.

#### A. Menu "Berita Kampus"

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
- **Detail Form:** Upload `Foto Staf`. Masukkan `Nama Staf` secara lengkap (beserta gelar misal M.Hum, S.S). Masukkan `Posisi` (contoh: "Ketua Prodi", "Kepala BAK", "Dosen Sastra Inggris"). Simpan. Data akan muncul di halaman direktori Staf di website. Tentukan di tampilan website ingin berada di urutan berapa lewat field `Urutan Tampil`. Atur juga Staf/dosen tersebut ingin ditampilkan di website atau tidak (hide) lewat toggle status.

#### B. Menu "Upload Dokumen" (Unduhan Publik)

Pusat file manager untuk publik.

- **Tambah Baru:** Klik **Upload Dokumen** > **+ New Dokumen**.
- **Detail Form:** Isi `Judul` Dokumen (misal: "Brosur Biaya PMB 2026"). Pada kolom `File`, unggah dokumen berbentuk PDF, Word, atau Excel.
- Maksimal ukuran sangat bergantung pada panduan (sekitar 20MB). Begitu disimpan dengan klik **Create**, publik bisa menekan dan men-download file Anda.

#### C. Menu "Kontak" (Layanan Pengaduan)

Digunakan untuk memasukkan kontak (CS).

- **Tambah Baru:** Klik **New Kontak**. Isi field yang ada, `Nama Lengkap`, `Nomor HP`, `Email`,`Tugas`, `Hari Layanan`, `Jam Layanan (WIB)`.
- Disimpan dengan klik **Create**, anda juga bisa mengatur apakah kontak tersebut ingin ditampilkan di website atau tidak lewat toggle status.

#### D. Menu "Marquee" (Teks Berjalan)

Untuk memasukkan teks berjalan dibagian atas website.

- **Tambah Baru:** Klik **New Setting**. Isi teks marquee.
- Disimpan dengan klik **Create**, maka teks yang dimasukan akan langsung ditampilkan dibagian atas website.

---

### 5. PENGATURAN SISTEM & HAK AKSES

Menu ini dikhususkan untuk manajemen konfigurasi tingkat lanjut dan keamanan akun (dibatasi hanya untuk Super Admin).

#### A. Menu "Role" (Hak Akses Pengguna)

Digunakan untuk mengatur tingkat kewenangan / hak akses bagi setiap pengguna yang login ke Dashboard Administrator. Terdapat 2 tingkat peran utama:

- **Super Admin:** Memiliki hak akses penuh (Full Access) terhadap seluruh menu di sistem. Super Admin dapat mengelola, melihat, mengubah, dan menghapus seluruh modul, termasuk menambah user baru serta mengelola layanan Integrasi.
- **Admin PMB:** Memiliki hak akses operasional yang difokuskan pada manajemen pendaftaran (Admission). Admin PMB utamanya dapat mengevaluasi data calon pendaftar, mengubah status, mengelola data siswa dengan status "selesai" dan mengelola konten informasi di website (Agenda, Kontak).
- **Cara Penggunaan:** Melalui menu Role, Anda dapat mengelola penugasan (assign) pengguna ke peran yang tepat (_Super Admin_ atau _Admin PMB_) dan menjaga agar area sensitif pada panel tidak diakses oleh pihak yang tidak berwenang.

#### B. Menu "Integrasi" (Manajemen Token)

Berfungsi sebagai konfigurasi jembatan koneksi sistem untuk menghubungkan website PMB STBA dengan layanan aplikasi pihak ketiga. Dua layanan utama di sistem ini adalah **WhatsApp API Gateway (Fonnte)** untuk notifikasi berbalas otomatis ketika ada pendaftar baru, dan **Google reCAPTCHA** untuk mengamankan form pendaftaran dari serangan bot/spam.

- **Manajemen Kredensial & Token:** Di menu ini, admin menyimpan atau mengelola "API Token" dan "Site/Secret Key" yang didapatkan dari penyedia layanan luar agar fungsionalitas pengiriman pesan dan pengamanan form dapat berjalan di web STBA.
- **Cara Mendapatkan Token Fonnte (WhatsApp API):**
    1. Kunjungi website dan login di [Fonnte.com](https://fonnte.com/).
    2. Pada menu **Device**, hubungkan nomor WhatsApp resmi STBA (CS Pendaftaran) dengan memindai/scan QR Code.
    3. Setelah status perangkat (device) _Connected/Online_, masuk ke menu **API** pada dashboard Fonnte.
    4. Salin (Copy) kode **Token** yang tersedia.
    5. Kembali ke dashboard STBA (Menu **Integrasi**), perbarui pengaturan integrasi WhatsApp, dan tempel (Paste) _Token API_ tersebut.
- **Cara Mendapatkan Kunci Google reCAPTCHA:**
    1. Kunjungi [Google reCAPTCHA Admin Console](https://www.google.com/recaptcha/admin) dan login menggunakan akun Google/Gmail dari STBA.
    2. Daftarkan situs baru dengan menekan tombol **+ (Create)**. Masukkan label contoh: "PMB STBA", dan pilih tipe reCAPTCHA (misal: reCAPTCHA v2 -> "I'm not a robot" Checkbox).
    3. Pada kolom Domains, tambahkan domain website: `stbapontianak.ac.id`.
    4. Centang persetujuan _Terms of Service_ lalu **Submit**.
    5. Anda akan mendapatkan **Site Key** dan **Secret Key**.
    6. Salin (Copy) kedua kunci ini, kemudian paste secara berurutan pada kotak konfigurasi reCAPTCHA di menu **Integrasi** sistem STBA.

---

### ⚠️ TROUBLESHOOTING (MASALAH UMUM YANG SERING TERJADI)

Buku panduan pelengkap untuk pemecahan masalah:

1. **Mahasiswa Gagal Upload Berkas (Error: File Too Large):**
   _Solusi:_ File PDF calon mahasiswa terlalu besar. Sampaikan agar mereka men-compress ukurannya dibawah ukuran default sistem PHP (umumnya dibawah 20MB).
