<?php

/*
 * All payment related settings
 *
 */

return array(
    /*
     * Default payment manager. Options: 'pesaflow'
     */
    'default' => env('PAYMENT_DRIVER','pesaflow'),

    'managers' => [
        'pesaflow' => [

            /*
             * Indicates the allowed currencies
             */
            'currencies'=>['KES','USD'],

            /*
             * Sets the default currency, can be changed at runtime
             */
            'currency'=>'KES',

            'url'=>env('PESAFLOW_IFRAME_URL'),

            'apiClientId'=>env('PESAFLOW_CLIENT_ID'),
            'apiKey'=>env('PESAFLOW_KEY','key'),
            'apiServiceId'=>env('PESAFLOW_SERVICE_ID'),
            'apiSecret'=>env('PESAFLOW_SECRET','secret'),

            /*
             * IPN endpoint
             */
            'ipn_endpoint' => env('APP_URL').'/api/payment-notification'
        ]
    ]
);