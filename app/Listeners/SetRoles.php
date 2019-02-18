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
    public function handle(UserCreated $event, NameSpaceFinder $finder)
    {
        foreach ($finder->getClassesOfNameSpace('App') as $class) {
            if ($class instanceof App\Role) {
                dd($class);
                $roleName = mb_strtolower(get_class($class));
                dd($roleName);
                if ($event->user->$roleName()->exists()) {
                    $event->user->new_role = $roleName;
                }
            }
        }
    }
}
