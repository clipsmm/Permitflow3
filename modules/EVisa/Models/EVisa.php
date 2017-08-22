<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 19/08/2017
 * Time: 21:03
 */

namespace Modules\EVisa\Models;

use Illuminate\Database\Eloquent\Model;

class EVisa extends Model
{
    protected $guarded = [];
    public static $fields = ['country_of_application', 'applicant', 'surname', 'other_names',
        'gender', 'date_of_birth', 'country_of_birth', 'place_of_birth', 'occupation', 'fathers_name',
        'mothers_name', 'spouse_name', 'nationality', 'country_of_residence', 'city', 'physical_address',
        'phone_number', 'email', 'passport_number', 'passport_place_of_issue', 'passport_date_of_issue',
        'passport_date_of_expiry', 'passport_issued_by'];

}