<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 19/08/2017
 * Time: 21:03
 */

namespace Modules\EVisa\Models;

use App\Models\Application;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    public static $fields = ['country_of_application', 'applicant', 'surname', 'other_names',
        'gender', 'date_of_birth', 'country_of_birth', 'place_of_birth', 'occupation', 'fathers_name',
        'mothers_name', 'spouse_name', 'nationality', 'country_of_residence', 'city', 'physical_address',
        'phone_number', 'email', 'passport_number', 'passport_place_of_issue', 'passport_date_of_issue',
        'passport_date_of_expiry', 'passport_issued_by', 'travel_reason', 'other_travel_reason', 'date_of_entry', 'date_of_departure',
        'arrival_by', 'entry_point', 'places_to_visit', 'other_recent_visits',
        'recent_visits', 'returning_to_country', 'no_return_reason', 'denied_entry_before', 'denied_entry_reason', 'denied_entry_others',
        'denied_entry_others_reason', 'convicted_before', 'convicted_reason', 'passport_bio', 'passport_photo',
        'additional_documents', 'visa_type'
    ];

    protected $guarded = ['id'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function checkIns()
    {
        return $this->hasMany(CheckIn::class);
    }

    public function canCheckIn()
    {
        return !$this->expired()
            && $this->isValid()
            && !$this->hasPendingCheckOut();
    }

    public function expired()
    {
        return $this->expires_at < Carbon::now();
    }

    public function isValid()
    {
        return $this->status == 'active';
    }

    public static function createFromApplication($application, $status = 'active')
    {
        return self::create(
            [
                'visa_number' => $application->application_number,
                'status' => $status,
                'application_id' => $application->id,
                'user_id' => $application->user_id,
                'type' => $application->get_data('visa_type'),
                'expires_at' => self::expiresAt($application)
            ]
        );
    }

    public static function expiresAt($application)
    {
        $type = $application->get_data('type');
        $validity = settings('e-visa.visa_validity', 90);

        if ($type == 'transit_visa') {
            $validity = settings('e-visa.transit_visa_stay_period', 2);
        }

        $entry_date = Carbon::parse($application->get_data('date_of_entry'));

        return $entry_date->addDays($validity);
    }

    public function hasPendingCheckOut()
    {
        $checkIn = $this->checkIns()
            ->where('check_in_successful', true)
            ->whereDoesntHave('checkOuts', function ($query) {
                $query->where('check_out_successful', true);
            })->first();

        return !is_null($checkIn);
    }

}