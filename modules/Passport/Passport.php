<?php
/**
 * Created by PhpStorm.
 * User: CliffMitamita
 * Date: 21/08/2017
 * Time: 09:50
 */

namespace Modules;


use App\Events\ApplicationSubmitted;
use Modules\Passport\Listeners\PassportApplicationHandler;
use Validator;
use App\Interfaces\ModuleInterface;
use App\Modules\BaseModule;

class Passport extends BaseModule implements ModuleInterface
{
    public $numSteps = 1;
    public $modelClass = \Modules\Passport\Models\Passport::class;

    /**
     * Module specific event /listener pairs
     *
     * @var array
     */

    public $listens = [
        ApplicationSubmitted::class => [
            PassportApplicationHandler::class
        ]
    ];

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
            'surname' => ['required'],
            'first_name' => ['required'],
            'last_name' => [
                'required'
            ]
        ]);
    }

    public function getForm()
    {
        return ;
    }

    public function newUrl()
    {
        // TODO: Implement newUrl() method.
    }
}