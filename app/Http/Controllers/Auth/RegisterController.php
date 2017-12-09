<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Jobs\SendEmail;
use App\Mail\SignupConfirmation;
use App\PersonalI;
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            // 'g-recaptcha-response'=>'required|recaptcha'
        ]);
    }
    
    public function register2ER($pin){
    	if($pin == 11101){
    		return view('auth.register2');
    	}
    	else{
    		return redirect()->route('register');
    	}
    
    }


    public function resendVerificationEmail($userId,$email){
        $user = User::where('email',$email)->where('id',$userId)->first();
        if($user){
            SendEmail::dispatch(new SignupConfirmation($user->email,$user));
            return redirect()->route('login')->with('type','info')->with('msg','Confirmation email sent! Check Spam/Junk folders. If not received contact us');
        }
        else{
            return redirect()->route('login')->with('type','danger')->with('msg','User not found!');
        }
    }

   
    public function verifyEmail($email,$verification_code){
        //confirm the email
        $user = User::where('email',$email)
            ->where('verification_code',$verification_code)->first();
        if($user){
            
            $user->is_verified = true;
            $user->verification_token = NULL;
            $user->save();
            
            return redirect()->route('login')->with('type','success')->with('msg','Email verified! Please login to proceed');
        }
        else{
            //
            return redirect()->route('NotFound');
        }
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
    	$is_byus = false;
    	if(array_key_exists('is_byus',$data) && $data['is_byus'] == 'true'){
    		$is_byus = true;
    	}
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verification_token'=>str_random(30),
            'is_byus'=>$is_byus,
        ]);
        \Log::info(\Request::ip());

        $personalI = PersonalI::create(array(
            'user_id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
        ));

        //SendEmail::dispatch(new SignupConfirmation($user->email,$user));

        return $user;

    }
}
