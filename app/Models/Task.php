<?php

namespace App\Models;

use App\Events\TaskCreated;
use App\Events\TaskPicked;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $application
 * @property mixed $user
 */
class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'application_id', 'name', 'user_id', 'assigned_at', 'expires_at', 'completed_at', 'status'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function create_task($application_id, $task_name, $stage, $status)
    {
        $task = new self([
            'application_id' => $application_id,
            'name' => $task_name,
            'status' => $status,
            'stage' => $stage,
        ]);
        $task->save();

        event(new TaskCreated($task->first()));

        return $task;
    }

    /*
     * Filter tasks for a specific module
     *
     */
    public function scopeModule($query, $module)
    {
        return $query->whereHas('application', function ($q) use ($module){
            $q->where('applications.module_slug', $module);
        });
    }


    public function scopeMyTasks($query, User $user = null)
    {
        return $query->where('tasks.user_id', $user ? : user()->id);
    }

    public function scopeQueued($query)
    {
        return $query->whereNull('tasks.user_id')->whereNull("tasks.assigned_at");
    }

    public function scopeInCorrections($query)
    {
        return $query->where('tasks.status','corrections');
    }

    public function scopeCompleted($query)
    {
        return $query->whereNotNull("tasks.completed_at");
    }

    public function scopeProcessing($query)
    {
        return $query->whereNotNull("tasks.completed_at")->whereNotNull('tasks.user_id');
    }

    public function scopeHasAccess($query, User $user)
    {
        //todo: only get tasks for applications where user has access rights
        return $query;
    }

    public static function pick_task($task_id  = null)
    {
        $task  = null;

        \DB::transaction(function () use (&$task, $task_id) {
            $task  = self::query()
                ->queued()
                ->hasAccess()
                ->orderBy('applications.submitted_at','ASC')
                ->first();

            if($task){
                $task->user_id  = user()->id;
                $task->assigned_at  = Carbon::now();
                $task->save();

                event(new TaskPicked($task));
            }

            return $task;
        });

        return $task;
    }

}
