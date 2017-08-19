<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 18/08/2017
 * Time: 19:37
 * @param $slug
 * @return string
 */

function module_class_from_slug($slug)
{
    $namespace = str_replace("\\", "", config('modules.namespace'));
    $class_name = \Caffeinated\Modules\Facades\Module::where('slug', $slug)->get('name');
    return is_null($class_name) ? null : implode("\\", [$namespace, $class_name]);
}

function module_from_slug($slug)
{
    $class = module_class_from_slug($slug);
    return $class ? new $class : null;
}