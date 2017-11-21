<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class IsEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //check user is logged in
        if(Auth::check()){
            $user = Auth::user();
            //check email is verified
            //when email system is set up then remove "!" in  the if clause 
            if(!$user->is_verified){
                return $next($request);
            }
            Auth::logout();
            return redirect()->route('login')->with('type','warning')->with('msg','Your email is not verified yet! Verify your email first.')->with('user',$user);
        }
        return redirect()->route('login')->with('type','warning')->with('msg','Login first to proceed');
        
    }
}
