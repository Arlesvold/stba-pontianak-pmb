<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PmbSubmissionMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public Registration $registration
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Pendaftaran PMB STBA Pontianak - ' . $this->registration->nama_lengkap,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.pmb.submission',
            with: [
                'registration' => $this->registration,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
