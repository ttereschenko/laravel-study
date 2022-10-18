<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\LoginHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use DateTime;

class StoreUserLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
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
        $entry = new LoginHistory();
        $entry->user_id = $event->user->id;
        $entry->ip_address = $event->ipAddress;
        $entry->created_at = new DateTime();

        $entry->save();
    }
}
