<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PMB STBA Pontianak</title>
    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
                        <p class="text-muted mb-1">Belum punya akun? Silakan <a href="{{ route('register') }}"
                                class="text-decoration-none fw-bold" style="color: var(--primary-maroon);">Daftar</a>
                        </p>
                        <h2 class="fw-bold fs-2" style="color: #333;">Login ke Akun</h2>
                        <p class="text-muted small">Masuk untuk mengakses formulir pendaftaran.</p>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success small mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                placeholder="email@domain.com" required autofocus>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label class="form-label fw-bold small">Password</label>
                            </div>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Masukkan password"
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

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                <label class="form-check-label small" for="remember_me">
                                    Ingat saya
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="small text-decoration-none text-muted">Lupa Password?</a>
                            @endif
                        </div>

                        {{-- Google reCAPTCHA v2 --}}
                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            @error('g-recaptcha-response')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-maroon shadow-sm mb-4">
                            Masuk
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Panel: Image -->
            <div class="col-lg-7 d-none d-lg-block right-panel">
            </div>
        </div>
    </div>

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
