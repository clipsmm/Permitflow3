<?php

namespace App\Models;

use Caffeinated\Modules\Facades\Module;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Application extends Model
{
    const DRAFT = 'draft';

    protected $fillable = ['application_number', 'form_data', 'module_slug', 'status', 'submitted_at', 'in_corrections' ];

    protected $casts = [
        'form_data' => 'array',
    ];

    public function getModuleAttribute()
    {
        return Module::where('slug', $this->module_slug);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function corrections()
    {
        return $this->hasMany(ApplicationCorrection::class);
    }

    public function activeCorrection()
    {
        return $this->corrections()->whereCompletedAt(null)->first();
    }

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
    
    public function updateFormData($data){
        $this->form_data = array_merge($this->form_data, $data);
        $this->save();
    }

    public function isEditable(){
        return in_array($this->status, [self::DRAFT]);
    }

    public function submit()
    {
        $this->submitted_at = Carbon::now();
        $this->in_corrections = false;
        $this->save();
    }

}
