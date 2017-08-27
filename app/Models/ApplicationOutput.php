<?php

namespace App\Models;

use App\Events\ApplicationOuputCreated;
use Illuminate\Database\Eloquent\Model;

class ApplicationOutput extends Model
{
    /**
     * @var string
     */
    protected $table = 'application_outputs';

    /**
     * @var array
     */
    protected $fillable = [ 'application_id', 'code', 'task_id' ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function output()
    {
        return $this->belongsTo(Output::class, 'code', 'code');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    /**
     * @param $application_id
     * @param $code
     * @param $task_id
     * @return ApplicationOutput|null
     */
    public static function add_application_output($application_id, $code, $task_id)
    {
        $output  = Output::whereCode($code)->first();
        if(!$output)
            return null;

        $application_output  =  new self([
            'application_id' => $application_id,
            'code' => $code,
            'task_id' => $task_id
        ]);

        $application_output->save();

        event(new ApplicationOuputCreated($application_output));

        return $application_output;
    }
}
