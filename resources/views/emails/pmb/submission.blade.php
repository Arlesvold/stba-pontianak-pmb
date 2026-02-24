<x-mail::message>
    # Halo, {{ $registration->nama_lengkap }}

    Terima kasih telah melakukan pendaftaran di **STBA Pontianak**.
    Dokumen Anda telah kami terima dan saat ini sedang dalam proses verifikasi.

    ### Detail Pendaftaran:
    - **Nama:** {{ $registration->nama_lengkap }}
    - **NIK:** {{ $registration->nik }}
    - **Program Studi:** {{ $registration->program_studi }}
    - **Sistem Kuliah:** {{ $registration->sistem_kuliah }}
    - **No. HP (WA):** {{ $registration->no_hp }}

    Silakan pantau status pendaftaran Anda melalui dashboard PMB secara berkala.
    Kami juga akan menghubungi Anda melalui WhatsApp jika ada informasi lebih lanjut.

    <x-mail::button :url="route('login')">
        Cek Status Pendaftaran
    </x-mail::button>

    Terima kasih,<br>
    Panitia PMB {{ config('app.name') }}
</x-mail::message>
