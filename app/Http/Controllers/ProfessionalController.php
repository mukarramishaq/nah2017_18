<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfessionalController extends Controller
{
    //
    public function index(Request $request){
        $user = Auth::user();
        if($user){
            return view('professionalInformation');
        }
        else{
            return redirect()->to('login')->with('type','error')->with('msg','Session expired. Login to continue');
        }
    }
}
