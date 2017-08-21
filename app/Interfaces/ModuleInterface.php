<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 19/08/2017
 * Time: 20:51
 */

namespace App\Interfaces;


interface ModuleInterface
{
    public function getAttributes();

    public function toFormData($data);

    public function fromFormData($data);

    public function view($view);

    public function viewsPath();

    public function getNextStep($application, $current_step);

    public function getValidator($request, $current_step);

    public function getForm();
}