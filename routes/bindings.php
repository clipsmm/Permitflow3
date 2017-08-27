<?php

Route::bind('module', function ($value) {
    $module =  \App\Modules\BaseModule::instance_from_slug($value);

    if ($module) {
        return $module;
    } else {
        abort(404, "Module not found or is disabled");
    }
});

Route::bind('invoice_pk', function ($value) {
    try {
        return App\Models\Invoice::where('pk', $value)
            ->firstOrFail();
    } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        abort(404, "Page not found");
    }
});

Route::bind('output', function ($value) {
    try {
        return App\Models\Output::whereId($value)
            ->firstOrFail();
    } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        abort(404, "Page not found");
    }
});

Route::bind('application_id', function ($value) {
    try {
        return App\Models\Application::whereId($value)
            ->firstOrFail();
    } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        abort(404, "Page not found");
    }
});

Route::bind('application_output', function ($value) {
    try {
        return App\Models\ApplicationOutput::whereId($value)
            ->firstOrFail();
    } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        abort(404, "Page not found");
    }
});


