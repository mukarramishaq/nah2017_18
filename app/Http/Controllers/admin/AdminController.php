<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    public function index(Request $request){
        $user = Auth::user();
        if($user)
        {
            if($user->is_admin)
            {
                $admin = $user->admins()->get();
                if($admin && count($admin)>0)
                {
                    $admin = $admin[0];
                   if($admin->admin_type == 'registration')
                   {
                    $personal = $user->personalI()->get();
                    $educationl = $user->educationalI()->get();
                    $professional = $user->professionalI()->get();
                    $payment = $user->payment()->get();
                    $status = $user->status()->get();
                    
                    $data = (object) array(
                        'user_id'=>$user->id,
                        'name'=> $personal->name,
                        'cnic'=> $personal->cnic,
                        'number'=> $personal->mobile_no,
                        'paymontMethod'=> $payment->payment_method,
                        'status'=> $status->status,
                        'updatedBy'=> $status->updated_by,
                    );


                   } 
                   else if($admin->admin_type == 'finance')
                   {
                    

                   }
                   else if($admin->admin_type == 'admin')
                   {

                   }
                   else
                   {
                       Auth::logout();
                    return redirect()->route('login')->with('type','error')->with('msg','Session expired. Login to continue');
                    
                   }
                   
                }

                else
                {
                    Auth::logout();
                    return redirect()->route('login')->with('type','error')->with('msg','Session expired. Login to continue');
                }

            }
            else
            {
                Auth::logout();
                return redirect()->route('login')->with('type','error')->with('msg','Session expired. Login to continue');
                
            }
        }

        
        
        

        
    }
}
