<?php

namespace App\Http\Controllers\Backend;

use App\Modules\BaseModule;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public  function __construct()
    {
        //todo: filter modules based on current user's capabilities
        $modules = BaseModule::get_all_modules();
        view()->share(['backend_modules' => $modules]);
    }
}
