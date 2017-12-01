<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckOnlineMethod
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
        $stage = $user->stage()->get();
        if($stage && count($stage)>0){
            $stage = $stage[0];
            if($stage->is_final_payment_done){
                return redirect('afterPayment');
            }
            else{
                $payment = $user->payment()->get();
                if($payment && count($payment)>0){
                    $payment = $payment[0];
                    if($payment->resident == 'overseas'){
                        return redirect()->route('overseasMethod');
                    }
                    if($payment->payment_method == 'chalan'){
                        return redirect()->route('chalanMethod');
                    }
                    else if($payment->payment_method == 'online'){
                        return  $next($request);
                    }
                    else if($payment->payment_method == 'cod'){
                        return  redirect()->route('codMethod');
                    }
                    else{
                        
                        return redirect()->route('home');
                    }
                }
            }
        }
        

        Auth::logout();
        return redirect()->route('login')->with('type','danger')->with('msg',"Don't try to be smart! Otherwise the consequences will not be light!");

    }
    return redirect()->route('login')->with('type','warning')->with('msg','Login first to proceed');
    }
}
