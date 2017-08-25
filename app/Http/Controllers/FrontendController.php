<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Invoice;
use Caffeinated\Modules\Facades\Module;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $modules  =  Module::enabled()->map(function($item){
            return (object)$item;
        });

        return view('frontend.index', [
            'modules' => $modules
        ]);
    }
}
