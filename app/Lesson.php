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
}
