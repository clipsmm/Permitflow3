<?php

namespace Modules\EVisa;


use App\Models\Task;

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

            $task->complete  =  true;
            $task->comments = $comments;
            $task->status  = 'rejected';
            $task->save();

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

            $task->complete  =  true;
            $task->comments = $comments;
            $task->status  = 'corrections';
            $task->save();

            $application->status  = 'corrections';
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

            $task->complete  =  true;
            $task->status  = 'approved';
            $task->save();

            $application->status  = 'corrections';
            $application->save();
        });

        return $task;
    }
}