<?php

namespace Modules\Evisa\Listeners;

use App\Events\ApplicationSubmitted;
use App\Events\PaymentCompleted;
use App\Models\Task;

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
        Task::create_task($application->id, "Evisa Review Task",'review','pending');
    }
}