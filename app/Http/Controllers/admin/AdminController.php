<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

use App\PersonalI;
use App\User;
use App\EducationalI;
use App\ProfessioanlI;
use App\Payment;
use App\Status;
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
                    $payments = DB::table('payments')->get();
                    $data  = [];
                    foreach($payments as $payment)
                    {
                        $u = DB::table('users')->where('id',$payment->user_id)->first();
                        $personal = DB::table('personal_informations')->where('user_id',$payment->user_id)->first();
                        $status = DB::table('statuses')->where('user_id',$payment->user_id)->first();
                        if(!$status)
                        {
                            \Log::info('solo');
                            $status = Status::create([
                                'user_id'=> $u->id,
                                
                            ]);
                        }
                        $data1 = array(
                            'user_id'=>$u->id,
                            'cnic'=> $personal->cnic,
                            'name'=> $personal->name,
                            'number'=> $personal->mobile_no,
                            // 'paymentMethod'=> $payment->payment_method,
                            'status'=> $status->status,
                            'updatedBy'=> $status->updated_by,
                        );
                        array_push($data,$data1);

                    }
                    \Log::info($data);
                    $data = (object) $data;
                   
                    
                    

                    return view('adminPanel')->with('data',$data)->with('user',$user);



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
