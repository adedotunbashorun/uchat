<?php

namespace Modules\Users\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Users\Entities\UserInterface;

class WelcomeEmail extends Mailable {

    use Queueable, SerializesModels;
    /**
     * @var UserInterface
     */
    public $user;
    /**
     * @var
     */
    public $activationCode;

    /**
     * Create a new message instance.
     *
     * @param UserInterface $user
     * @param $activationCode
     */
    public function __construct(UserInterface $user, $activationCode)
    {
        $this->user = $user;
        $this->activationCode = $activationCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from_address = config('myapp.mail_from_address');
        $from_name = config('myapp.mail_from_name');
        if ($this->user->hasRoleName('Artisan'))
            $view = 'users::emails.welcome_artisan';
        else
            $view = 'users::emails.welcome';

        return $this->from($from_address, $from_name)
            ->view($view)
            ->subject('Welcome to ' . $from_name);
    }
}
