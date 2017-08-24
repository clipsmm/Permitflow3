<?php

namespace App\Providers;

use App\Events\ApplicationResubmitted;
use App\Listeners\ApplicationResubmittedHandler;
use App\Modules\BaseModule;
use Caffeinated\Modules\Facades\Module;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        ApplicationResubmitted::class => [
            ApplicationResubmittedHandler::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // register module events and listeners
        $this->loadModuleEvents();

    }

    public function loadModuleEvents()
    {
        try{
            Module::enabled()->each(function ($item) {
                $module  =  BaseModule::instance_from_slug($item['slug']);
                foreach ($module->listens as $event => $listeners) {
                    foreach ($listeners as $listener) {
                        Event::listen($event, $listener);
                    }
                }
            });
        } catch(\Exception $e) {

        }
    }
}
