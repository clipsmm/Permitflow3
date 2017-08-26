<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 19/08/2017
 * Time: 20:51
 */

namespace App\Interfaces;


use App\Models\Application;
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

    public function get_task_actions(Task $task);

    public function render_application_view(Application $application);

    public function create_invoice($application);

    public function get_edit_url($application);

    public function get_permissions();

    public function render_settings_view();

    public function get_menus();

    public function get_landing_page();

    /*
     * Return a list of actions with label, action, method, confirm, icon, color
     * Example ['label' => 'Cancel', 'action' => data-placement="right" route('some.route'), 'method' => 'post', 'color' => 'danger', 'icon' => 'fa fa-times', 'confirm' => 'Are you sure?']
     */
    public function getApplicationActions($application);
}
