<?php

namespace App\Http\Controllers\Auth;

use Auth;
use \App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SsoController extends Controller
{
    /**
     * Redirect to sso authorize url
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function ssoRedirect(Request $request)
     {
         $url = config('app.sso_authorize_url') . '?' . http_build_query(
                 ['return_url' => route('auth.sso_authorize')]);
         return redirect($url);
     }

     /**
     * Authorize a single-signon login request
     *
     * @param  Request $request
     * @return mixed
     */
    public function authorizeSso(Request $request)
    {
        // verify the signature
        $data = json_decode(base64_decode($request->get('data')), true);

        // invalid response received
        if(!$data)
            return reponse('Toka hapa', 403);
        
        // validate response data
        $v = \Validator::make($data, [
            'email' => "required",
            'id_number' => "required",
            'first_name' => "required",
            'last_name' => "required",
            'mobile_number' => "required",
            'account_type' => "required",
            'at' => "required",
            'signature' => "required"
        ], [ /* todo: add custom messages */]);
        

        if($v->fails()){ 
            //validation failed
            return reponse('Toka hapa', 403);
        }else{
            // validate signature
            $signature = $data['signature'];
            unset($data['signature']);

            $user = User::get_by_username($data['email']);

            // hurray, user found, else create a new user
            if (!$user){
                // user was not found, create one
                $user = User::create([
                    'id_number' => $data['id_number'],
                    'id_type' => $data['account_type'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'surname' => $data['other_name'],
                    'email' => $data['email'],
                    'phone_number' => $data['mobile_number'],
                    'gender' => $data['gender'],
//                    'dob' => $data['dob'],
                    'password' => str_random(7)
                ]);
            }

            // finally login user
            Auth::loginUsingId($user->id);

            return redirect()->route('home');
        }

        
    }
 
}
