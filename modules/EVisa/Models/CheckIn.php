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
        if($visa->canCheckIn()){
            self::create([
                'visa_id' => $visa->id,
                'check_in_at' => Carbon::now(),
                'check_in_successful' => true
            ]);

            return true;
        }

        $reason = self::getFailureReason($visa);
        self::create([
            'visa_id' => $visa->id,
            'check_in_at' => Carbon::now(),
            'check_in_successful' => false,
            'failure_reason' => $reason
            ]);


        return [false, $reason];
    }

    private static function getFailureReason($visa)
    {
        //todo: return exact failure reason
        return 'Visa expired, is invalid or already checked in';
    }
}
