<?php

namespace Modules\EVisa\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class CheckOut extends Model
{
    protected $guarded = ['id'];


    public function checkIn()
    {
        return $this->belongsTo(CheckIn::class);
    }

    public static function attempt(Visa $visa)
    {
        $check_in = $visa->getCheckIn();
        $reason = self::getFailureReason($visa, $check_in);

        return self::create([
            'check_in_id' => is_null($check_in) ?  null : $check_in->id,
            'visa_id' => $visa->id,
            'check_out_at' => Carbon::now(),
            'check_out_successful' => is_null($reason),
            'failure_reason' => $reason
        ]);
    }

    private static function getFailureReason(Visa $visa, $check_in)
    {
        if(is_null($check_in)){
            return 'NOT CHECKED IN';
        }
        if(!$visa->isValid()){
            return 'INVALID VISA';
        }
        return  null;
    }
}
