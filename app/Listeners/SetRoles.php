<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Role;
class SetRoles
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        if ($event->user->teacher()->exists()) {
            $event->user->new_role = "teacher";
        }
        if ($event->user->student()->exists()) {
            $event->user->new_role = "student";
        }
        if ($event->user->ancestor()->exists()) {
            $event->user->new_role = "ancestor";
        }
    }
}
