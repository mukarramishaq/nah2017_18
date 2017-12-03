<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\User;
use App\Stage;
class IsAdmin2
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
        if(Auth::check() && Auth::user()->is_admin == true && Auth::user()->email == 'admin@homecoming.nust.edu.pk'){
            return $next($request);
        }
        else{
            Auth::logout();
            return redirect()->to('login')->with('type','danger')->with('msg','Please login to continue.');
        }
    }
}
