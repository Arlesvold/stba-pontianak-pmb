# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**STBA Pontianak** is a Laravel-based web application for managing student admissions (PMB - Penerimaan Mahasiswa Baru) and general information for STBA Pontianak institution. It features a public-facing website and an admin dashboard powered by Filament v4.

- **Framework**: Laravel 12
- **Admin Panel**: Filament 4.0
- **Frontend**: Blade templates with Alpine.js + Tailwind CSS + Vite
- **Database**: MySQL
- **Authentication**: Laravel Breeze (students) + Spatie Permission (admin role-based access)
- **PHP Version**: 8.3 (via Laravel Herd)

## Development Commands

```bash
# Setup (first time)
composer run setup
# Installs deps, creates .env, generates key, runs migrations, installs npm

# Development Server (runs all concurrently with hot reload)
composer run dev
# Starts: php artisan serve (port 8000), queue listener, logs (pail), Vite HMR

# Running Tests
composer run test
# Clears config cache, runs Pest tests

# Code Quality
php artisan pint                      # Format code (Laravel standard)
php artisan test --parallel           # Run tests in parallel

# Database
php artisan migrate                   # Run pending migrations
php artisan migrate:reset             # Rollback all (dev only)
php artisan tinker                    # Interactive REPL

# Artisan Utilities
php artisan queue:listen              # Process queued jobs
php artisan pail --timeout=0          # Stream logs in real-time
php artisan filament:upgrade          # Upgrade Filament packages
```

## Architecture & Data Model

### Two Auth Guards

The app has **two separate authentication systems**:
- `web` guard — students registering for PMB via Breeze (`/login`, `/register`)
- `admin` guard — admin users accessing Filament (`/admin`); configured in `AdminPanelProvider`

A user needs the `admin` Spatie role to pass `canAccessPanel()` on the User model. `UserResource` queries only users with the `admin` role (`whereHas('roles', ...)`).

### Core Models

**Registration (PMB workflow)**
- `user_id` (FK) → Users: cascade delete
- Personal: nama_lengkap, nik, tanggal_lahir, jenis_kelamin, email, no_hp, alamat
- Academic: program_studi, sistem_kuliah, sekolah_asal, jurusan_sekolah, tahun_lulus
- Documents: ijazah_path, kk_path, transkrip_path, foto_path (stored in `storage/app/public/`)
- Workflow: `step` (1=form filled, 2=uploaded docs, 3=completed), `status` (pending/proses/selesai), feedback

**ProgramStudi** — Manages content for `/prodi/d3` and `/prodi/s1` pages
- Queried by `kode` field ('d3', 's1')
- JSON-cast columns: `misi`, `tujuan`, `peminatan`, `karir_list` (stored as JSON arrays)
- Non-JSON: kode, nama, jenjang, deskripsi, visi, kurikulum, kurikulum_pdf_url, karir_deskripsi

**Setting** — Key-value store with a static API
- `Setting::get($key, $default)` — priority: DB → `env($key)` → default; cached 1 hour per key
- `Setting::set($key, $value)` — wraps in DB transaction, clears `"setting.{$key}"` cache
- After bulk setting saves (e.g., in `PengaturanUmum`), cache keys are forgotten manually

**Pengumuman** — Scrolling marquee announcements (separate from Setting/Marquee models)
- Fields: teks, urutan, aktif; managed via `PengumumanResource` with drag-to-reorder

**Content Models** (simple CRUD):
- **Berita**: judul, slug, isi, tanggal, gambar
- **Agenda**: judul, tanggal_mulai, tanggal_selesai, deskripsi
- **Event**: judul, slug, gambar, deskripsi_singkat, deskripsi, tanggal_mulai, tanggal_selesai, lokasi
- **Staf**: nama, foto, posisi, display_order, status_aktif (boolean)
- **Dokumen**: judul, file, deskripsi
- **Kontak**: nama, tugas, nomor_hp, email, hari_layanan, jam_layanan, icon, urutan, aktif

All date fields use Laravel date casting (e.g., `'tanggal' => 'date'`).

### PMB Registration Flow

1. Student registers via `/register` (Breeze)
2. Fills `/pmb/daftar` form → `step` becomes 2
3. Uploads docs at `/pmb/unggah-dokumen` → `step` becomes 3
4. Views status at `/pmb/verifikasi-tes` (shows WA admin button; WA number from `Setting::get('wa_admin')`)
5. Admin reviews in Filament → edits `status` & `feedback`
6. Emails sent: `PmbSubmissionMail` (on submission), `PmbCompletedMail` (when marked selesai)

## Admin Panel (Filament 4)

Accessible at `/admin` (requires `admin` Spatie role). Resources and Pages are auto-discovered.

### Navigation Groups

**Sistem PMB**
- `RegistrationResource` — view/edit registrations; nav badge shows pending count

**Website Profile**
- `BeritaResource`, `AgendaResource`, `EventResource`, `StafResource`, `KontakResource`, `DokumenResource`
- `ProgramStudiResource` — edit rich content (vision/mission/curriculum/careers) for D3 and S1 pages

**Pengaturan**
- `PengumumanResource` — manage scrolling marquee announcements
- `SettingResource` — raw key-value setting editor
- `PengaturanUmum` (custom Page) — hero image/text, CTA, login image, WA admin, navbar portal links
- `Integrasi` (custom Page) — Fonnte WhatsApp API token + Google reCAPTCHA keys (stored in Setting table, with DB-over-env override)

**No group**
- `UserResource` — manage admin users (only shows users with `admin` role)

### Filament v4 Patterns

Forms use `Schema` (not `Form`), tables use `Table`. Resource actions are `recordActions` / `toolbarActions` (not `actions` / `bulkActions`).

`RegistrationResource` edit form only exposes `status` + `feedback` — all other fields are read-only via `infolist()` tabs (Biodata / Data Akademik / Berkas Dokumen).

Custom pages (`PengaturanUmum`, `Integrasi`) implement their own `form(Schema $schema)` + `save()` method + `getHeaderActions()` with a save action button.

## Routes & Controllers

**Public routes** (no auth):
- `/` — homepage: 6 latest news, 4 upcoming events (tanggal_selesai ≥ today), 6 agendas, 4 active staff; hero settings cached 1 hour
- `/berita`, `/berita/{berita}`, `/agenda`, `/events`, `/events/{event}`, `/staf`, `/dokumen`, `/kontak`
- `/prodi/d3`, `/prodi/s1` — fetch `ProgramStudi` by `kode`; `/prodi/sastra` uses a static view

**PMB routes** (auth middleware):
- `GET/POST /pmb/daftar` — `PendaftaranController`
- `GET/POST /pmb/unggah-dokumen` — `UnggahDokumenController`
- `GET /pmb/verifikasi-tes` — inline closure, reads `wa_admin` from Setting

**Profile** (auth): `/profile` edit/update/delete via `ProfileController`

## Database Setup

- **MySQL**: `DB_DATABASE=sql_stbapontianak_ac_id`
- **Session**: database driver
- **Cache**: database driver (note: settings use `Cache::remember` with 1-hour TTL)
- **Queue**: database driver

## File Uploads

Files uploaded at `/pmb/unggah-dokumen` are stored in `storage/app/public/`. Run `php artisan storage:link` if symlink is missing. Paths saved as relative paths (e.g., `registrations/foto/...`); rendered via `Storage::url($path)`.

Settings images (hero, cta, login) are uploaded via Filament `FileUpload` to `storage/app/public/settings/`.

## Environment Configuration

Key `.env` variables beyond standard Laravel:
- `APP_TIMEZONE=Asia/Jakarta`
- `FONNTE_API_TOKEN` — WhatsApp notifications via Fonnte (can be overridden in DB via Integrasi page)
- `RECAPTCHA_SITE_KEY`, `RECAPTCHA_SECRET_KEY` — Google reCAPTCHA v2 (can be overridden in DB)
