<?php

namespace Controlqtime\Mail;

use Controlqtime\Core\Entities\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignUp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $password;

    /**
     * @var User
     */
    public $user;

    /**
     * SignUp constructor.
     *
     * @param $password
     * @param User $user
     */
    public function __construct($password, User $user)
    {
        $this->password = $password;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Bienvenido')
            ->markdown('emails.users.sign_up');
    }
}
