<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ApplicationCorrection extends Model
{
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function complete()
    {
        $this->completed_at = Carbon::now();
        $this->save();
    }
}
