<?php

namespace App\Http\Controllers\Backend;

use App\Modules\BaseModule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends BaseController
{
    public  function index()
    {
        return view('backend.index');
    }
}
