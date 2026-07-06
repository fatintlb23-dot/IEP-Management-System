<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ParentRejectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public $reason;

    public function __construct($parent, $reason = null)
    {
        $this->parent = $parent;
        $this->reason = $reason ?? 'No specific reason provided.';
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your IEP System Account Registration',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.parent-rejected',
        );
    }
}