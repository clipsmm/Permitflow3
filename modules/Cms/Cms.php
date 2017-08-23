<?php
namespace Modules;

use Carbon\Carbon;

class Cms extends BaseModule implements ModuleInterface
{

    public $modelClass = \Modules\Cms\Models\Cms::class;



    public function getValidator($request, $current_step)
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();

        switch ($current_step) {
            case 1:
                return Validator::make($request->all(), [
                    'country_of_application' => ['required', 'cca2'],
                    'applicant' => ['required', Rule::in(['self', 'agent', 'child', 'spouse'])]
                ]);

            case 2:
                return Validator::make($request->all(), [
                    'nationality' => ['required', 'cca2', 'countries_blacklist'],
                    'country_of_residence' => ['required', 'cca2'],
                    'city' => ['required'],
                    'physical_address' => ['required'],
                    'phone_number' => ['required', 'full_phone'],
                    'email' => ['required', 'email'],
                ], [
                    'phone_number.full_phone' => __('Use +2547********* format'),
                    'nationality.countries_blacklist' => _('Sorry, nationals of this country are not eligible for e-Visa')
                ]);

            case 3:
                return Validator::make($request->all(), [
                    'surname' => ['required'],
                    'other_names' => ['required'],
                    'gender' => ['required', 'in:M,F,other'],
                    'date_of_birth' => ['required', 'date', "before:{$today}"],
                    'country_of_birth' => ['required', 'cca2'],
                    'place_of_birth' => ['required'],
                    'occupation' => ['required'],
                    'fathers_name' => ['required'],
                    'mothers_name' => ['required'],
                    'spouse_name' => ['required']
                ], ['date_of_birth.before' => __('validation.before_today')
                ]);

            case 4:
                return Validator::make($request->all(), [
                    'passport_number' => ['required'],
                    'passport_place_of_issue' => ['required'],
                    'passport_date_of_issue' => ['required', 'date', "before:{$tomorrow}"],
                    'passport_date_of_expiry' => ['required', "after:{$today}"],
                    'passport_issued_by' => ['required']
                ], [
                    'passport_date_of_issue.before' => __('validation.before_tomorrow'),
                    'passport_date_of_expiry.after' => __('validation.after_today'),
                ]);

            case 5:
                return Validator::make($request->all(), [
                    'travel_reason' => ['required'],
                    'date_of_entry' => ['required', 'date', "after:{$today}"],
                    'date_of_departure' => ['required', 'date', "after:{$today}"],
                    'travel_email' => ['required', 'email'],
                    'travel_phone_number' => ['required', 'full_phone'],
                    'arrival_by' => ['required', 'in:sea,road,air'],
                    'entry_point' => ['required'],
                ], [
                    'travel_phone_number.full_phone' => __('validation.intl_phone'),
                    'date_of_entry.after' => __('validation.after_today'),
                    'date_of_departure.after' => __('validation.after_today'),
                ]);

            case 6:
                return Validator::make($request->all(), [
                    'places_to_visit' => ['required', 'array'],
                    'places_to_visit.*.type' => ['required', 'in:hotel,firm,relative,other'],
                    'places_to_visit.*.address' => ['required']
                ]);

            case 7:
                return Validator::make($request->all(), [
                    'other_recent_visits' => ['array'],
                    'other_recent_visits.*.country' => ['required', 'cca2'],
                    'other_recent_visits.*.date' => ['required', 'date', "before:{$today}"],
                    'other_recent_visits.*.duration' => ['required', 'integer', 'min:1'],
                    'recent_visits' => ['array'],
                    'recent_visits.*.date' => ['required', 'date', "before:{$today}"],
                    'recent_visits.*.duration' => ['required', 'integer', 'min:1'],
                    'recent_visits.*.duration_type' => ['required', 'in:months,days,years']
                ], [
                    'other_recent_visits.*.date.before' => __('validation.before_today'),
                    'recent_visits.*.date.before' => __('validation.before_today')
                ]);
        }
    }

}