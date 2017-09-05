<?php

namespace App\Models;

use App\Modules\BaseModule;
use Caffeinated\Modules\Facades\Module;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

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

    public static function id_type($user)
    {
        if(property_exists($user, 'id_type')){
            return $user->id_type;
        }else if(property_exists($user, 'citizenship')){
            switch($user->citizenship){
                case "Kenyan":
                    return 'citizen';
                case "Foreigner":
                    return 'visitor';
                case 'Alien':
                    return 'alein';
            }
        }

        return null;
    }


    public function applications()
    {
        return $this->hasMany(Application::class, 'user_id');
    }

    public function outputs()
    {
        return $this->hasManyThrough(ApplicationOutput::class,Application::class,'user_id','application_id');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes["password"] = bcrypt($password);
    }

    public function setPhoneNumberAttribute($value)
    {
        $this->attributes['phone_number'] = !is_empty($value) ? encode_phone_number($value) : null;
    }

    public function modules()
    {
        $access  = \DB::table('module_user')->selectRaw("module_slug")->where('user_id', $this->id)->get();

        return BaseModule::get_all_modules()->filter(function($m) use ($access){
            return in_array($m->slug, $access->pluck('module_slug')->toArray());
        });
    }

    /**
     * Boot all of the bootable traits on the model.
     */
     public static function boot()
     {
         parent::boot();
 
         self::saving(function ($user) {
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

     public function __toString()
     {
         return $this->full_name;
     }

     public function getPhoneAttribute()
     {
        return $this->phone_number;
     }

     public static function find_by_id_number($id_number)
     {
         return self::whereIdNumber($id_number)->first();
     }
}
