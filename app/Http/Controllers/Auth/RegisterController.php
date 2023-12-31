<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_number' => [
                "required_with:id_type",
                "alpha_num",
                Rule::unique('users')->where('id_type',$data['id_type'])
            ],
            'id_type' => 'required|string',
            'first_name' => 'required|alpha|max:255',
            'last_name' => 'required|alpha|max:255',
            'surname' => 'required|alpha|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|phone:AUTO,KE',
            'gender' => 'required|string|in:M,F,other',
            //'dob' => 'required|date',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'id_number' => $data['id_number'],
            'id_type' => $data['id_type'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'gender' => $data['gender'],
            //'dob' => $data['dob'],
            'password' => $data['password']
        ]);
    }
}
