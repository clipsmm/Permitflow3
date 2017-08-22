<?php

namespace App\Providers;

use App\Models\Module;
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
            $modules = Module::whereEnabled(true)->get();
            view()->share(['active_modules' => $modules]);
        } catch(\Exception $e) {

        }
    }
}
