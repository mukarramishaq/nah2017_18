<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Guest;
use App\Payment;

class GuestController extends Controller
{
    //

    public function index(Request $request){
        $user = Auth::user();
        if($user){
            $guest = $user->guest()->get();
            if($guest && count($guest)>0){
                $guest = $guest[0];
            }
            else{
                $guest = new Guest;
            }

            return view('guest')->with('guest',$guest);

        }
        else{
            return redirect('login')->with('type','danger')->with('msg','Your session is expired. Please login again');
        }
    }

    public function addGuest(Request $request)
    {
        $user = Auth::user();
        if($user)
        {
            
        }

    }


}
