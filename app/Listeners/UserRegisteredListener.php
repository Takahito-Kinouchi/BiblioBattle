<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Mail\Mailer;
use Illuminate\Auth\Events\Registered;

class UserRegisteredListener
{
    private $mailer;
    private $eloquent;

    public function __construct(Mailer $mailer, User $eloquent)
    {
        $this->mailer = $mailer;
        $this->eloquent = $eloquent;
    }

    public function handle(Registered $event)
    {
        $user = $this->eloquent->findOrFail($event->user->getAuthIdentifier());
        $this->mailer->raw('Registration complete. Make sure to confirm your email.', function ($message) use ($user) {
            $message->subject('Welcome to Biblio Battle!')->to($user->email);
        });
    }
}
