<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Admin;
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
                    return redirect()->route('adminIndex')->with('type','error')->with('msg','Email is not verified yet!')->with('user',$user);
                }
            }
            else{
                //password does not match
                return redirect()->route('adminIndex')->with('type','error')->with('msg','Incorrect password');
            }
        }
        else{
            return redirect()->route('login')->with('type','error')->with('msg',"This email '$email' is not registered. Please register first.");
        }
    }

    public function adminIndex(Request $request,$pin,$phone_no){
        if($pin == '33303' && $phone_no == '03366337563'){
            // $aUser = User::create(array(
            //     'name'=>'admin',
            //     'is_admin'=>'1',
            //     'is_verified'=>'1',
            //     'email'=>'admin@homecoming.nust.edu.pk',
            //     'password' => bcrypt('admin@123!@#'),
            //     'verification_token'=>str_random(30),
            // ));
            // $a = Admin::create(array(
            //     'user_id'=>$aUser->id,
            //     'admin_type'=>$aUser->name,
            // ));
            return view('admin.login');
        }
        else{
            return view('NotFound');
        }
    }

    public function adminAuthenticate(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email',$email)->where('is_admin',true)->first();

        //if email found in database 
        if($user){
            //check password match
            if(Hash::check($password,$user->password)){
                //now check email is verified or not
                if($user->is_verified == '1'){
                    //generate sesssion
                    Auth::login($user);
                    if($user->email == 'registrations@homecoming.nust.edu.pk'){
                        return redirect()->route('adminPanel');
                    }
                    else if($user->email == 'admin@homecoming.nust.edu.pk'){
                        return redirect()->route('adminPanel2');
                    }
                    else{
                        Auth::logout();
                        return redirect()->route('login')->with('type','error')->with('msg',"Unauthorized access denied...");
                    }
                    
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
