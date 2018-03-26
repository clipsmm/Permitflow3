<?php

namespace Modules\Evisa\Listeners;

use App\Events\ApplicationSubmitted;
use App\Events\PaymentCompleted;
use App\Models\Task;
use Modules\EVisa;

class EvisaApplicationSubmittedHandler
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ApplicationSubmitted  $event
     * @return void
     */
    public function handle(PaymentCompleted $event)
    {
        ///create passport review task
        $application =  $event->payment->invoice->application;
        Task::create_task($application->id, array_get(Evisa::getVisaTypes(), $application->get_data('visa_type')),'review','pending');
    }
}