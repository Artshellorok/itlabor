<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class LessonMaterial extends Model
{
    public $timestamps = [];
    protected $guarded = ['id', 'created_at'];
    public function roles()
    {
        return $this->morphToMany('App\Role', 'roleable');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
