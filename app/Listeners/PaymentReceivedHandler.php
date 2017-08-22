<?php

namespace App\Listeners;

use App\Events\PaymentReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentReceivedHandler
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
     * @param  PaymentReceived  $event
     * @return void
     */
    public function handle(PaymentReceived $event)
    {
        $payment  = $event->payment;

        $payment->load(['invoice','invoice.application','invoice.application.user'])
            ->process_payment();
    }
}
