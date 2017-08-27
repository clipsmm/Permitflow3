<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 27/08/2017
 * Time: 11:13
 */

namespace Modules\EVisa\Models;


use Illuminate\Database\Eloquent\Model;

class EntryPoint extends Model
{

    protected $table = 'e_visa_entry_points';
    protected $guarded = ['id'];

}