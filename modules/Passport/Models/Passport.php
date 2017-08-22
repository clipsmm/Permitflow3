<?php

namespace Modules\Passport\Models;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model {

    public static $fields  = [
        'surname' => 'surname',
        'first_name' => 'first_name',
        'last_name' => 'last_name'
    ];

}