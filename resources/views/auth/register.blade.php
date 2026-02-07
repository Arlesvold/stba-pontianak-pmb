<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran - PMB STBA Pontianak</title>
    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-maroon: #7b1e30;
        }

        body {
            font-family: 'Open Sans', system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
        }

        .auth-container {
            min-height: 100vh;
        }

        .left-panel {
            background-color: #ffffff;
        }

        .right-panel {
            background-image: url("{{ asset('images/hero1.jpg') }}");
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 16px;
            border: 1px solid #dee2e6;
        }

        .form-control:focus {
            border-color: var(--primary-maroon);
            box-shadow: 0 0 0 0.25rem rgba(123, 30, 48, 0.15);
        }

        .btn-maroon {
            background-color: var(--primary-maroon);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            transition: background 0.3s;
        }

        .btn-maroon:hover {
            background-color: #5a1423;
            color: white;
        }

        .input-group-text {
            background: transparent;
            border-left: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0 auth-container">
        <div class="row g-0 h-100 min-vh-100">
            <!-- Left Panel: Form -->
            <div
                class="col-lg-5 col-md-12 d-flex flex-column justify-content-center px-4 px-md-5 py-5 left-panel bg-white">
                <div class="mx-auto w-100" style="max-width: 480px;">
                    <div class="mb-4">
                        <p class="text-muted mb-1">Sudah punya akun? Silakan <a href="{{ route('login') }}"
                                class="text-decoration-none fw-bold" style="color: var(--primary-maroon);">Login</a></p>
                        <h2 class="fw-bold fs-2" style="color: #333;">Daftar Akun Baru</h2>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Nama Lengkap <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="Contoh: Budi Santoso" required autofocus>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                placeholder="email@domain.com" required>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nomor HP -->
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Nomor HP <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"
                                    style="border-radius: 8px 0 0 8px; border-right: 1px solid #dee2e6;">+62</span>
                                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}"
                                    placeholder="81234567890" style="border-radius: 0 8px 8px 0;" required>
                            </div>
                            @error('no_hp')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Minimal 8 karakter"
                                    style="border-radius: 8px 0 0 8px; border-right: none;" required>
                                <span class="input-group-text border-start-0" style="border-radius: 0 8px 8px 0;"
                                    onclick="togglePassword('password', 'icon-pass')">
                                    <i class="bi bi-eye" id="icon-pass"></i>
                                </span>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-4">
                            <label class="form-label fw-bold small">Konfirmasi Password <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Ulangi password"
                                    style="border-radius: 8px 0 0 8px; border-right: none;" required>
                                <span class="input-group-text border-start-0" style="border-radius: 0 8px 8px 0;"
                                    onclick="togglePassword('password_confirmation', 'icon-confirm')">
                                    <i class="bi bi-eye" id="icon-confirm"></i>
                                </span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-maroon shadow-sm mb-4">
                            Daftar Sekarang
                        </button>

                        <div class="position-relative text-center mb-4">
                            <div class="border-bottom position-absolute w-100 top-50"></div>
                            <span class="bg-white px-2 position-relative text-muted small">Atau daftar dengan</span>
                        </div>

                        <button type="button"
                            class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2"
                            style="border-radius: 8px; padding: 10px;">
                            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" width="20"
                                height="20" alt="Google">
                            <span>Daftar dengan Google</span>
                        </button>

                    </form>
                </div>
            </div>

            <!-- Right Panel: Image -->
            <div class="col-lg-7 d-none d-lg-block right-panel">
            </div>
        </div>
    </div>

    {{-- Script toggle password --}}
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            }
        }
    </script>
</body>

</html>
