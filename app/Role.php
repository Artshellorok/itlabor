<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public $timestamps = [];
    public function lessons()
    {
        return $this->morphedByMany('App\Lesson', 'roleable');
    }
}
