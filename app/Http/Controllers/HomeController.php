<?php

namespace App\Http\Controllers;

use App\Modules\BaseModule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landing_page  = settings('landing_page');

        dd($landing_page);
        if(!$landing_page)
            return view('home');

        return BaseModule::instance_from_slug($landing_page)->get_landing_page();
    }


}
