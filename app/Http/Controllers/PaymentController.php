<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function loadCheckout(Request $request)
    {
        return view('payment_checkout',[

        ])->with('page_title', 'Payment Checkout');
    }

    public function paymentSuccess(Request $request)
    {
        return view('payment_success');
    }

    public function paymentNotification(Request $request)
    {
        \Log::info("Payment notification request received => ", $request->all());


    }


}
