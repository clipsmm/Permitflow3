<?php

namespace App\Models;

use App\Modules\BaseModule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Vinkla\Hashids\Facades\Hashids;

class Application extends Model
{
    const DRAFT = 'draft';

    protected $fillable = ['application_number', 'form_data', 'module_slug', 'status', 'submitted_at', 'in_corrections'];

    public static function insertRecord($module, $data, User $user)
    {
        $application = new self(['module_slug' => $module->slug, 'application_number' => self::generateApplicationNumber($module)]);
        $application->form_data = $data;
        $application->user()->associate($user)
            ->save();

        return $application;
    }

    public static function generateApplicationNumber($module)
    {
        return implode("-", [$module->prefix, Hashids::encode($module->getUpdatedCounter())]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        self::saving(function ($app) {
            $form_data = [];

            foreach ($app->form_data as $key => $value) {
                if ($value instanceof UploadedFile) {
                    $value = $app->saveUpload($value, $key);
                }
                $form_data[$key] = $value;
            }

            $app->attributes['form_data'] = json_encode($form_data);
        });
    }

    public function saveUpload(UploadedFile $upload, $field_name)
    {
        $name = implode("_", [$this->application_number, $field_name]);
        $path = $upload->storeAs('applications', hash('md5', $name) . '.' . $upload->guessExtension());
        return ['file_name' => $upload->getClientOriginalName(), 'path' => $path];
    }

    public function scopeSubmitted($query)
    {
        return $query->whereNotNull('submitted_at');
    }

    public function scopeForModule($query, $module)
    {
        return $query->whereModuleSlug($module);
    }

    public function scopeByApplicationNumber($query, $number)
    {
        return $query->where('application_number', 'ilike', trim($number));
    }

    public function getModuleAttribute()
    {
        return BaseModule::instance_from_slug($this->module_slug);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'application_id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'application_id');
    }

    public function outputs()
    {
        return $this->hasMany(ApplicationOutput::class, 'application_id');
    }

    public function activeCorrection()
    {
        return $this->corrections()->whereCompletedAt(null)->first();
    }

    public function corrections()
    {
        return $this->hasMany(ApplicationCorrection::class);
    }

    public function updateFormData($data)
    {
        $this->form_data = array_merge($this->form_data, $data);
        $this->save();
    }

    public function isEditable()
    {
        return in_array($this->status, [self::DRAFT]);
    }

    public function canBeDeleted()
    {
        return $this->status == self::DRAFT;
    }

    public function getActions()
    {
        return $this->module->getApplicationActions($this);
    }

    public function submit()
    {
        $this->submitted_at = Carbon::now();
        $this->in_corrections = false;
        $this->save();
    }

    public function get_data($key, $default = null)
    {
        return array_get($this->form_data, $key, $default);
    }

    public function getFormDataAttribute($form_data)
    {
        if(is_array($form_data)){
            return $form_data;
        }
        return json_decode($form_data, true);
    }

    public function add_output($code, $task_id)
    {
        return ApplicationOutput::add_application_output($this->id, $code, $task_id);
    }

}
