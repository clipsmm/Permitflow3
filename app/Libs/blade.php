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


function render_action($action_data)
{
    $method = strtolower(array_get($action_data, 'method', 'get'));
    $confirm = array_get($action_data, 'confirm', false);
    $icon = array_get($action_data, 'icon');
    $url = array_get($action_data, 'action');
    $color = array_get($action_data, 'color');
    $label = array_get($action_data, 'label');
    $title = __('Confirm Action');

    if ($confirm) {
        return <<<EOT
        <confirmed-action title="{$title}?" method="{$method}" action="{$url}" confirm="{$confirm}"  label="{$label}" icon="{$icon}" color="{$color}"></confirmed-action>
EOT;

    } else if ($method == 'post') {
        return <<<EOT
    <form method="post" action="{$url}">
        <a href="#" onclick="this.parentNode.submit()">
        <span class="{$icon} text-{$color}"></span> {$label}</a>
    </form>
EOT;

    } else {
        return <<<EOT
        <a href="{$url}">
        <span class="{$icon} text-{$color}"></span>
{$label}
</a>
EOT;
    }
}