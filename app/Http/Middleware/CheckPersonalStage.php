<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\Stage;
use App\User;
class CheckPersonalStage
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
                if($stage->is_personal_info_done){
                    return redirect()->route('educationalInformation');
                }
                return $next($request);
            }
            else{
                $stage = Stage::create(array(
                    'user_id'=>$user->id,
                ));
                return $next($request);
            }
        }
        else{
            return redirect()->route('login')->with('type','warning')->with('msg','Session Expired. Login agian to proceed');
        }
        
    }
}
