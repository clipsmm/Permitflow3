<?php

Route::bind('module', function ($value) {
    $module =  \App\Modules\BaseModule::instance_from_slug($value);

    if ($module) {
        return $module;
    } else {
        abort(404, "Module not found or is disabled");
    }
});
