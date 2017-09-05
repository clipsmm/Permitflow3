<?php

namespace App\Models;

use Storage;
use File;
use PDF;
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
    protected $fillable = [ 'application_id', 'code', 'task_id','path' ];

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
    public static function add_application_output($application_id, $code, $task_id, $save = false)
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

        if($save)
            $application_output->generate_pdf($save);


        event(new ApplicationOuputCreated($application_output));

        return $application_output->refresh();
    }

    public function get_file_name()
    {
        return $this->application->application_number."-".$this->output->name;
    }

    public function getRawPathAttribute()
    {
        return "public/{$this->application->module_slug}/outputs/{$this->get_file_name()}.pdf";
    }

    /**
     * Generate html string for output
     *
     * @return string
     */
    public function compile_output()
    {
        $this->load(['application', 'task', 'task.user']);
        $output_data = $this->application->module->loadOutputData($this);
        $html = app('blade-extensions')->compileString($this->output->template, array_merge(['application' => $this->application,  'task' => $this->task], $output_data));

        return $html;
    }

    /**
     * @param bool $save
     * @return PDF
     */
    public function generate_pdf($save = false)
    {
       $pdf =  PDF::loadHtml($this->compile_output());
       if($save){
           $pdf_file = storage_path("{$this->raw_path}");

           # output has already been generated and saved, skip and return the file
           if (file_exists($pdf_file)) {
               //return $pdf;
           }

           if (!is_dir($pdf_file)) {
               File::makeDirectory(dirname($pdf_file), 0777, true, true);
           }

           $pdf->save($pdf_file);

           $this->path  = $this->raw_path;
           $this->save();
       }

       return $pdf;
    }


    public function get_full_path()
    {
        return storage_path($this->path);
    }

    /**
     *  WARNING!!! This is beta, its not even working (hahaha)
     * @return string
     */
    public function get_file_url()
    {
        return asset("storage/{$this->path}");
    }

}
