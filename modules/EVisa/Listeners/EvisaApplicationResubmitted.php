<?php

namespace Modules\Evisa\Listeners;

use App\Events\ApplicationResubmitted;
use App\Events\ApplicationSubmitted;
use App\Events\PaymentCompleted;
use App\Models\Task;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EvisaApplicationResubmitted
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
    public function handle(ApplicationResubmitted $event)
    {
        $application =  $event->application;

        //change current task from corrections to review
        $task =  $application->current_task;
        $task->status = 'review';
        $task->save();

    }
}