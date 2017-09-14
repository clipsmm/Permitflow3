<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\DefaultMail;
use App\Models\LoginToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        login as parentLogin;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/frontend';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if($request->has('magic-login')){
            $this->validate($request, [
                'email' => ['required', 'email', 'exists:users']
            ], ['email.exists' => 'Email does not exist']);

            $user = User::whereEmail($request->email)->first();
            $this->sendLoginLink($user);
            $expiry = config('auth.token_expiry', 15);

            return redirect()->back()->with(['link-sent' =>  "A login link has been sent to {$user->email}.
             Use it to login to your account. Note that the link expires after {$expiry} minutes"]);
        }

        return $this->parentLogin($request);
    }

    private function sendLoginLink($user){
        $token = LoginToken::generate($user);
        Mail::to($user)->send(new DefaultMail('emails.token-login', ['token' => $token->token]));
    }

    public function tokenLogin(Request $request)
    {
        $_token = $request->route('token');
        $token = LoginToken::whereToken($_token)->whereUsed(false)->with(['user'])->first();
        if(is_null($token)){
            abort(Response::HTTP_UNAUTHORIZED, 'Invalid Token');
        }

        if(Carbon::now() > $token->created_at->addMinutes(config('auth.token_expiry', 15))){
            abort(Response::HTTP_UNAUTHORIZED, 'Token Expired');
        }

        auth()->login($token->user);

        $token->update(['used' => true]);

        return redirect()->intended();
    }
}
