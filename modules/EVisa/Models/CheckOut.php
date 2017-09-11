<?php

namespace Modules\EVisa\Models;

use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    protected $guarded = ['id'];

    public function checkIn()
    {
        return $this->belongsTo(CheckIn::class);
    }
}
