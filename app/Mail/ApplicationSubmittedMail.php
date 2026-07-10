<?php

namespace App\Mail;

use App\Models\Fund;
use App\Models\FundApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public FundApplication $application;
    public string $continueUrl;

    public function __construct(FundApplication $application, Fund $fund)
    {
        $this->application = $application;

        $this->continueUrl = route('projects.apply.senior-management', $fund);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Organization Details Received – Continue Your Fundink Application',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.application-submitted',
            with: [
                'application' => $this->application,
                'continueUrl' => $this->continueUrl,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}