<?php

namespace App\Http\Controllers;

use App\Modules\BaseModule;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        //load current module for views
        if($module  = $this->is_a_module_route()){
            if ($module){
                view()->share('current_module', BaseModule::instance_from_slug($module->slug));
            }

        }
    }

    private function is_a_module_route()
    {
        $result = null;

        BaseModule::get_enabled_modules()->each(function ($module)use (&$result){
            if(request()->is("*{$module->slug}*"))
                $result = $module;
        });

        return $result;

    }
}
