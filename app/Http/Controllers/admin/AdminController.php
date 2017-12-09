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
use App\Stage;
use App\Price;
use App\Guest;
class AdminController extends Controller
{
    
    public function index(Request $request){
        $user = Auth::user();
        \Log::info($user && $user->is_admin == true);
        if($user){
            $stages = DB::table('stages')->where('is_residence_done',true)->get();
            \Log::info($stages);
            $data = [];
            foreach($stages as $stage){
                $u = DB::table('users')->where('id',$stage->user_id)->first();
                $personalI = DB::table('personal_informations')->where('user_id',$stage->user_id)->first();
                $educationalI = DB::table('educational_informations')->where('user_id',$stage->user_id)->first();
                $professionalI = DB::table('professional_informations')->where('user_id',$stage->user_id)->first();
                $payment = DB::table('payments')->where('user_id',$stage->user_id)->first();
                
                $status = DB::table('statuses')->where('user_id',$stage->user_id)->first();
                if(!$status){
                    $sstatus;
                    if($stage->is_final_payment_done){
                        $sstatus = 'Receipt Uploaded';
                    }
                    else{
                        $sstatus = 'Not Uploaded';
                    }
                    $status = Status::create(array(
                        'user_id'=>$stage->user_id,
                        'status'=>$sstatus,
                    ));
                }
                $data1 = (object)array(
                    'id'=>$u->id,
                    'name'=>$personalI->name,
                    'cnic'=>$personalI->cnic,
                    'phone_number'=>$personalI->mobile_no,
                    'gender'=>$personalI->gender,
                    'residence'=>$payment->resident,
                    'payment_method'=>$payment->payment_method,
                    'status'=>$status->status,
                    'updated_by'=>$status->updated_by,
                );
                array_push($data,$data1);
            }
            \Log::info($data);
            return view('adminPanel')->with('data',$data);
        }
        else{
            Auth::logout();
            return response()->route('login')->with('type','danger')->with('msg','Session Expired');
        }
        
    }

    public function index2(Request $request){
        if(Auth::check() && Auth::user()->email == 'admin@homecoming.nust.edu.pk'){
            $user = Auth::user();
            $users = \DB::table('users')->get();
            $international_alumni = \DB::table('payments')->where('resident','overseas')->get();
            $local_alumni = \DB::table('payments')->where('resident','pakistani')->get();
            $chalan_alumni = \DB::table('payments')->where('payment_method','chalan')->get();
            $online_alumni = \DB::table('payments')->where('payment_method','online')->get();
            $paid_alumni = \DB::table('statuses')->where('status','approved')->get();
            $total_guests = \DB::table('guests')->get();
            
            
            $total_paid_guests = 0;
            foreach($paid_alumni as $pa){
                $guests = \DB::table('guests')->where('user_id',$pa->user_id)->get();
                $total_paid_guests += count($guests);
            }
            $total_local_guests = 0;
            foreach($local_alumni as $alumnus){
                $guests = \DB::table('guests')->where('user_id',$alumnus->user_id)->get();
                $total_local_guests += count($guests);
            }
            $total_international_guests = 0;
            foreach($international_alumni as $alumnus){
                $guests = \DB::table('guests')->where('user_id',$alumnus->user_id)->get();
                $total_international_guests += count($guests);
            }
            $data = array(
                'total_user_accounts'=>count($users),
                'total_overseas_accounts'=>count($international_alumni),
                'total_local_accounts'=>count($local_alumni),
                'total_chalan_accounts'=>count($chalan_alumni),
                'total_online_accounts'=>count($online_alumni),
                'total_paid_accounts'=>count($paid_alumni),
                'total_paid_guests'=>$total_paid_guests,
                'total_local_guests'=>$total_local_guests,
                'total_overseas_guests'=>$total_international_guests,
                'total_no_of_guests'=>count($total_guests),
            );
            \Log::info($data);
            return view('adminPanel2')->with('data',(object)$data);
        }

    }


    public function userDetails(Request $request,$user_id){
        $user = Auth::user();
        if($user && $user->is_admin == true){
            $ruser = DB::table('users')->where('id',$user_id)->first();
            if($ruser){
                $personalI = DB::table('personal_informations')->where('user_id',$user_id)->first();
                $educationalI = DB::table('educational_informations')->where('user_id',$user_id)->first();
                $professionalI = DB::table('professional_informations')->where('user_id',$user_id)->first();
                $payment = DB::table('payments')->where('user_id',$user_id)->first();
                
                $status = DB::table('statuses')->where('user_id',$user_id)->first();
                
                $amount_due = 0;
                $guests = DB::table('guests')->where('user_id',$ruser->id)->get();
                $no_of_guests = count($guests);
                $price = Price::where('registration_type',$payment->registration_type)->first();
                $amount_due = $price->alumni_price + $price->guest_price * $no_of_guests;
                $data = (object) array(
                    'admin_id'=>$user->id,
                    'user_id'=>$ruser->id,
                    'name'=>$personalI->name,
                    'email'=>$personalI->email,
                    'picture_path'=>$personalI->picture_path,
                    'paid_chalan_path'=>$payment->paid_chalan_path,
                    'dob'=>$personalI->dob,
                    'cnic'=>$personalI->cnic,
                    'disability'=>$personalI->disability,
                    'gender'=>$personalI->gender,
                    'school'=>$educationalI->school,
                    'reg_no'=>$educationalI->reg_no,
                    'has_alumni_card'=>$educationalI->has_alumni_card,
                    'degree'=>$educationalI->degree,
                    'phone_number'=>$personalI->mobile_no,
                    'emergency_phone_number'=>$personalI->emergency_no,
                    'no_of_guests'=>$no_of_guests,
                    'amount_due'=>$amount_due,
                    'amount_paid'=>$payment->amount,
                    'registration_type'=>$payment->registration_type,

                );
                
                return view('userDetails')->with('data',$data);

            }else{
                return response()->route('NotFound');
            }
        }
        else{
            Auth::logout();
            return response()->route('login')->with('type','danger')->with('msg','login to proceed');
        }
    }


    public function approve(Request $request,$admin_id,$user_id){
        if(Auth::check() && Auth::user()->is_admin){
            $user = Auth::user();
            if($user->id == $admin_id){
                \Log::info('in approve...');
                $status = Status::where('user_id',$user_id)->first();
                if(!$status){
                    return response()->json(['type'=>'warning','msg'=>'User\'s status not found!']);
                }
                $status->status = 'approved';
                $status->updated_by = $user->name;
                if($user->name == 'registration'){
                    $status->from_registration = true;
                }
                $status->save();
                return response()->json(['type'=>'success','msg'=>'Approved Successfully']);
            }
            else{
                return response()->json(['type'=>'danger','msg'=>'You are not authorized']);
            }
        }
        else{
            Auth::logout();
            return response()->json(['type'=>'danger','msg'=>'Session Expired. Login again to continue']);
        }
    }

    public function reject(Request $request,$admin_id,$user_id){
        if(Auth::check() && Auth::user()->is_admin){
            $user = Auth::user();
            if($user->id == $admin_id){
                \Log::info('in reject...');
                $status = Status::where('user_id',$user_id)->first();
                if(!$status){
                    return response()->json(['type'=>'warning','msg'=>'User\'s status not found!']);
                }
                $status->status = 'rejected';
                $status->updated_by = $user->name;
                if($user->name == 'registration'){
                    $status->from_registration = true;
                }
                $status->save();
                return response()->json(['type'=>'success','msg'=>'Rejected Successfully']);
            }
            else{
                return response()->json(['type'=>'danger','msg'=>'You are not authorized']);
            }
        }
        else{
            Auth::logout();
            return response()->json(['type'=>'danger','msg'=>'Session Expired. Login again to continue']);
        }
    }





    public function downloadUAReceipts($admin_id,$user_id,$token){
        if(Auth::check() && Auth::user()->is_admin){
            $user = Auth::user();
            if($user->id == $admin_id){
                try{
                    return response()->download(public_path('chalan_images/'.$user_id.'.png'));
                }
                catch(\Exception $e){
                    return response()->view('notFound');
                }
            }
            else{
                return response()->json(['type'=>'danger','msg'=>'You are not authorized']);
            }
        }
        else{
            Auth::logout();
            return response()->json(['type'=>'danger','msg'=>'Session Expired. Login again to continue']);
        }
    }
}
