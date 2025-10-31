<?php

namespace App\Mail;

use App\Models\Appointments;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $appointment;
    public $email;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;

    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reminder Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.reminderMail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

