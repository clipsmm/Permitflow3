<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Application extends Model
{
    protected $fillable = ['application_number', 'form_data', 'module_id', 'status'];

    protected $casts = [
        'form_data' => 'array',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function insertRecord($module, $data, $user)
    {
        $application = new self(['form_data' => $data, 'application_number' => self::generateApplicationNumber($module)]);
        $application->user()->associate($user)
            ->module()->associate($module)
            ->save();

        return $application;
    }

    public static function generateApplicationNumber($module)
    {
        return implode("-", [$module->prefix, Hashids::encode($module->getUpdatedCounter())]);
    }
}
