<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('welcome');
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
