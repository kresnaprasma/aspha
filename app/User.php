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

    public function fileentry()
    {
      return $this->hasMany('App\Fileentry');
    }

    public function loan()
    {
        return $this->hasMany("App\Loan");
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }   

    public function permissions()
    {
        return $this->hasManyThrough(Permission::class, Role::class);
    }

    public function isSuper()
   {
        if ($this->roles->contains('name', 'super')) {
          return true;
        }
        return false;
   }

   public function hasRole($role)
   {
        if(is_string($role)){
          return $this->roles->contains('name', $role);
        }
        return !! $this->roles->intersect($role)->count();
   }

   public function assignRole($role)
   {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }
        return $this->roles()->attach($role);
   }

   public function revokeRole($role)
   {
        if(is_string($role)){
            $role = Role::where('name', $role)->first();
        }
        return $this->roles()->detach($role);
   }
}
