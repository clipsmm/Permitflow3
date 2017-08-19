<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 19/08/2017
 * Time: 21:22
 */

namespace App\Modules;


use Illuminate\Support\Facades\Validator;

class BaseModule
{
    public $hasViews = true;
    public $numSteps = 1;
    public $modelClass;

    public function __get($name)
    {
        return $this->getAttributes()[$name];
    }

    public function getAttributes(){
        return [];
    }

    public function toFormData($data) {
        $class = $this->modelClass;
        return array_only($data,   $class::$fields);
    }

    public function fromFormData($data)
    {
        $class =  $this->modelClass;
        return new $class($data);
    }

    public function view($view)
    {
        return implode("::", [$this->slug, $view]);
    }

    public function viewsPath()
    {
        return implode(DIRECTORY_SEPARATOR,
            [base_path(config('modules.path')), $this->getAttributes()['name'], 'Resources', 'Views']);
    }

    public function getNextStep($application, $current_step){
        $next = ++$current_step;
        return $next > $this->numSteps ? "REVIEW" : $next;
    }

    public function getValidator($request, $current_step)
    {
        return Validator::make($request->all(), []);
    }

}