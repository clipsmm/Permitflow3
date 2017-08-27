<?php

namespace App\Listeners;

use App\Events\PaymentCompleted;
use App\Mail\DefaultMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentCompletedHandler
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PaymentCompleted  $event
     * @return void
     */
    public function handle(PaymentCompleted $event)
    {
        $payment  = $event->payment->load(['invoice', 'invoice.application', 'invoice.application.user']);
        $invoice =  $payment->invoice;
        $application  = $invoice->application;
        $user = $application->user;

        send_sms($user->phone, "Hi {$user->first_name}, Your payment of KES {$invoice->amount} has been received successfully and is being processed");
        \Mail::to($user)
            ->send(new DefaultMail('emails.payment_completed', [
                'invoice' => $invoice,
                'user' => $user,
                'application' => $application,
                'payment' => $payment
            ]));
    }
}
