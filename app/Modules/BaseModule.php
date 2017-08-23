<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 19/08/2017
 * Time: 21:22
 */

namespace App\Modules;


use App\Models\Application;
use App\Models\Task;
use Caffeinated\Modules\Facades\Module;

class BaseModule
{

    public function __construct($attrs)
    {
        foreach ($attrs as $key => $val){
            $this->{$key} = $val;
        }
    }

    public static function instance_from_slug($slug)
    {
        $attrs = Module::where('slug', $slug);
        $class_name = $attrs->get('name');
        $class = is_null($class_name) ? null : implode("\\", ['Modules', $class_name]);
        return $class ? new $class($attrs->toArray()) : null;
    }

    public function toFormData($data) {
        $class = $this->modelClass;
        return array_only($data,   $class::$fields);
    }

    public function fromFormData($data)
    {
        $class =  $this->modelClass;
        return new $class(array_only($data,   $class::$fields));
    }

    public function view($view)
    {
        return implode("::", [$this->slug, $view]);
    }

    public function getNextStep($application, $current_step){
        $next = ++$current_step;
        return $next > $this->numSteps ? "REVIEW" : $next;
    }

    public function loadLookupData($model)
    {
        return [];
    }

    public function getUpdatedCounter(){
        $counter = Module::get("{$this->slug}::counter", 0);
        Module::set("{$this->slug}::counter", $counter + 1);

        return $counter + 1;
    }


    public function get_task_actions(Task $task)
    {
        return $this->stages[$task->stage];
    }

    public function render_application_view(Application $application)
    {

        $model = $this->fromFormData($application->form_data);
        return view("{$this->slug}::application_view", [
            'application' => $application,
            'model' => $model,
            'module' => $this,
            'lookup_data' => $this->loadLookupData($model)
        ]);
    }

    public function create_invoice($application)
    {
        return null;
    }
}