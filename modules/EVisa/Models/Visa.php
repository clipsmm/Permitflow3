<?php

namespace Modules\EVisa\Models;

use App\Models\Application;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $guarded = ['id'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
