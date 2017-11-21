<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\PersonalI;
use App\User;
class PersonalController extends Controller
{
    //
    public function index(Request $request){
        $user = Auth::user();
        if($user){
            $personalI = $user->personalI()->get();
            if($personalI && count($personalI) > 0){
                $personalI = $personalI[0];
            }
            else{
               $personalI = new PersonalI;
               $personalI->name = 'Mukarram Is' ;
            }
            return view('personalInformation')->with('user',$user)->with('personalI',$personalI);
        }
        else{
            return redirect()->to('login')->with('type','error')->with('msg','Session expired. Login to continue');
        }
    }


    public function save(Request $request)
    {
        $user = Auth::user();
        //if session is active
    	if($user){
            $data = (object) array(
                'user_id'=>$user->id,
                'name'=> $request->input('name'),
                'gender'=> $request->input('gender'),
                'cnic'=> $request->input('cNIC'),
                'email'=> $request->input('email'),
                'mobile_no'=> $request->input('phoneNumber'),
                'emergency_no'=> $request->input('emergencyPhoneNumber'),
            );
            //check if user has an entry of personal information in database
            //if yes
            $personalI = $user->personalI()->get();
            if($personalI && count($personalI)>0){
                $personalI = $personalI[0];
                $personalI->name = $data->name;
                $personalI->gender = $data->gender;
                $personalI->cnic = $data->cnic;
                $personalI->email = $data->email;
                $personalI->mobile_no = $data->mobile_no;
                $personalI->emergency_no = $data->emergency_no;
                //save to database
                $personalI->save();

                return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
            }
            else{
                
                $personal = PersonalI::create((array) $data);
                return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
            }

            return \Response::json(['type'=>'error','msg'=>'Unknown error while saving data. Please try again.']);
            
        }
        else{
            //either session is expired or page is directly being accessed so stop it
            return \Response::json(['type'=>'error','msg'=>'Your session is expired. Please login to continue']);
        }
    	

    }

    public function saveAndNext(Request $request){
        $user = Auth::user();
        //if session is still active
        if($user){

            $data = (object) array(
                'user_id'=>$user->id,
                'name'=> $request->input('name'),
                'gender'=> $request->input('gender'),
                'cnic'=> $request->input('cNIC'),
                'email'=> $request->input('email'),
                'mobile_no'=> $request->input('phoneNumber'),
                'emergency_no'=> $request->input('emergencyPhoneNumber'),
            );
            \Log::info((array) $data);
            //check if user has personalInformation entry in table already or not
            $personalI = $user->personalI()->get();
            if($personalI && count($personalI)>0){
                $personalI = $personalI[0];
                //then update
                $personalI->name = $data->name;
                $personalI->gender = $data->gender;
                $personalI->cnic = $data->cnic;
                $personalI->email = $data->email;
                $personalI->mobile_no = $data->mobile_no;
                $personalI->emergency_no = $data->emergency_no;
                //save to database
                $personalI->save();

                return redirect()->to('educationalInformation')->with('type','success')->with('msg','Personal Information saved successfully.');
                
            }
            else{
                //otherwise create one
                $personal = PersonalI::create($data);
                return redirect()->to('educationalInformation')->with('type','success')->with('msg','Personal Information saved successfully.');
                
            }

            return redirect()->back()->with('type','error')->with('msg','Unknow error. Please try again.');

        }
        else{
            //session is expired
            return redirect()->to('login')->with('type','error')->with('msg','Session expired. Login to continue');
        }

    }

    public function saveImage(Request $request)
    {
      // $name = $request->input('name');
        $user = Auth::user();

        $my_file = '..\\'. $user->id . '.' . $request->input('ext');
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
        $data = $request->input('content');
        fwrite($handle, $data);
        file_put_contents($my_file, $data);
    
    }
}
