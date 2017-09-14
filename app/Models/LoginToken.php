<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generate($user)
    {
        $prefix = \Hashids::encode($user->id);

        return self::create([
            'token' => sha1(uniqid($prefix, true)),
            'user_id' => $user->id,
            'used' => false
        ]);
    }
}
