<?php

namespace App\Http\Controllers\Auth;

use DB;
use Mail;
use Session;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\User;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Validator;
use Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;


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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
            'name' => 'required|max:255',
            'nric' => 'required|max:12|unique:users',
            'email' => 'required|email|max:100',
           'password' => [
               'required'
               ,'min:8'
               ,'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'
               ,'confirmed'],
            'password_confirmation' => 'required|same:password'   
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
        'nric' => $data['nric'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => str_random(10),
        'user_type' => $data['user_type'],
        ]);
    }
    
/**
*  Overwriting the register method from the "RegistersUsers" trait
*  Remember to take care while upgrading laravel
*/
    public function register(Request $request)
{
    // Laravel validation
    $validator = $this->validator($request->all());
    if ($validator->fails())
    {
        $this->throwValidationException($request, $validator);
    }

    DB::beginTransaction();
    try
    {
        $user = $this->create($request->all());
        $user->roles()->attach(2);
       
        // After creating the user send an email with the random token generated in the create method above
       // $email = new EmailVerification(new User(['email_token' => $user->email_token]));
        $email = new EmailVerification($user,$request->password);
        Mail::to($user->email)->send($email);
        DB::commit();
        Session::flash('message', 'We have sent you a verification email.Please check your email and verify it.');
        //return redirect('/home');
        
         return redirect('/register')->with('status','We have sent you a verification email.Please check your email and verify it');
    }
    catch(Exception $e)
    {
        DB::rollback();
        return back();
    }
}

    // Get the user who has the same token and change his/her status to verified i.e. 1
    public function verify($token)
    {
       // The verified method has been added to the user model and chained here
       // for better readability
       /*User::where('email_token', $token)->firstOrFail()->verified();

       Session::flash('success', 'The post sucessfull');
       return redirect('/');*/

       $user = User::where ('email_token',$token)->first();

       if(!is_null($user)){
        $user->verified = 1;
        $user->email_token = '';
        $user->save();
        return redirect('/')->with('status','Your activation is completed.');

       }

       return redirect('/')->with('status','Your account has been activated.Please login');
    }


    public function checkEmail(Request $request){
    $email = $request->input('email');
    $isExists = \App\User::where('email',$email)->first();
    if($isExists){
        return response()->json(array("exists" => true));
    }else{
        return response()->json(array("exists" => false));
    }
}


 public function checkNric(Request $request){
    $nric = $request->input('nric');
    $isExists = \App\User::where('nric',$nric)->first();
    if($isExists){
        return response()->json(array("exists" => true));
    }else{
        return response()->json(array("exists" => false));
    }
}

}
