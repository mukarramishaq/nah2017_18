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
                
                if(!$stage->is_professional_info_done){
                    return redirect('professionalInformation');
                }
                
                if(!$stage->is_residence_done){
                    // return redirect('chalanMethod');
                    return $next($request);
                }
                else if($stage->is_residence_done && $stage->is_payment_method_done){
                    return redirect('paymentMethod');
                }
                else{
                    $stage->is_residence_done=false;
                    $stage->is_payment_method_done=false;
                    $stage->save();
                    return redirect('resident');
                }
                
            }
            else{
                Auth::logout();
                //return $next($request);
                return redirect('login')->with('type','warning')->with('msg','Your account was logged out due to your smartness :) Please login again to proceed');
            }
        }
        else{
            return redirect('login')->with('type','warning')->with('msg','Session Expired. Login agian to proceed');
        }
    }
}
