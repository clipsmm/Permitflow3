<?php

namespace App\Models;

use App\Events\TaskCreated;
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

    public static function create_task($application_id, $task_name, $status)
    {
        $task = new self([
            'application_id' => $application_id,
            'name' => $task_name,
            'status' => $status
        ]);
        $task->save();

        event(new TaskCreated($task->first()));

        return $task;
    }

}
