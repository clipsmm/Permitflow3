<?php

namespace Modules\EVisa\Providers;

use App\Modules\BaseModule;
use Caffeinated\Modules\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Modules\Evisa\Http\Middleware\ValidatePreviousSteps;

class ModuleServiceProvider extends ServiceProvider
{
    //todo: load from module settings
    private $blacklisted_countries = ['AF'];

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
        Validator::extend('countries_blacklist', function ($attribute, $value, $parameters, $validator) {
            return !in_array($value, $this->blacklisted_countries);
        });

        Validator::extend('full_phone', function ($attribute, $value, $parameters, $validator) {
            try {
                //ensure phone number is numeric
                if (!is_numeric($value)) return false;

                $code_phone_no = encode_phone_number($value);
                return strlen($code_phone_no) == 12;
            } catch (\Exception $ex) {
                return false;
            }
        });
    }

    private function registerModuleMiddleware()
    {
        Route::aliasMiddleware('e-visa.validate_past_steps', ValidatePreviousSteps::class);
    }
}
