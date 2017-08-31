<?php

namespace Modules\EVisa\Providers;

use App\Modules\BaseModule;
use Caffeinated\Modules\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Modules\Evisa\Http\Middleware\ValidatePreviousSteps;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'e-visa');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'e-visa');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations', 'e-visa');
        $this->addCustomValidators();
        $this->registerModuleMiddleware();
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
    }

    private function addCustomValidators()
    {
        $blacklist = settings('e-visa.blacklisted_countries', []);
        $whitelist = settings('e-visa.whitelisted_countries', []);

        Validator::extend('blacklist_countries', function ($attribute, $value, $parameters, $validator) use ($blacklist){
            return !in_array($value, $blacklist);
        });

        Validator::extend('whitelist_countries', function ($attribute, $value, $parameters, $validator) use ($whitelist) {
            return !in_array($value, $whitelist);
        });
    }

    private function registerModuleMiddleware()
    {
        Route::aliasMiddleware('e-visa.validate_past_steps', ValidatePreviousSteps::class);
    }
}
