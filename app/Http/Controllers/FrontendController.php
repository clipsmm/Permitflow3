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

    public function loadApplicationCheckout(Request $request, $module_slug, Application $application, Invoice $invoice)
    {
        $checkout_data = get_pesaflow_checkout_data_from_invoice($invoice);

        return view('frontend.checkout', [
            'data' => $checkout_data,
            'module' => $module_slug,
            'application' => $application
        ]);
    }
}
