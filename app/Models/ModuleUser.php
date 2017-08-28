<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleUser extends Model
{
    protected $table = 'module_user';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
