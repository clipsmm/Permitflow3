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
