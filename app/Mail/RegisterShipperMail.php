<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterShipperMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;
    protected $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_ADDRESS'), env('MAIL_NAME'))
            ->subject(trans('lang.register_shipper_mail.title'))
            ->markdown('email.register_shipper')
            ->with([
                'email' => $this->email,
                'password' => $this->password,
            ]);
    }
}
