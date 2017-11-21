<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

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

    public function authenticateLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email',$email)->first();

        //if email found in database 
        if($user){
            //check password match
            if(Hash::check($password,$user->password)){
                //now check email is verified or not
                if($user->is_verified == true){
                    //generate sesssion
                    Auth::login($user);
                    return redirect($this->redirectTo);
                }
                else{
                    //email is not verified
                    return redirect()->route('login')->with('type','error')->with('msg','Email is not verified yet!')->with('user',$user);
                }
            }
            else{
                //password does not match
                return redirect()->route('login')->with('type','error')->with('msg','Incorrect password');
            }
        }
        else{
            return redirect()->route('login')->with('type','error')->with('msg',"This email '$email' is not registered. Please register first.");
        }
    }

}
