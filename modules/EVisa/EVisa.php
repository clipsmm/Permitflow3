<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 18/08/2017
 * Time: 18:39
 */

namespace Modules;

use Carbon\Carbon;
use \Countries;
use App\Interfaces\ModuleInterface;
use App\Modules\BaseModule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EVisa extends BaseModule implements ModuleInterface
{
    public $modelClass = \Modules\EVisa\Models\EVisa::class;

    public $numSteps = 8;

    public function newUrl($params = [])
    {
        return route('e-visa.application.new', $params);
    }

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
                    'places_to_visit' => ['required', 'array', 'min:1'],
                    'places_to_visit.*.type' => ['required', 'in:hotel,firm,relative,other'],
                    'places_to_visit.*.address' => ['required'],
                    'places_to_visit.*.name' => ['required']
                ],[
                    'places_to_visit.required' => __('e-visa::validation.custom.places_to_visit.required'),
                    'places_to_visit.*.*.required' => __('e-visa::validation.nested_required')
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
                    'recent_visits.*.duration_type' => ['required', 'in:months,days,years'],
                    'returning_to_country' => ['required', 'boolean'],
                    'no_return_reason' => ['required_if:returning_to_country,0'],
                    'denied_entry_before' => ['required', 'boolean'],
                    'denied_entry_reason' => ['required_if:denied_entry_before,1'],
                    'denied_entry_others' => ['required', 'boolean'],
                    'denied_entry_others_reason' => ['required_if:denied_entry_others,1'],
                    'convicted_before' => ['required', 'boolean'],
                    'convicted_reason' => ['required_if:convicted_before,1'],
                ], [
                    'other_recent_visits.*.*.required' => __('e-visa::validation.nested_required'),
                    'other_recent_visits.*.date.before' => __('validation.before_today'),
                    'recent_visits.*.date.before' => __('validation.before_today'),
                    'recent_visits.*.*.required' => __('e-visa::validation.nested_required'),
                    '*.required_if' => __('This field is required')
                ]);

            case 8:
                return Validator::make($request->all(), [
                    'passport_bio' => ['required','file','max:2048','mimes:pdf,png,jpg,jpeg'],
                    'passport_photo' => ['required','file','max:2048','mimes:pdf,png,jpg,jpeg'],
                    'additional_documents' => ['required','file','max:2048','mimes:pdf,png,jpg,jpeg']
                ]);
        }
    }


}