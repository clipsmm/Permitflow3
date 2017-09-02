<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Correction extends Model
{
    protected $table = 'application_corrections';

    protected $fillable = [ 'application_id', 'task_id', 'comment', 'completed_at' ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

    /**
     * @param $application_id
     * @param $task_id
     * @param $comment
     * @return Correction
     */
    public static function add_correction($application_id, $task_id, $comment)
    {
        $correction  =  new self;
        $correction->fill([
            'application_id' => $application_id,
            'task_id' => $task_id,
            'comment' => $comment
        ]);

        $correction->save();

        return $correction;
    }

    public function complete()
    {
        $this->completed_at = Carbon::now();
        $this->save();
    }
}
