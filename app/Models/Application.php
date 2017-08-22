<?php

namespace App\Models;

use Caffeinated\Modules\Facades\Module;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Application extends Model
{
    protected $fillable = ['application_number', 'form_data', 'module_slug', 'status'];

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

    public static function insertRecord($module, $data, User $user)
    {
        $application = new self(['form_data' => $data, 'module_slug' => $module->slug, 'application_number' => self::generateApplicationNumber($module)]);
        $application->user()->associate($user)
            ->save();

        return $application;
    }

    public static function generateApplicationNumber($module)
    {
        return implode("-", [$module->prefix, Hashids::encode($module->getUpdatedCounter())]);
    }
}
