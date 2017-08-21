<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 18/08/2017
 * Time: 11:27
 * @param $errors
 * @param $key
 */

function error_class($errors, $key)
{
    return $errors->has($key) ? ' has-error' : '';
}

function error_tag($errors, $key)
{
    return $errors->has($key) ? "<span class='help-block'><strong>{$errors->first($key)}</strong></span>" : "";
}