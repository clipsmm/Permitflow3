<?php

namespace App\Providers;

use App\Modules\BaseModule;
use Illuminate\Http\UploadedFile;
use \Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadModules();

        Validator::extend('fileUpload', function ($attribute, $value, $params, $validator) {
            return $this->uploadValidator($attribute, $value, $params, $validator);
        });

        Validator::extend('full_phone', function ($attribute, $value, $parameters, $validator) {
            try {
                //ensure phone number is numeric
                //if (!is_numeric($value)) return false;
                $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
                $phone  =  $phoneUtil->parse($value, 'KE');

                return $phoneUtil->isValidNumber($phone);
            } catch (\Exception $ex) {
                return false;
            }
        });
        /**
         * Validate no special characters
         */
        \Validator::extend('title', function($attribute, $value, $parameters, $validator) {
            return !preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $value);
        });
    }

    public function loadModules()
    {
        $active_modules = BaseModule::get_enabled_modules();
        $all_modules = BaseModule::get_all_modules();
        view()->share(['all_modules' => $all_modules]);
        view()->share(['active_modules' => $active_modules]);
    }

    private function uploadValidator($attribute, $value, $params, $validator)
    {
        $mimes = explode(' ', array_get($params, '0', []));
        $max = array_get($params, '1', 1048576); //kbytes
        $min = array_get($params, '2', 0); //kbytes
        $valid = true;

        if ($value instanceof UploadedFile) {
            $size = $value->getClientSize() / 1024;

            if ($size >= $max) {
                $validator->errors()->add($attribute, "Maximum upload size is " . ceil($max / 1024) . " MB");
                $valid = false;
            }

            if ($size < $min) {
                $validator->errors()->add($attribute, "Minimum upload size is " . ceil($min / 1024) . ' MB');
                $valid = false;
            }

            if (!in_array($value->guessExtension(), $mimes)) {
                $validator->errors()->add($attribute, "File must be of type " . implode(' ', $mimes));
                $valid = false;
            }
        } else if (is_null($value)) {
            $valid = true;
        } else if (is_null($value['path'])) {
            $validator->errors()->add($attribute, "Invalid value");
            $valid = false;
        }

        return $valid;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
