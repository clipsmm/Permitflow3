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

        $this->validate($request, [
            'trx_ref' => "required|unique:payments,payment_ref",
            "bill_ref" => "required",
            "amount" => "required"
        ]);

        $p = Payment::add_payment($request->bill_ref, $request->trx_ref, $request->amount, 'pending', []);

        if (!$p){
            return response()->json([
                'status' => 'fail'
            ], 430);
        }

        return response()->json($p, 200);

    }


}
