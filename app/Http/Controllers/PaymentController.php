<?php

namespace App\Http\Controllers;

use App\Models\Payment;
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

        $p = Payment::add_payment($request->bill_ref, $request->payment_ref, $request->amount, 'pending', []);

        if (!$p){
            return response()->json([
                'status' => 'fail'
            ], 430);
        }

        return response()->json($p, 200);

    }


}
