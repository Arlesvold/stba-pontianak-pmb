<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesi Berakhir - STBA Pontianak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-card {
            max-width: 480px;
            width: 100%;
        }

        .btn-maroon {
            background-color: #7b1e30;
            color: #fff;
            border: 1px solid #7b1e30;
        }

        .btn-maroon:hover {
            background-color: #5a1423;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="error-card text-center p-5">
        <div class="mb-4">
            <i class="bi bi-clock-history text-warning" style="font-size: 4rem;"></i>
        </div>
        <h2 class="fw-bold mb-3">Sesi Telah Berakhir</h2>
        <p class="text-muted mb-4">
            Halaman ini sudah kedaluwarsa karena sesi Anda telah berakhir atau tidak aktif terlalu lama.
            Silakan muat ulang halaman dan coba lagi.
        </p>
        <div class="d-flex gap-2 justify-content-center">
            <a href="{{ url()->previous() }}" class="btn btn-maroon px-4">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary px-4">
                <i class="bi bi-house me-1"></i> Beranda
            </a>
        </div>
    </div>
</body>

</html>
