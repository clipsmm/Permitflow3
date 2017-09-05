<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Invoice;
use App\Modules\BaseModule;
use Caffeinated\Modules\Facades\Module;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * FrontendController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $applications = user()->applications()->whereInCorrections(false)->limit(5)->with(['current_invoice'])->get();
        $corrections = user()->applications()->whereInCorrections(true)->limit(5)->with(['current_invoice'])->get();

        //get outputs
        $downloads  = user()->outputs()->with(['application','output'])->get();

        return view('frontend.dashboard', compact('applications', 'corrections','downloads'));
    }


    public function services()
    {
        return view('frontend.services');
    }
}
