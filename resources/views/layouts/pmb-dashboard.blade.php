<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Calon Mahasiswa - STBA Pontianak</title>
    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-maroon: #7b1e30;
            --primary-maroon-dark: #5a1423;
            --sidebar-width: 280px;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f3f4f6;
            overflow-x: hidden;
        }

        .text-maroon {
            color: var(--primary-maroon) !important;
        }

        .bg-maroon {
            background-color: var(--primary-maroon) !important;
        }

        .btn-maroon {
            background-color: var(--primary-maroon);
            color: #fff;
            border: 1px solid var(--primary-maroon);
        }

        .btn-maroon:hover {
            background-color: var(--primary-maroon-dark);
            color: #fff;
            border-color: var(--primary-maroon-dark);
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #fff;
            border-right: 1px solid #e5e7eb;
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar-header {
            height: 70px;
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .nav-link {
            color: #4b5563;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 4px solid transparent;
            transition: all 0.2s;
        }

        .nav-link:hover {
            background-color: #f9fafb;
            color: var(--primary-maroon);
        }

        .nav-link.active {
            background-color: #fff1f2;
            color: var(--primary-maroon);
            border-left-color: var(--primary-maroon);
        }

        .nav-link i {
            font-size: 1.25rem;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin-left 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
        }

        /* Top Bar Styles */
        .topbar {
            height: 70px;
            background-color: #fff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .user-menu {
            cursor: pointer;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border-radius: 8px;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background-color: #f3f4f6;
        }

        .dropdown-item.text-danger:hover {
            background-color: #fef2f2;
        }

        /* Progress Steps in Navbar */
        .step-indicator {
            display: flex;
            align-items: center;
        }

        .step-item {
            display: flex;
            align-items: center;
            position: relative;
        }

        .step-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
            transition: all 0.3s;
            z-index: 2;
        }

        .step-label {
            font-size: 14px;
            font-weight: 600;
            margin-left: 8px;
            white-space: nowrap;
        }

        .step-line {
            height: 2px;
            width: 40px;
            background-color: #e5e7eb;
            margin: 0 10px;
        }

        /* Active State */
        .step-active .step-circle {
            background-color: #fff;
            border: 2px solid var(--primary-maroon);
            color: var(--primary-maroon);
            box-shadow: 0 0 0 4px rgba(123, 30, 48, 0.1);
        }

        .step-active .step-label {
            color: var(--primary-maroon);
        }

        /* Completed State */
        .step-completed .step-circle {
            background-color: var(--primary-maroon);
            color: #fff;
            border: 2px solid var(--primary-maroon);
        }

        .step-completed .step-label {
            color: var(--primary-maroon);
        }

        .step-completed+.step-line {
            background-color: var(--primary-maroon);
        }

        /* Inactive State */
        .step-inactive .step-circle {
            background-color: #f3f4f6;
            color: #9ca3af;
            border: 2px solid #e5e7eb;
        }

        .step-inactive .step-label {
            color: #9ca3af;
        }

        /* Mobile Responsive */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }

            .sidebar-overlay.show {
                display: block;
            }
        }
    </style>
</head>

<body>
    {{-- Mobile Overlay --}}
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    {{-- Sidebar --}}
    <aside class="sidebar d-flex flex-column" id="sidebar">
        <div class="sidebar-header">
            {{-- Logo --}}
            <div class="d-flex align-items-center gap-2">
                <div class="rounded bg-danger d-flex align-items-center justify-content-center text-white fw-bold"
                    style="width: 36px; height: 36px; background-color: var(--primary-maroon) !important;">
                    S
                </div>
                <div class="lh-1">
                    <div class="fw-bold text-dark">STBA Pontianak</div>
                    <div class="small text-muted" style="font-size: 0.75rem;">PMB Online</div>
                </div>
            </div>
            <button class="btn btn-link text-dark ms-auto d-lg-none" id="closeSidebar">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <nav class="nav flex-column mt-3 flex-grow-1">
            <div class="px-3 mb-2">
                <small class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Langkah Pendaftaran</small>
            </div>

            <a href="{{ route('pmb.daftar') }}" class="nav-link {{ request()->routeIs('pmb.daftar') ? 'active' : '' }}">
                <i class="bi bi-1-circle-fill"></i>
                Isi Formulir
            </a>

            <a href="{{ route('pmb.unggah-dokumen') }}"
                class="nav-link {{ request()->routeIs('pmb.unggah-dokumen') ? 'active' : '' }}">
                <i class="bi bi-2-circle-fill"></i>
                Unggah Dokumen
            </a>

            <a href="{{ route('pmb.verifikasi-tes') }}"
                class="nav-link {{ request()->routeIs('pmb.verifikasi-tes') ? 'active' : '' }}">
                <i class="bi bi-3-circle-fill"></i>
                Verifikasi & Tes
            </a>

            <hr class="mx-3 my-3">

            <a href="{{ url('/') }}" class="nav-link">
                <i class="bi bi-house-door"></i>
                Halaman Utama
            </a>
        </nav>

        <div class="p-4 border-top">
            <div class="small text-muted text-center">
                &copy; {{ date('Y') }} STBA Pontianak
            </div>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="main-content">
        {{-- Topbar --}}
        <header class="topbar">
            <button class="btn btn-light d-lg-none" id="openSidebar">
                <i class="bi bi-list fs-4"></i>
            </button>

            {{-- Progress Steps (Desktop) --}}
            <div class="d-none d-lg-flex mx-auto">
                <div class="step-indicator">
                    {{-- Step 1 --}}
                    @php
                        $isStep1Active = request()->routeIs('pmb.daftar');
                        $isStep1Done =
                            request()->routeIs('pmb.unggah-dokumen') || request()->routeIs('pmb.verifikasi-tes');
                        $step1Class = $isStep1Done
                            ? 'step-completed'
                            : ($isStep1Active
                                ? 'step-active'
                                : 'step-inactive');
                        $step1Icon = $isStep1Done ? '<i class="bi bi-check-lg"></i>' : '1';
                    @endphp
                    <div class="step-item {{ $step1Class }}">
                        <div class="step-circle">{!! $step1Icon !!}</div>
                        <div class="step-label">Isi Formulir</div>
                    </div>

                    <div class="step-line {{ $isStep1Done ? 'bg-maroon' : '' }}"></div>

                    {{-- Step 2 --}}
                    @php
                        $isStep2Active = request()->routeIs('pmb.unggah-dokumen');
                        $isStep2Done = request()->routeIs('pmb.verifikasi-tes');
                        $step2Class = $isStep2Done
                            ? 'step-completed'
                            : ($isStep2Active
                                ? 'step-active'
                                : 'step-inactive');
                        $step2Icon = $isStep2Done ? '<i class="bi bi-check-lg"></i>' : '2';
                    @endphp
                    <div class="step-item {{ $step2Class }}">
                        <div class="step-circle">{!! $step2Icon !!}</div>
                        <div class="step-label">Unggah Dokumen</div>
                    </div>

                    <div class="step-line {{ $isStep2Done ? 'bg-maroon' : '' }}"></div>

                    {{-- Step 3 --}}
                    @php
                        $isStep3Active = request()->routeIs('pmb.verifikasi-tes');
                        $step3Class = $isStep3Active ? 'step-active' : 'step-inactive';
                        // Step 3 is the last step, so assume completed visual when active for better UX or stay active
                    @endphp
                    <div class="step-item {{ $step3Class }}">
                        <div class="step-circle">3</div>
                        <div class="step-label">Verifikasi</div>
                    </div>
                </div>
            </div>

            {{-- Mobile Title (When Steps are hidden) --}}
            <div class="d-lg-none ms-3 me-auto">
                @if (request()->routeIs('pmb.daftar'))
                    <span class="fw-bold text-dark">Langkah 1/3</span>
                @elseif(request()->routeIs('pmb.unggah-dokumen'))
                    <span class="fw-bold text-dark">Langkah 2/3</span>
                @elseif(request()->routeIs('pmb.verifikasi-tes'))
                    <span class="fw-bold text-dark">Langkah 3/3</span>
                @endif
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="dropdown">
                    <div class="d-flex align-items-center gap-2 user-menu" data-bs-toggle="dropdown">
                        <div class="text-end d-none d-sm-block">
                            <div class="fw-bold text-dark small">{{ Auth::user()->name ?? 'Calon Mahasiswa' }}</div>
                            <div class="text-muted small" style="font-size: 0.75rem;">Camaba</div>
                        </div>
                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center border"
                            style="width: 40px; height: 40px; color: var(--primary-maroon);">
                            <i class="bi bi-person-fill fs-5"></i>
                        </div>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end mt-2 animate slideIn">
                        <li><span class="dropdown-header d-sm-none">Halo, {{ Auth::user()->name ?? 'User' }}</span>
                        </li>
                        {{-- <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil Saya</a></li> --}}
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        {{-- Page Content --}}
        <div class="p-4 p-md-5">
            @yield('content')
        </div>
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar Toggle Logic
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const openBtn = document.getElementById('openSidebar');
        const closeBtn = document.getElementById('closeSidebar');

        function toggleSidebar() {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        }

        openBtn.addEventListener('click', toggleSidebar);
        closeBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);
    </script>
    @stack('scripts')
</body>

</html>
