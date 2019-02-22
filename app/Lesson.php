<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = ['id', 'created_at'];
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
    public function assets()
    {
        return $this->hasMany('App\Asset');
    }
    public function programs()
    {
        return $this->hasMany('App\Program');
    }
    public function videos()
    {
        return $this->hasMany('App\Video');
    }
}
