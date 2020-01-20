<?php

namespace LaraDex;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function roles() {
        return $this->belongsToMany('LaraDex\Role');
    }
    public function authorizeRoles($roles) {
        if($this->HasAnyRole($roles)) {
            return true;
        } else {
            abort(401, 'This action is unauthorized');
        }
    }
    public function hasAnyRole($roles) {
        if(is_array($roles)) {
            foreach($roles as $role) {
                if($this->HasRole($role)) {
                    return true;
                }
            }
        } else {
            if($this->HasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function HasRole($role){
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
