<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Guest;
use App\Payment;
use App\Price;

class GuestController extends Controller
{
    //

    public function index(Request $request){
        $user = Auth::user();
        if($user){
            $guests = $user->guest()->get();
            $price = Price::where('id',1)->first();
            // if(!$guests || count($guests)<1){
            //     $guests = (array) array(
            //         new Guest,
            //     );  
            // }
            \Log::info($guests);
            return view('guest')->with('guests',$guests)->with('price',$price);

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
            $data = (object) array(
                'user_id'=>$user->id,
                'name'=>$request->input('guestName'),
                'contact_no'=>$request->input('guestContact'),
                'relation'=>$request->input('guestRelation')
            );
            $data = (array) $data;
            $guest = Guest::create($data);
            return redirect()->route('guestsInfo');
        }
        else
        {
            return redirect()->route('login')->with('type','danger')->with('msg','Session expired. Login to continue');
            
        }

    }

    public function removeGuest(Request $request, $id)
    {
        $user = Auth::user();
        if($user)
        {
            $guest = Guest::where('user_id',$user->id)->where('id',$id)->first();
            if(count($guest)>0)
            {
                $guest->delete();
                return redirect()->route('guestsInfo');
    
            }
            else{
                return redirect()->route('guestsInfo')->with('type','danger')->with('msg','Could not  delete Guest Information.');
                
            }
        }
        else
        {
            return redirect()->route('login')->with('type','danger')->with('msg','Session expired. Login to continue');
            
        }
    }

    public function saveAndNext(Request $request){
        $user = Auth::user();
        if($user){
            $stage = $user->stage()->get();
            if($stage && count($stage)>0){
                $stage = $stage[0];
                $stage->is_guest_info_done = true;
                $stage->save();

                return redirect()->route('resident')->with('type','success')->with('msg','Guests data saved successfully');
            }
            else{
                return redirect()->route('professionalInformation')->with('type','warning')->with('msg','Some fields missing');
            }
        }
        else{
            return redirect()->route('login')->with('type','danger')->with('msg','Session expired. Login to continue');
        }
    }


}
