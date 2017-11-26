<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckResidentStage
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
        if(Auth::check()){
            $user = Auth::user();
            $stage = $user->stage()->get();
            if($stage && count($stage)>0){
                $stage = $stage[0];
                
                if(!$stage->is_guest_info_done){
                    return redirect()->route('guestsInfo');
                }
                
                if(!$stage->is_residence_done){
                    // return redirect()->route('chalanMethod');
                    return $next($request);
                }
                else if($stage->is_residence_done && $stage->is_payment_method_done){
                    $payment = $user->payment()->get();
                    if($payment && count($payment)>0){
                        $payment = $payment[0];
                        if($payment->resident == 'pakistani'){
                            return redirect()->route('paymentMethod');
                        }
                        else if($payment->resident == 'overseas'){
                            return redirect()->route('overseasMethod');
                        }
                    }

                    $stage->is_residence_done=false;
                    $stage->is_payment_method_done=false;
                    $stage->save();
                    return redirect()->route('resident');
                    
                    
                }
                else{
                    $stage->is_residence_done=false;
                    $stage->is_payment_method_done=false;
                    $stage->save();
                    return redirect()->route('resident');
                }
                
            }
            else{
                Auth::logout();
                //return $next($request);
                return redirect()->route('login')->with('type','warning')->with('msg','Your account was logged out due to your smartness :) Please login again to proceed');
            }
        }
        else{
            return redirect()->route('login')->with('type','warning')->with('msg','Session Expired. Login agian to proceed');
        }
    }
}
