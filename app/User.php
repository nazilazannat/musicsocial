<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelLike\Traits\Liker;

class User extends Authenticatable
// implements MustVerifyEmail
{
    use Notifiable, Liker;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password'
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


    function post(){
        return $this->hasMany(Post::class);
    }

    function roles(){
        return $this->belongsToMany('App\Role');
    }

    function hasAnyRoles($roles){
        if($this->roles()->whereIn('urole', $roles)->first()){
        return true;
    }
    return false;
    }

    function hasRole($role){
        if($this->roles()->where('urole', $role)->first()){
        return true;
    }
    return false;
    }

}
