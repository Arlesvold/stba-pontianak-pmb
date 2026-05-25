<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PMB STBA Pontianak</title>

    {{-- Bootstrap 5 --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/pages/auth_login.css') }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400;1,9..144,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://www.google.com">
    <link rel="preconnect" href="https://www.gstatic.com" crossorigin>
    <style>
        :root {
            --paper: #faf5ec; --paper-2: #f3e9d4; --paper-warm: #fdfaf3;
            --ink: #1a1614; --ink-2: #3a322c; --muted: #7a6e62;
            --maroon: #7b1e30; --maroon-deep: #5a1423; --maroon-soft: rgba(123,30,48,0.08); --maroon-tint: rgba(123,30,48,0.15);
            --gold-soft: #d6b66a; --rule: #d9c9a8; --rule-soft: #e6d9b9;
            --font-display: 'Fraunces', Georgia, serif;
            --font-body: 'Plus Jakarta Sans', system-ui, sans-serif;
            --font-mono: 'JetBrains Mono', ui-monospace, monospace;
            --primary-maroon: #7b1e30;
        }
        body { font-family: var(--font-body); background: var(--paper); }
        h1, h2, h3, h4, h5 { font-family: var(--font-display); }
        .btn-maroon { background: var(--maroon); border-color: var(--maroon); color: var(--paper); border-radius: 0; font-family: var(--font-body); font-weight: 600; }
        .btn-maroon:hover { background: var(--maroon-deep); border-color: var(--maroon-deep); color: var(--paper); }
        .form-control, .input-group-text { border-color: var(--rule); border-radius: 0 !important; font-family: var(--font-body); }
        .form-control:focus { border-color: var(--maroon); box-shadow: 0 0 0 2px var(--maroon-soft); }
        .left-panel { background: var(--paper) !important; }
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
                        <a href="{{ url('/') }}"
                            class="link-back text-decoration-none small text-muted d-inline-block mb-3">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
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
                            <div class="g-recaptcha"
                                data-sitekey="{{ \App\Models\Setting::get('RECAPTCHA_SITE_KEY') }}"></div>
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
            @php
                $loginImg = cache()->remember('login_image', 3600, fn () =>
                    \App\Models\Setting::where('key', 'login_image')->value('value')
                );
                $loginBg = $loginImg ? asset('storage/' . $loginImg) : asset('images/hero1.webp');
            @endphp
            <div class="col-lg-7 d-none d-lg-block right-panel"
                style="background-image: url('{{ $loginBg }}');">
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

        window.addEventListener("load", function() {
            const script = document.createElement("script");
            script.src = "https://www.google.com/recaptcha/api.js";
            script.async = true;
            script.defer = true;
            document.body.appendChild(script);
        });
    </script>
</body>

</html>
