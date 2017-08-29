<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Invoice;
use App\Modules\BaseModule;
use Caffeinated\Modules\Facades\Module;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $applications = user()->applications()->whereInCorrections(false)->limit(5)->with(['current_invoice'])->get();
        $corrections = user()->applications()->whereInCorrections(true)->limit(5)->with(['current_invoice'])->get();
        return view('frontend.dashboard', compact('applications', 'corrections'));
    }


    public function services()
    {
        return view('frontend.services');
    }
}
