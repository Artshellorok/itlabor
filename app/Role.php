<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public $timestamps = [];
    protected $primaryKey = 'role';
    public function assets()
    {
        return $this->morphedByMany('App\Asset', 'roleable');
    }
    public function videos()
    {
        return $this->morphedByMany('App\Video', 'roleable');
    }
    public function programs()
    {
        return $this->morphedByMany('App\Program', 'roleable');
    }
}
