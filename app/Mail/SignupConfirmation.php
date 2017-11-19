<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
class SignupConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $emailAddress;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailAddress,User $user)
    {
        //
        $this->emailAddress = $emailAddress;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Signup Confirmation [NUST Alumni Homecoming]")
                    ->view('mail.signupConfirmation');
    }
}
