<?php

namespace Modules\EVisa\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    protected $guarded = ['id'];

    public function visa()
    {
        return $this->belongsTo(Visa::class);
    }

    public function checkOuts()
    {
        return $this->hasMany(CheckOut::class);
    }

    public static function attempt(Visa $visa)
    {
        $reason = self::getFailureReason($visa);

        return self::create([
            'visa_id' => $visa->id,
            'check_in_at' => Carbon::now(),
            'check_in_successful' => is_null($reason),
            'failure_reason' => $reason
        ]);
    }

    private static function getFailureReason(Visa $visa)
    {
        if($visa->expired()){
            return "VISA EXPIRED";
        }
        if($visa->isCheckedIn()){
            return 'ALREADY CHECKED IN';
        }
        if(!$visa->isValid()){
            return 'INVALID VISA';
        }
        return  null;
    }
}
