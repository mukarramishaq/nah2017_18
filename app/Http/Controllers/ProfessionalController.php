<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\ProfessionalI;
class ProfessionalController extends Controller
{
    //
    public function index(Request $request){
        $user = Auth::user();
        $professionalI = $user->professionalI()->get();
        if($professionalI && count($professionalI)>0){
            $professionalI = $professionalI[0];
        }
        else{
            $professionalI = new ProfessionalI;
        }
        if($user){
            return view('professionalInformation')->with('professionalI',$professionalI);
        }
        else{
            return redirect()->to('login')->with('type','error')->with('msg','Session expired. Login to continue');
        }
    }

    public function save(Request $request){
        $user = Auth::user();
        if($user){
            //if applicant is unemployed
            if($request->input('employed') == 'unemployed'){
                $data = (object) array(
                    'user_id'=>$user->id,
                    'employed'=>$request->input('employed'),
                    'country'=>$request->input('country'),
                    'city'=>$request->input('city'),
                    'address'=>$request->input('address')
                );
                $professionalI = $user->professionalI()->get();
                if($professionalI && count($professionalI)>0){
                    $professionalI = $professionalI[0];
                    $professionalI->employed = $data->employed;
                    $professionalI->country = $data->country;
                    $professionalI->city = $data->city;
                    $professionalI->address = $data->address;
                    
                    $professionalI->save(); //save to database
                    return \Response::json(['success'=>'success','msg'=>'Data saved successfully.']);
                }
                else{
                    //create entry
                    $professionalI = ProfessionalI::create((array)$data);
                    return \Response::json(['success'=>'success','msg'=>'Data saved successfully.']);
                }

                return \Response::json(['error'=>'error','msg'=>'Unknown error while saving data. Please try again.']);

            }
            else if($request->input('employed') == 'employed'){

            }
            else if($request->input('employed') == 'selfemployed'){

            }
        }
        else{
            //either session is expired or page is directly being accessed so stop it
            return \Response::json(['error'=>'error','msg'=>'Your session is expired. Please login to continue']);
        }
    }
}
