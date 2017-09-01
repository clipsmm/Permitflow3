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
    const PENDING = 'pending';
    const TEMPORARY = 'temporary';

    protected $fillable = ['application_number', 'form_data', 'module_slug', 'status', 'submitted_at', 'in_corrections'];

    public static function insertRecord($module, $data, User $user, $status = self::DRAFT)
    {
        $application = new self(['module_slug' => $module->slug, 'status' => $status, 'application_number' => self::generateApplicationNumber($module, $user)]);
        $application->form_data = $data;
        $application->user()->associate($user)
            ->save();

        return $application;
    }

    public static function generateApplicationNumber($module, $user)
    {
        $last_id = self::latest('id')->pluck('id')->first();
        $last_id = is_null($last_id) ? 0 : $last_id;
        $num = $last_id + time() + $user->id;
        return implode("-", [$module->prefix, Hashids::encode($num)]);
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
                $form_data[$key] = $app->processValue($key, $value);
            }

            $app->attributes['form_data'] = json_encode($form_data);
        });
    }

    private function processValue($key, $value)
    {
        if ($value instanceof UploadedFile) {
            return $this->saveUpload($value, $key);
        }else if(is_array($value)){
            foreach ($value as $k => $v){
                $value[$k] = $this->processValue($key.'.'.$k, $v);
            }
            return $value;
        }

        return $value;
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

    public function current_invoice()
    {
        return $this->hasOne(Invoice::class, 'application_id')
            ->latest('invoices.created_at');
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
        return in_array($this->status, [self::DRAFT]) || $this->in_corrections;
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

        if($this->status == self::DRAFT){
            $this->status = self::PENDING;
        }

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


    public static function getByHashId($hash_id, $query = null)
    {
        $query = is_null($query) ? self::query() : $query;
        $app_id = \Hashids::decode($hash_id);
        return $query->findOrFail($app_id[0]);
    }


    public function doDelete()
    {
        if($this->module->deleteApplication($this)){
            $this->delete();
            return true;
        };

        return false;
    }
}
