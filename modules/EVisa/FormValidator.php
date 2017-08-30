<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 28/08/2017
 * Time: 15:56
 */

namespace Modules\EVisa;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Modules\EVisa;

class FormValidator
{
    public function make($data, $current_step)
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();

        switch ($current_step) {
            case 1:
                return Validator::make($data, [
                    'country_of_application' => ['required', 'cca2'],
                    'visa_type' => ['required', Rule::in(array_keys(EVisa::getVisaTypes()))],
                    'nationality' => ['required', 'cca2', 'blacklist_countries', 'whitelist_countries'],
                    'country_of_residence' => ['required', 'cca2'],
                    'city' => ['required'],
                    'physical_address' => ['required'],
                    'phone_number' => ['required', 'full_phone'],
                    'email' => ['required', 'email'],
                ], [
                    'phone_number.full_phone' => __('Use 2547********* format'),
                    'nationality.blacklist_countries' => __('Sorry, nationals of this country are not eligible for e-Visa'),
                    'nationality.whitelist_countries' => __('Citizens of this country are allowed entry without visa'),
                ]);

            case 2:
                return Validator::make($data, [
                    'surname' => ['required'],
                    'other_names' => ['required'],
                    'gender' => ['required', 'in:M,F,other'],
                    'date_of_birth' => ['required', 'date', "before:{$today}"],
                    'country_of_birth' => ['required', 'cca2'],
                    'place_of_birth' => ['required'],
                    'occupation' => ['required'],
                    'fathers_name' => ['required'],
                    'mothers_name' => ['required'],
                    'spouse_name' => ['required'],
                    'passport_number' => ['required'],
                    'passport_place_of_issue' => ['required'],
                    'passport_date_of_issue' => ['required', 'date', "before:{$tomorrow}"],
                    'passport_date_of_expiry' => ['required', "after:{$today}"],
                    'passport_issued_by' => ['required'],
                    'passport_bio' => ['required', 'file-upload:pdf jpg jpeg,2048'],
                    'passport_photo' => ['required', 'file-upload:pdf jpg jpeg,2048'],
                ], [
                    'passport_date_of_issue.before' => __('validation.before_tomorrow'),
                    'passport_date_of_expiry.after' => __('validation.after_today'),
                    'date_of_birth.before' => __('validation.before_today')
                ]);

            case 3:
                $visa_validity = Carbon::now()->addDay(settings('e-visa.visa_validity', 90));
                $date_of_entry = new Carbon(array_get($data,'date_of_entry'));

                return Validator::make($data, [
                    'travel_reason' => ['required'],
                    'other_travel_reason' => ['required_if:travel_reason,others'],
                    'date_of_entry' => ['required', 'date', "after:{$today}", "before:{$visa_validity}"],
                    'date_of_departure' => ['required', 'date', "after_or_equal:{$date_of_entry}"],
                    'arrival_by' => ['required', 'in:ship,road,air'],
                    'entry_point' => ['bail', 'required', Rule::exists('e_visa_entry_points', 'id')->where(function ($query) use ($data) {
                        $query->where('type', $data['arrival_by']);
                    })],
                    'places_to_visit' => ['required', 'array', 'min:1'],
                    'places_to_visit.*.type' => ['required', 'in:hotel,firm,relative,other'],
                    'places_to_visit.*.address' => ['required'],
                    'places_to_visit.*.name' => ['required'],
                    'additional_documents' => ['array', 'required'],
                    'additional_documents.*' => ['required', 'file-upload:pdf png jpg jpeg,2048']
                ], [
                    'additional_documents.*.required' => __("This field is required"),
                    'travel_phone_number.full_phone' => __('validation.intl_phone'),
                    'date_of_entry.after' => __('validation.after_today'),
                    'date_of_departure.after' => __('e-visa::validation.after_date_entry'),
                    'places_to_visit.required' => __('e-visa::validation.custom.places_to_visit.required'),
                    'places_to_visit.*.*.required' => __('e-visa::validation.nested_required')
                ]);

            case 4:
                return Validator::make($data, [
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
        }
    }
}