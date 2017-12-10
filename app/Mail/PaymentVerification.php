<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentVerification extends Mailable
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
        return $this->from('info@homecoming.nust.edu.pk')
                    ->subject("Payment Verification [NUST Alumni Homecoming]")
                    ->view('mail.paymentVerfication');
    }
}
