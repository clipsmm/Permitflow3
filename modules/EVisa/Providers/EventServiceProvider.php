<?php

namespace Modules\EVisa\Providers;

use App\Events\ApplicationResubmitted;
use App\Events\ApplicationSubmitted;
use App\Events\PaymentCompleted;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Evisa\Listeners\EvisaApplicationResubmitted;
use Modules\Evisa\Listeners\EvisaApplicationSubmittedHandler;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        //ApplicationSubmitted::class => [
            //EvisaApplicationSubmittedHandler::class
        //],

        PaymentCompleted::class => [
            EvisaApplicationSubmittedHandler::class
        ],
        ApplicationResubmitted::class => [
            EvisaApplicationResubmitted::class
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
