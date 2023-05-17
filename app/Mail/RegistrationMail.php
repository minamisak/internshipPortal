<?php

namespace App\Mail;

use App\Models\Intern;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $intern;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Intern $intern)
    {
        $this->intern = $intern;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registration');
    }
}
