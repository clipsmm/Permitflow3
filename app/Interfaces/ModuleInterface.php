<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 19/08/2017
 * Time: 20:51
 */

namespace App\Interfaces;


use App\Models\Task;

interface ModuleInterface
{
    public function newUrl($params = []);

    public function toFormData($data);

    public function fromFormData($data);

    public function view($view);

    public function getNextStep($application, $current_step);

    public function getValidator($request, $current_step);

    public function loadLookupData($model);

    public function handle_task(Task $task, $action, $comments  = null);
}