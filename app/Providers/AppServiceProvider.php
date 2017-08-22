<?php

namespace App\Providers;

use Caffeinated\Modules\Facades\Module;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadModules();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function loadModules()
    {
        try{
            $modules = Module::enabled();
            view()->share(['active_modules' => $modules]);
        } catch(\Exception $e) {

        }
    }
}
