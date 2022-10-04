<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\User;
use Carbon\CarbonImmutable; 

use Carbon\Doctrine\CarbonImmutableType;



class LastLoginUpdateListener
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
    public function handle($event): void
    {
        if(isset($event->user) && $event->user instanceof User) {
            $event->user->last_login_at = CarbonImmutable::now();
            $event->user->save();
        }
    }
}
