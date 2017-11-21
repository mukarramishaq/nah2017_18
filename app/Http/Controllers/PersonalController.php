<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\PersonalI;

class PersonalController extends Controller
{
    //
    public function save(Request $request)
    {
        $user = Auth::user();
        //if session is active
    	if($user){
            $data = array(
                'user_id'=>$user->id,
                'name'=> $request->input('name'),
                'gender'=> $request->input('gender'),
                'cnic'=> $request->input('cNIC'),
                'mobile_no'=> $request->input('phoneNumber'),
                'emergency_no'=> $request->input('emergencyPhoneNumber'),
            );
            //check if user has an entry of personal information in database
            //if yes
            $personalI = $user->personalI();
            if($personalI){
                $personalI->name = $data->name;
                $personalI->gender = $data->gender;
                $personalI->cninc = $data->cnic;
                $personalI->mobile_no = $data->mobile_no;
                $personalI->emergency_no = $data->emergency_no;
                //save to database
                $personalI->save();

                return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
            }
            else{
                $personal = PersonalI::create($data);
                return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
            }

            return \Response::json(['type'=>'error','msg'=>'Unknown error while saving data. Please try again.']);
            
        }
        else{
            //either session is expired or page is directly being accessed so stop it
            return \Response::json(['type'=>'error','msg'=>'Your session is expired. Please login to continue']);
        }
    	

    }

    public function saveAndNext(){
        $user = Auth::user();
        //if session is still active
        if($user){

            $data = array(
                'user_id'=>$user->id,
                'name'=> $request->input('name'),
                'gender'=> $request->input('gender'),
                'cnic'=> $request->input('cNIC'),
                'mobile_no'=> $request->input('phoneNumber'),
                'emergency_no'=> $request->input('emergencyPhoneNumber'),
            );
            //check if user has personalInformation entry in table already or not
            $personalI = $user->personalI();
            if($personalI){
                //then update
                $personalI->name = $data->name;
                $personalI->gender = $data->gender;
                $personalI->cninc = $data->cnic;
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
