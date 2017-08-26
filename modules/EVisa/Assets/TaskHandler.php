<?php

namespace Modules\EVisa;


use App\Models\Correction;
use App\Models\Task;
use Carbon\Carbon;

class TaskHandler {
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function reject_application($comments)
    {
        $task = $this->task;
        \DB::transaction(function() use (&$task, $comments){
            $application  =  $task->application;

            $task->completed_at  =  Carbon::now();
            $task->comments = $comments;
            $task->status  = 'rejected';
            $task->save();

            // if application was in corrections, complete the task
            if($application->in_corrections){
                $current_correction = $task->current_correction;
                $current_correction->completed_at  = Carbon::now();
                $current_correction->save();

                $application->in_corrections  =  false;
            }

            $application->complete  =  true;
            $application->status  = 'rejected';
            $application->save();

            //todo: fire event here
        });

        return $task;
    }

    public function send_to_corrections($comments)
    {
        $task = $this->task;
        \DB::transaction(function() use (&$task, $comments){
            $application  =  $task->application;

            $task->comments = $comments;
            $task->status  = 'corrections';
            $task->save();

            //add corrections record
            Correction::add_correction($application->id, $task->id, $comments);

            $application->in_corrections  = true;
            $application->save();

            //todo: fire event here
        });

        return $task;
    }

    public function approve_application()
    {
        $task = $this->task;
        \DB::transaction(function() use (&$task){
            $application  =  $task->application;

            $task->completed_at  =  Carbon::now();
            $task->status  = 'approved';
            $task->save();

            // if application was in corrections, complete the task
            if($application->in_corrections){
                $current_correction = $task->current_correction;
                $current_correction->completed_at  = Carbon::now();
                $current_correction->save();

                $application->in_corrections  =  false;
            }

            $application->complete  =  true;
            $application->status  = 'corrections';
            $application->save();
        });

        return $task;
    }
}