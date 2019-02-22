<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function roles()
    {
        return $this->morphToMany('App\Role', 'roleable');
    }
}
