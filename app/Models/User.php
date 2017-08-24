<?php

namespace App\Models;

use Closure;
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
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setPasswordAttribute($password)
    {
        $this->attributes["password"] = bcrypt($password);
    }

    /**
     * Boot all of the bootable traits on the model.
     */
     public static function boot()
     {
         parent::boot();
 
         self::creating(function ($user) {
             $user->full_name  =  "{$user->first_name} {$user->last_name} {$user->surname}";
         });

     }

     public static function get_by_username($username)
     {
        $identity = filter_var($username, FILTER_VALIDATE_EMAIL)? 'email' : 'id_number';

        if($identity == 'email')
            return self::query()->whereEmail($username)->first();
        
        return self::query()->whereIdNumber($username)->first();
     }

     public function getAvatar()
     {
         return '';
     }
}
