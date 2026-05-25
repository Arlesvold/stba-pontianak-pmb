# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**STBA Pontianak** is a Laravel-based web application for managing student admissions (PMB - Penerimaan Mahasiswa Baru) and general information for STBA Pontianak institution. It features a public-facing website and an admin dashboard powered by Filament v4.

- **Framework**: Laravel 12
- **Admin Panel**: Filament 4.0
- **Frontend**: Blade templates with Alpine.js + Tailwind CSS + Vite
- **Database**: MySQL
- **Authentication**: Laravel Breeze + Spatie Permission (role-based access control)
- **PHP Version**: 8.3 (via Laravel Herd)

## Key Technologies

- **Filament v4**: Modern admin panel framework for resource management and dashboard widgets
- **Spatie Laravel Permission**: Role-based access control (users must have `admin` role to access Filament)
- **Intervention Image**: Image processing (resizing, manipulation)
- **Guzzle HTTP**: HTTP client for external requests
- **Pest**: Testing framework (installed but no tests yet)
- **Laravel Pint**: Code formatting
- **Vite**: Frontend asset bundling with hot reload

## Architecture & Data Model

### Core Models & Relationships

The application manages multiple content types through Eloquent models:

**Registration (PMB System)**
- `user_id` (FK) → Users: Many registrations per user, cascade delete
- Personal data: nama_lengkap, nik, tanggal_lahir, jenis_kelamin, email, no_hp, alamat
- Academic info: program_studi, sistem_kuliah, sekolah_asal, jurusan_sekolah, tahun_lulus
- Document uploads: ijazah_path, kk_path (kartu keluarga), transkrip_path, foto_path
- Workflow: `step` (1=form filled, 2=admin review, 3=completed), `status` (pending/proses/selesai), feedback
- Recent: kk_path and transkrip_path added 2026-05-25 (was just ijazah + foto)

**User**
- Authenticatable with Laravel Breeze
- Spatie HasRoles trait for role-based access
- `canAccessPanel()` checks: must have 'admin' role to access Filament
- Fillable: name, email, no_hp, password

**Content Models** (all simple, managed via Filament CRUD):
- **Berita** (News): judul, slug, isi, tanggal, gambar
- **Agenda** (Events/Schedules): judul, tanggal_mulai, tanggal_selesai, deskripsi
- **Event**: judul, slug, gambar, deskripsi_singkat, deskripsi, tanggal_mulai, tanggal_selesai, lokasi
- **Staf** (Staff/Lecturers): nama, foto, posisi, display_order, status_aktif (boolean)
- **Dokumen**: judul, file, deskripsi
- **Kontak** (Contact Info): nama, tugas, nomor_hp, email, hari_layanan, jam_layanan, icon, urutan, aktif
- **Setting**: key-value store for app settings (marquee text, etc.)

All date fields use Laravel date casting (e.g., `'tanggal' => 'date'`).

### User Flow: PMB Registration

1. User registers via `/register` (Laravel Breeze auth)
2. Fills `/pmb/daftar` form (Step 1 → step becomes 2)
3. Uploads documents at `/pmb/unggah-dokumen` (Step 2 → step becomes 3)
4. Sees verification summary at `/pmb/verifikasi-tes`
5. Admin reviews in Filament at `/admin/registrations/` → edits status & feedback
6. User receives email notifications (PmbSubmissionMail, PmbCompletedMail)

## Routes & Controllers

### Public Routes (web.php)

**Homepage & Info**:
- `/` - Shows 6 latest news, 4 upcoming events, 6 latest agendas, 4 active staff
- `/pmb/informasi` - PMB information page
- `/prodi/d3`, `/prodi/s1`, `/prodi/sastra` - Program pages

**Content Display**:
- `/berita` (list, paginated 6/page), `/berita/{berita}` (detail)
- `/agenda` (list, paginated 6/page)
- `/events` (list), `/events/{event}` (detail) - only shows non-expired events
- `/dokumen` (list)
- `/staf` (list, paginated 12/page) - only active staff
- `/kontak` - contact information

**PMB Registration** (auth required):
- `GET /pmb/daftar` - form display
- `POST /pmb/daftar` - store registration step 1
- `GET /pmb/unggah-dokumen` - document upload form
- `POST /pmb/unggah-dokumen` - store documents
- `GET /pmb/verifikasi-tes` - registration verification page

**Profile** (auth required):
- `/profile` (edit, update, delete)

### Admin Panel (Filament 4)

Accessible at `/admin/dashboard` (requires 'admin' role). Auto-discovers Resources and Pages in `app/Filament/`.

**Resources** (full CRUD via Filament):
- RegistrationResource - view, edit registrations; filters by status & program_studi
- BeritaResource - manage news
- AgendaResource - manage schedules
- EventResource - manage events
- StafResource - manage staff with display ordering
- SettingResource - manage app settings
- KontakResource - manage contact info
- DokumenResource - manage documents

**Widgets**:
- RegistrationChart - chart visualization
- StatsOverview - dashboard stats
- LatestRegistrations - recent registrations

**Custom Controllers**:
- `Admin/BeritaController`, `Admin/AgendaController`, `Admin/SettingController` (marquee editing)

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
php artisan test --parallel           # Run tests in parallel (requires Pest)

# Database
php artisan migrate                   # Run pending migrations
php artisan migrate:reset             # Rollback all (dev only)
php artisan tinker                    # Interactive REPL

# Artisan Utilities
php artisan queue:listen              # Process queued jobs
php artisan pail --timeout=0          # Stream logs in real-time
php artisan filament:upgrade          # Upgrade Filament packages
```

## File Structure

**Key directories**:
- `app/Models/` - Eloquent models (Registration, Berita, Agenda, Event, Staf, Dokumen, Kontak, Setting, User)
- `app/Http/Controllers/` - Page controllers split by domain (Admin/, Pmb/, Auth/)
- `app/Filament/Resources/` - Admin panel CRUD resources (one per model)
- `app/Filament/Widgets/` - Dashboard widgets
- `app/Providers/` - Service providers (AppServiceProvider, Filament/AdminPanelProvider)
- `routes/web.php` - All web routes (auth.php for Breeze routes)
- `database/migrations/` - Schema definitions
- `resources/views/` - Blade templates organized by feature (pmb/, berita/, agenda/, staf/, etc.)
- `config/` - Laravel config (database.php, mail.php, permission.php, etc.)

## Database Setup

**MySQL** connection expected (see .env.example):
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=sql_stbapontianak_ac_id
- DB_USERNAME/PASSWORD configured

**Session**: Stored in database (SESSION_DRIVER=database)
**Cache**: Database-backed (CACHE_STORE=database)
**Queue**: Database jobs (QUEUE_CONNECTION=database)

## Notable Patterns & Implementation Details

### Filament Resource Structure
Resources use newer Filament v4 pattern with `Schema` (forms) and `Table` (columns/filters):
- RegistrationResource: displays placeholders (read-only display), editable status/feedback section, sectioned layout (Personal/Academic/Documents/System info)
- Infolist with tabs for view page (Biodata, Academic, Documents)
- Filters by status and dynamic program_studi dropdown

### Email Notifications
- `PmbSubmissionMail` - sent on registration submission
- `PmbCompletedMail` - sent when admin marks registration complete
- Configured for Gmail SMTP (see .env)

### File Uploads
- Stored in `storage/app/public/` (uploaded at `/pmb/unggah-dokumen`)
- Paths stored in Registration model: ijazah_path, kk_path, transkrip_path, foto_path
- Accessible via `Storage::url()` in Filament views

### Homepage Logic
- **Events**: Only shows future events (`tanggal_selesai >= now()->startOfDay()`)
- **News/Agenda**: No filter, shows by date descending
- **Staff**: Only active staff (`status_aktif = true`)

### Authentication
- Breeze provides login/register views
- AdminPanelProvider uses `authGuard('admin')` and checks `canAccessPanel()` on User model
- Spatie Permission manages roles; users need 'admin' role to access `/admin`

### Image Handling
- Intervention Image used for uploads (resizing, validation)
- Models like Berita, Staf, Event support image fields

## Environment Configuration

See `.env.example` for full reference. Key variables:
- `APP_NAME`, `APP_URL`, `APP_TIMEZONE=Asia/Jakarta`
- Database credentials (MySQL)
- Mail config (Gmail SMTP)
- `FONNTE_API_TOKEN` - likely for SMS (Fonnte)
- `RECAPTCHA_SITE_KEY`, `RECAPTCHA_SECRET_KEY` - for form protection

## Git & Version Control

Latest migration: `2026_05_25_154220_add_kk_and_transkrip_to_registrations_table.php` (adds kk_path, transkrip_path to registrations).

All timestamps use `tanggal*` (Indonesian) naming convention.
