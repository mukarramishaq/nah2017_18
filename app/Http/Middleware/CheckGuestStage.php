<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\Stage;
use App\User;

class CheckGuestStage
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
                if(!$stage->is_personal_info_done){
                    return redirect()->route('personalInformation');
                }
                if(!$stage->is_educational_info_done){
                    return redirect()->route('educationalInformation');
                }
                if(!$stage->is_professional_info_done){
                    return redirect()->route('professionalInformation');
                }
                if($stage->is_guest_info_done){
                    return redirect()->route('resident');
                }
                return $next($request);
            }
            else{
                $stage = Stage::create(array(
                    'user_id'=>$user->id,
                ));
                Auth::logout();
                return redirect()->route('login')->with('type','danger')->with('msg',"Don't try to be smart! Otherwise the consequences will not be light!");
            }
        }
        else{
            return redirect()->route('login')->with('type','warning')->with('msg','Session Expired. Login agian to proceed');
        }
    }
}
