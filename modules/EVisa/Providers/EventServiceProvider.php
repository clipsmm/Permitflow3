<?php

namespace Modules\EVisa\Providers;

use App\Events\PaymentCompleted;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Evisa\Listeners\EvisaApplicationSubmittedHandler;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        //ApplicationSubmitted::class => [
            //EvisaApplicationSubmittedHandler::class
        //],

        PaymentCompleted::class => [
            EvisaApplicationSubmittedHandler::class
        ]
    ];

    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {

    }
}
