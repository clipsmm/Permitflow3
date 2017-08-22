<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 18/08/2017
 * Time: 18:39
 */

namespace Modules;

use App\Interfaces\ModuleInterface;
use App\Modules\BaseModule;
use Illuminate\Support\Facades\Validator;

class EVisa extends BaseModule implements ModuleInterface
{
    public $numSteps = 2;
    public $modelClass = \Modules\EVisa\Models\EVisa::class;

    public function getAttributes()
    {
        return [
            'name' => 'EVisa',
            'slug' => 'e-visa',
        ];
    }

    public function getValidator($request, $current_step)
    {
        return Validator::make($request->all(), [
            'visa_type' => ['required']
        ]);
    }
}