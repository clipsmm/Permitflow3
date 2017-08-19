<?php

namespace App\Providers;

use Caffeinated\Modules\Facades\Module;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach (Module::all() as $attrs){
            $module = module_from_slug($attrs['slug']);
            // todo: register views only if module is enabled
            if($module->hasViews){
                view()->addNamespace($module->slug, $module->viewsPath());
            }
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
