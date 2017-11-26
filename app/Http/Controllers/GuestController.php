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
            $guests = $user->guest()->get();
            // if(!$guests || count($guests)<1){
            //     $guests = (array) array(
            //         new Guest,
            //     );  
            // }
            \Log::info($guests);
            return view('guest')->with('guests',$guests);

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
            return redirect()->route('guestsInfo')->with('type','success')->with('msg','Guest Information saved successfully.');
        }
        else
        {
            return redirect()->to('login')->with('type','error')->with('msg','Session expired. Login to continue');
            
        }

    }

    public function removeGuest(Request $request, $id)
    {
        $user = Auth::user();
        if($user)
        {
            $guest = Guest::find($id)->first();
            if(count($guest)>0)
            {
                $guest->delete();
                return redirect()->route('guestsInfo')->with('type','success')->with('msg','Guest Information deleted successfully.');
    
            }
            else{
                return redirect()->route('guestsInfo')->with('type','error')->with('msg','Could not  delete Guest Information.');
                
            }
        }
        else
        {
            return redirect()->to('login')->with('type','error')->with('msg','Session expired. Login to continue');
            
        }
    }


}
