<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'first_name','last_name','username','mobile','role_id','is_active','activated','company',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function isRoot($roleId)
    {
        //foreach ($this->roles()->get() as $role)
        //{
            if ($roleId->slug == 'root')
            {
                return true;
            }
        //}

        return false;
    }
}
