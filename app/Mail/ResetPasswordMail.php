<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $resetUrl;
    public $organization;

    public function __construct(string $resetUrl, $organization)
    {
        $this->resetUrl = $resetUrl;
        $this->organization = $organization;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reset Your Fundink Password',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.reset-password',
            with: [
                'resetUrl' => $this->resetUrl,
                'organization' => $this->organization,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}