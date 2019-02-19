<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \App\Events\UserCreated;
class User extends Authenticatable
{
    use Notifiable;
    protected $dispatchesEvents = [
        'retrieved' => UserCreated::class,
    ];

    protected $roles = [];

    protected $guarded = [
        'id', 'remember_token', 'created_at',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function ancestor()
    {
        return $this->hasOne('\App\Ancestor');
    }

    public function teacher()
    {
        return $this->hasOne('\App\Teacher');
    }

    public function student()
    {
        return $this->hasOne('\App\Student');
    }
    public function setNewRoleAttribute($value)
    {
        array_push($this->roles, $value);
    }

    public function getRolesAttribute()
    {
        return $this->roles;
    }
    
    public function role($role = '')
    {
        return in_array($role, $this->roles);
    }
    public function hasChosenRole()
    {
        if (!empty($this->roles)) {
            return true;
        }
        else {
            return false;
        }
    }
}
