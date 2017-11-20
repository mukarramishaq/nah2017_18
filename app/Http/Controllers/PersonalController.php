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
    	\Log::info($request);
    	$personal = PersonalI::create(array(
    		'user_id'=>$user->id,
    		'name'=> $request->input('name'),
    		'gender'=> $request->input('gender'),
    		'cnic'=> $request->input('cNIC'),
    		'mobile_no'=> $request->input('phoneNumber'),
    		'emergency_no'=> $request->input('emergencyPhoneNumber'),
    	));

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
