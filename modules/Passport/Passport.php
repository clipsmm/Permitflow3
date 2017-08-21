<?php
/**
 * Created by PhpStorm.
 * User: CliffMitamita
 * Date: 21/08/2017
 * Time: 09:50
 */

namespace Modules;


use Validator;
use App\Interfaces\ModuleInterface;
use App\Modules\BaseModule;

class Passport extends BaseModule implements ModuleInterface
{
    public $numSteps = 2;
    public $modelClass = \Modules\Passport\Models\Passport::class;

    public function getAttributes()
    {
        return [
            'name' => 'Passport',
            'slug' => 'passport',
        ];
    }

    public function getValidator($request, $current_step)
    {
        return Validator::make($request->all(), [
            'visa_type' => ['required']
        ]);
    }

    public function getForm()
    {
        return ;
    }
}