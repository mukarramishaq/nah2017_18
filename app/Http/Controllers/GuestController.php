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
            $price = Price::where('default',1)->first();
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
    
    public function changeGuestInfo($user_id,$token){
    	if(Auth::check()){
    		$user = Auth::user();
    		if($user_id == $user->id && $token == \Session::token()){
    			$stage = $user->stage()->get();
    			if($stage && count($stage)>0){
    				$stage = $stage[0];
    				$stage->is_guest_info_done = false;
    				$stage->save();
    				return redirect()->route('guestsInfo');
    			}
    			
    		}
    		else{
    			Auth::logout();
    			return redirect()->route('login')->with('type','error')->with('msg','logged out because of unauthorized attempt.');
    		}
    	}
    	else{
    		Auth::logout();
    		return redirect()->route('login')->with('type','warning')->with('msg','Session expired. Login again please');
    	}
    
    }

    public function addGuest(Request $request)
    {
        $this->validate($request,[
            'guestName'=>'required|regex:/^[a-zA-Z ]*$/',
            'guestContact'=>'required|regex:(^\d{5}\-\d{7}\-\d{1})',
            'guestRelation'=>'required|alpha',
        ]);
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
        $this->validate($request, [
            'disability'=> 'present|required|boolean'
        ]);
        $user = Auth::user();
        if($user){
            $stage = $user->stage()->get();

            
            $data = (object) array(
                
                'disability'=> $request->input('disability'),
                
            );


            $personal = $user->personalI()->get();
            if($personal && count($personal)>0)
            {
                $personal = $personal[0];
                $personal->disability = $data->disability;
                $personal->save();
            }

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
