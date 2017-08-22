<?php

namespace App\Libs;

/*
 * Payment manager handler
 *
 */

class  PaymentManager  {
    public $config;


    public function __construct()
    {
        $this->config = config('payment');
    }

    public static function get_default_manager()
    {
        return config('payment.default');
    }

    public static function get_default_manager_settings($key = null)
    {
        $config  =  config('payment');
        try {
            $default  =  $config['managers'][self::get_default_manager()];

            if ($key)
                return $default[$key];

            return $default;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }


}