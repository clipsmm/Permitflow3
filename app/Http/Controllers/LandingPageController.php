<?php

namespace App\Http\Controllers;

use App\Modules\BaseModule;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $landing_page  = settings('landing_page');

        if(!$landing_page)
            return view('welcome');

        return BaseModule::instance_from_slug($landing_page)->get_landing_page();
    }

    public function faq()
    {
        return view('faq');
    }

    public function eligibility()
    {
        return view('eligibility');
    }
}
