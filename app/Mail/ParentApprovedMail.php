<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ParentApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public $loginUrl;

    public function __construct($parent)
    {
        $this->parent = $parent;
        $this->loginUrl = route('login');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your IEP System Account Has Been Approved',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.parent-approved',
        );
    }
}