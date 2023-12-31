<?php

namespace Modules\EVisa;


use App\Mail\DefaultMail;
use App\Models\Correction;
use App\Models\Task;
use Carbon\Carbon;
use Modules\EVisa\Models\Visa;

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
                $current_correction->complete();

                $application->in_corrections  =  false;
            }

            $application->complete  =  true;
            $application->status  = 'rejected';
            $application->save();

            \Mail::to($application->user)
                ->send(new DefaultMail('e-visa::emails.application_rejected', [
                    'application' => $application
                ]));
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
            $application->status  = 'corrections';
            $application->save();

            \Mail::to($application->user)
                ->send(new DefaultMail('e-visa::emails.application_corrections', [
                    'application' => $application
                ]));
        });

        return $task;
    }

    public function approve_application()
    {
        $task = $this->task;
        $download  = null;
        \DB::transaction(function() use (&$task, &$download){
            $application  =  $task->application;

            $task->completed_at  =  Carbon::now();
            $task->status  = 'approved';
            $task->save();

            // if application was in corrections, complete the task
            if($application->in_corrections){
                $current_correction = $task->current_correction;
                $current_correction->complete();

                $application->in_corrections  =  false;
            }

            $application->complete  =  true;
            $application->status  = 'issued';
            $application->save();

            Visa::createFromApplication($application);

        });

        $application =  $task->application;

        # generate output
        //todo: generate pdf outside the current process..hehe
        $download = $application->add_output('EVISA-OUTPUT', $task->id, true);

        \Mail::to($application->user)
            ->send(new DefaultMail('e-visa::emails.application_approved', [
                'application' => $application
            ], [
                ['name' => $download->get_file_name(), 'file' => $download->path]
            ]));

        return $task;
    }
}