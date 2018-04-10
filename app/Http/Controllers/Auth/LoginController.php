<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function username()
    {
        return 'nric';
    }

	public function credentials(Request $request)
    {
    return [
        'nric' => $request->nric,
        'password' => $request->password,
        'verified' => 1,
    ];
    }
    
    
    
    public function login(Request $request)
    {
        $this->validateLogin($request);
       
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);

       $nric=Input::get('nric');

 if ($this->guard()->attempt($credentials)) {

if(Auth::user()->nric ==$nric)
            {
                return redirect()->intended('/home');
            }
            else
            {
          Session::flush();
            return Redirect::to('/')->with('status', 'NRIC/Passport.No is case sensitive.');
            }   

        }
        else{
             return Redirect::to('/')->with('status', 'NRIC/Passport.No or Password does not match');
        }
    }
	
}
