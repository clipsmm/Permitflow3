<?php

namespace App\Listeners;

use App\Events\ApplicationResubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class ApplicationResubmittedHandler
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
     * @param  ApplicationResubmitted $event
     * @return void
     */
    public function handle(ApplicationResubmitted $event)
    {
        $correction = $event->application->activeCorrection();
        DB::transaction(function () use (&$correction) {
            $correction->complete();
            $correction->task->completeCorrection($correction);
        });
    }
}
