<?php

namespace App\Models;

use App\Events\ApplicationSubmitted;
use App\Events\PaymentCompleted;
use App\Events\PaymentReceived;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'bill_ref', 'payment_ref', 'extra', 'status'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'bill_ref', 'bill_ref');
    }

    public static function add_payment($bill_ref, $payment_ref, $amount, $status, array $extra  = [])
    {
        $payment = new self([
            'bill_ref' => $bill_ref,
            'payment_ref' => $payment_ref,
            'channel' => 'pesaflow',
            'amount' => $amount,
            'extra' => $extra,
            'status' => $status
        ]);

        $payment->save();

        event(new PaymentReceived($payment));
        return $payment;
    }

    public function process_payment()
    {
        $invoice =  $this->invoice;
        $application  = $invoice->application;


        if ($this->amount  == $invoice->amount && $invoice->status != 'paid'){
            //lets complete this payment
            $payment  = $this;
            \DB::transaction(function() use (&$payment, &$invoice, &$application){
                $payment->status  = 'complete';
                $payment->save();

                $invoice->status =  'paid';
                $invoice->date_paid  = Carbon::now();
                $invoice->save();

                event(new PaymentCompleted($payment));

                //finally submit the application
                $application->status = 'review';
                $application->save();

                event( new ApplicationSubmitted($application));
            });
        }else{

        }
    }
}
