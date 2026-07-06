<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TeacherWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $teacher;
    public $tempPassword;
    public $loginUrl;

    public function __construct($teacher, $tempPassword)
    {
        $this->teacher = $teacher;
        $this->tempPassword = $tempPassword;
        $this->loginUrl = route('login');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to IEP System - Your Teacher Account',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.teacher-welcome',
        );
    }
}