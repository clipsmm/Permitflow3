<?php

namespace App\Providers;

use App\Models\Module;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Mockery\Exception;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapModuleRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Registers custom routes from installed modules
     */
    protected function mapModuleRoutes()
    {
        try {
            //todo: middleware to check if module is enabled
            Route::group(['prefix' => 'mod/{module_slug}/'], function ($router){
                Module::whereEnabled(true)->each(function ($mod) {
                    $base_path = implode(DIRECTORY_SEPARATOR, [config('modules.path'), $mod->module->name, 'Routes']);
                    require base_path(implode(DIRECTORY_SEPARATOR, [$base_path, 'web.php']));
                    require base_path(implode(DIRECTORY_SEPARATOR, [$base_path, 'api.php']));
                });
            });
        } catch (\Exception $e) {
        }
    }
}
