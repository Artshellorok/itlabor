<?php

namespace App;

class Teacher extends Roles
{
    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }
}
