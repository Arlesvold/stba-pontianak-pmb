<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran PMB Selesai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #800000;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .content {
            background-color: #f9fafb;
            padding: 30px;
            border: 1px solid #e5e7eb;
        }

        .success-box {
            background-color: #d1fae5;
            padding: 20px;
            border-left: 4px solid #10b981;
            margin: 20px 0;
            color: #065f46;
        }

        .detail-box {
            background-color: white;
            padding: 20px;
            border-left: 4px solid #800000;
            margin: 20px 0;
        }

        .detail-box h3 {
            margin-top: 0;
            color: #800000;
        }

        .detail-item {
            margin: 10px 0;
            padding: 8px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: bold;
            color: #4b5563;
        }

        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #800000;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            border: 2px solid #800000;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>STBA Pontianak</h1>
    </div>

    <div class="content">
        <h2>Halo, {{ $registration->nama_lengkap }}</h2>

        <div class="success-box">
            <strong>Selamat!</strong> Pendaftaran Anda di STBA Pontianak telah selesai dan berkas Anda dinyatakan valid.
        </div>

        <p>Terima kasih telah menyelesaikan seluruh tahapan pendaftaran. Berikut adalah detail pendaftaran Anda:</p>

        <div class="detail-box">
            <h3>Detail Pendaftaran</h3>
            <div class="detail-item">
                <span class="detail-label">Nama:</span> {{ $registration->nama_lengkap }}
            </div>
            <div class="detail-item">
                <span class="detail-label">NIK:</span> {{ $registration->nik }}
            </div>
            <div class="detail-item">
                <span class="detail-label">Program Studi:</span> {{ $registration->program_studi }}
            </div>
            <div class="detail-item">
                <span class="detail-label">Sistem Kuliah:</span> {{ $registration->sistem_kuliah }}
            </div>
        </div>

        <p>Silakan tunggu informasi selanjutnya dari panitia PMB melalui WhatsApp terkait langkah berikutnya.</p>

        <center>
            <a href="{{ route('login') }}" class="button">Masuk ke Dashboard</a>
        </center>

        <div class="footer">
            <p>
                Terima kasih,<br>
                <strong>Panitia PMB {{ config('app.name') }}</strong>
            </p>
        </div>
    </div>
</body>

</html>
