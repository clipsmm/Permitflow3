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
    public static $fields = ['visa_type'];

}