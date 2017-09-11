<?php

namespace Modules\EVisa\Models;

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    protected $guarded = ['id'];

    public function visa()
    {
        return $this->belongsTo(Visa::class);
    }
}
