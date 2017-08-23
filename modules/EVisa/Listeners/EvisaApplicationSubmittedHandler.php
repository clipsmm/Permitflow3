<?php

namespace Modules\Evisa\Listeners;

use App\Events\ApplicationSubmitted;
use App\Models\Task;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
    public function handle(ApplicationSubmitted $event)
    {
        //create passport review task
        $application =  $event->application;
        Task::create_task($application->id, "Evisa Review Task",'review','pending');
    }
}