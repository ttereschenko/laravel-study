<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Mail\LoginAlert;
use App\Models\LoginHistory;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendLoginAlert
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        Mail::to($event->user->email)->send(new LoginAlert($event->user));
    }
}
