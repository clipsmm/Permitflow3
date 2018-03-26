<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAuthController extends Controller
{

    public function login(Request $request)
    {
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt(['email' => $request->username, 'password' => $request->password])) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        $user = User::whereEmail($request->username)->first();
        return response()->json(['token' => $token, 'user' => $user, 'user_modules' => $user->modules()]);
    }
}
