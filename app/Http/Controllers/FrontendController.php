<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Invoice;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
}
