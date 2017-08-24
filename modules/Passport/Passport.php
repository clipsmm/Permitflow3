<?php
/**
 * Created by PhpStorm.
 * User: CliffMitamita
 * Date: 21/08/2017
 * Time: 09:50
 */

namespace Modules;


use App\Events\ApplicationSubmitted;
use App\Models\Task;
use Modules\Passport\Listeners\PassportApplicationHandler;
use Validator;
use App\Interfaces\ModuleInterface;
use App\Modules\BaseModule;

class Passport extends BaseModule implements ModuleInterface
{
    public $numSteps = 1;
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


    public function handle_task(Task $task, $action, $comments = null)
    {
        // TODO: Implement handle_task() method.
    }

    public function newUrl($params = [])
    {
        // TODO: Implement newUrl() method.
    }

    public function get_permissions()
    {
        // TODO: Implement get_permissions() method.
    }

    public function render_settings_view()
    {
        // TODO: Implement render_settings_view() method.
    }
}