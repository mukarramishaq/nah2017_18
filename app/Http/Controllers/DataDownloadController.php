<?php

namespace App\Http\Controllers;
use App\User;
use App\Guest;
use App\PersonalI;
use App\EducationalI;
use App\ProfessionalI;
use App\Stage;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DataDownloadController extends Controller
{
    // paid and approved users
    public function paidApprovedUsers(Request $request){
        if(Auth::check()){
            $admin = Auth::user();
            if($admin->id == $admin_id && $admin->is_admin == true && \Session::token() == $token){
                $users = \DB::table('users')
                            ->join('personal_informations','users.id','=','personal_informations.user_id')
                            ->join('educational_informations','personal_informations.user_id','=','educational_informations.user_id')
                            ->join('stages','personal_informations.user_id','=','stages.user_id')
                            ->join('statuses','personal_informations.user_id','=','statuses.user_id')
                            ->select('users.id','personal_informations.name','users.email','personal_informations.dob','personal_informations.disability','educational_informations.degree','educational_informations.school','educational_informations.discipline','educational_informations.enrollment_year','educational_informations.graduation_year','educational_informations.has_alumni_card')
                            ->where('statuses.status','approved')
                            ->get()
                            ;
                
                if($users && count($users)>0){
                    $csvData = array('User ID, Name, Email, DOB, Age, Disability, Degree, School, Discipline, Enrollment Year, Graduation Year, Has Alumni Card,');
                    foreach($users as $user){
                        $personalI = PersonalI::where('user_id',$user->id)->first();
                        $csvData[] = $user->id.', '.$user->name.', '.$user->email.', '.$user->dob.', '.$personalI->age().', '.$user->disability.', '.$user->degree.', '.$user->school.', '.$user->discipline.', '.$user->enrollment_year.', '.$user->graduation_year.', '.$user->has_alumni_card;
                    }
                    $filename='paid_approved_users_'.date('Y-m-d').".csv";
                    $file_path=public_path().'/'.$filename;  
                    $file = fopen($file_path,"w+");
                    foreach ($csvData as $exp_data){
                      fputcsv($file,explode(',',$exp_data));
                    }   
                    fclose($file);          
             
                    $headers = ['Content-Type' => 'application/csv'];
                    return response()->download($file_path,$filename,$headers );
                    
                }
                else{
                    return redirect()->back()->with('type','error')->with('msg','No Data Found!');
                }
            }
            Auth::logout();
            return redirect()->route('login')->with('type','danger')->with('msg',"You've been logged out because of unauthorized attempt to access ...");
        }
        Auth::logout();
        return redirect()->route('login')->with('type','warning')->with('msg','Session Expired. Login again to proceed');
    }
    // paid but pending approval users users
    public function paidButPendingApprovalUsers(Request $request){
        if(Auth::check()){
            $admin = Auth::user();
            if($admin->id == $admin_id && $admin->is_admin == true && \Session::token() == $token){
                $users = \DB::table('users')
                            ->join('personal_informations','users.id','=','personal_informations.user_id')
                            ->join('educational_informations','personal_informations.user_id','=','educational_informations.user_id')
                            ->join('stages','personal_informations.user_id','=','stages.user_id')
                            ->join('statuses','personal_informations.user_id','=','statuses.user_id')
                            ->select('users.id','personal_informations.name','users.email','personal_informations.dob','personal_informations.disability','educational_informations.degree','educational_informations.school','educational_informations.discipline','educational_informations.enrollment_year','educational_informations.graduation_year','educational_informations.has_alumni_card')
                            ->where('statuses.status','Receipt Uploaded')
                            ->orWhere(function($query){
                                $query->where('stages.is_final_payment_done',true)
                                ->where('statuses.status','<>','approved');
                            })
                            ->get()
                            ;
                
                if($users && count($users)>0){
                    $csvData = array('User ID, Name, Email, DOB, Age, Disability, Degree, School, Discipline, Enrollment Year, Graduation Year, Has Alumni Card,');
                    foreach($users as $user){
                        $personalI = PersonalI::where('user_id',$user->id)->first();
                        $csvData[] = $user->id.', '.$user->name.', '.$user->email.', '.$user->dob.', '.$personalI->age().', '.$user->disability.', '.$user->degree.', '.$user->school.', '.$user->discipline.', '.$user->enrollment_year.', '.$user->graduation_year.', '.$user->has_alumni_card;
                    }
                    $filename='paid_but_pending_approval_users_'.date('Y-m-d').".csv";
                    $file_path=public_path().'/'.$filename;  
                    $file = fopen($file_path,"w+");
                    foreach ($csvData as $exp_data){
                      fputcsv($file,explode(',',$exp_data));
                    }   
                    fclose($file);          
             
                    $headers = ['Content-Type' => 'application/csv'];
                    return response()->download($file_path,$filename,$headers );
                    
                }
                else{
                    return redirect()->back()->with('type','error')->with('msg','No Data Found!');
                }
            }
            Auth::logout();
            return redirect()->route('login')->with('type','danger')->with('msg',"You've been logged out because of unauthorized attempt to access ...");
        }
        Auth::logout();
        return redirect()->route('login')->with('type','warning')->with('msg','Session Expired. Login again to proceed');
    }
    // non paid users users
    public function nonPaidUsers(Request $request){
        if(Auth::check()){
            $admin = Auth::user();
            if($admin->id == $admin_id && $admin->is_admin == true && \Session::token() == $token){
                $users = \DB::table('users')
                            ->join('personal_informations','users.id','=','personal_informations.user_id')
                            ->join('educational_informations','personal_informations.user_id','=','educational_informations.user_id')
                            ->join('stages','personal_informations.user_id','=','stages.user_id')
                            ->join('statuses','personal_informations.user_id','=','statuses.user_id')
                            ->join('payments','personal_informations.user_id','=','payments.user_id')
                            ->select('users.id','personal_informations.name','users.email','personal_informations.dob','personal_informations.disability','educational_informations.degree','educational_informations.school','educational_informations.discipline','educational_informations.enrollment_year','educational_informations.graduation_year','educational_informations.has_alumni_card')
                            ->where('statuses.status','Not Uploaded')
                            ->orWhere(function($query){
                                $query->where('stages.is_final_payment_done',false)
                                    ->where('payments.resident','<>','overseas'); //not overseas
                            })

                            ->get()
                            ;
                
                if($users && count($users)>0){
                    $csvData = array('User ID, Name, Email, DOB, Age, Disability, Degree, School, Discipline, Enrollment Year, Graduation Year, Has Alumni Card,');
                    foreach($users as $user){
                        $personalI = PersonalI::where('user_id',$user->id)->first();
                        $csvData[] = $user->id.', '.$user->name.', '.$user->email.', '.$user->dob.', '.$personalI->age().', '.$user->disability.', '.$user->degree.', '.$user->school.', '.$user->discipline.', '.$user->enrollment_year.', '.$user->graduation_year.', '.$user->has_alumni_card;
                    }
                    $filename='non_paid_users_'.date('Y-m-d').".csv";
                    $file_path=public_path().'/'.$filename;  
                    $file = fopen($file_path,"w+");
                    foreach ($csvData as $exp_data){
                      fputcsv($file,explode(',',$exp_data));
                    }   
                    fclose($file);          
             
                    $headers = ['Content-Type' => 'application/csv'];
                    return response()->download($file_path,$filename,$headers );
                    
                }
                else{
                    return redirect()->back()->with('type','error')->with('msg','No Data Found!');
                }
            }
            Auth::logout();
            return redirect()->route('login')->with('type','danger')->with('msg',"You've been logged out because of unauthorized attempt to access ...");
        }
        Auth::logout();
        return redirect()->route('login')->with('type','warning')->with('msg','Session Expired. Login again to proceed');
    }
    // international users
    public function overseasUsers(Request $request){
        if(Auth::check()){
            $admin = Auth::user();
            if($admin->id == $admin_id && $admin->is_admin == true && \Session::token() == $token){
                $users = \DB::table('users')
                            ->join('personal_informations','users.id','=','personal_informations.user_id')
                            ->join('educational_informations','personal_informations.user_id','=','educational_informations.user_id')
                            ->join('stages','personal_informations.user_id','=','stages.user_id')
                            ->join('statuses','personal_informations.user_id','=','statuses.user_id')
                            ->join('payments','personal_informations.user_id','=','payments.user_id')
                            ->select('users.id','personal_informations.name','users.email','personal_informations.dob','personal_informations.disability','educational_informations.degree','educational_informations.school','educational_informations.discipline','educational_informations.enrollment_year','educational_informations.graduation_year','educational_informations.has_alumni_card')
                            ->where('payments.resident','overseas')

                            ->get()
                            ;
                
                if($users && count($users)>0){
                    $csvData = array('User ID, Name, Email, DOB, Age, Disability, Degree, School, Discipline, Enrollment Year, Graduation Year, Has Alumni Card,');
                    foreach($users as $user){
                        $personalI = PersonalI::where('user_id',$user->id)->first();
                        $csvData[] = $user->id.', '.$user->name.', '.$user->email.', '.$user->dob.', '.$personalI->age().', '.$user->disability.', '.$user->degree.', '.$user->school.', '.$user->discipline.', '.$user->enrollment_year.', '.$user->graduation_year.', '.$user->has_alumni_card;
                    }
                    $filename='overseas_alumni_users_'.date('Y-m-d').".csv";
                    $file_path=public_path().'/'.$filename;  
                    $file = fopen($file_path,"w+");
                    foreach ($csvData as $exp_data){
                      fputcsv($file,explode(',',$exp_data));
                    }   
                    fclose($file);          
             
                    $headers = ['Content-Type' => 'application/csv'];
                    return response()->download($file_path,$filename,$headers );
                    
                }
                else{
                    return redirect()->back()->with('type','error')->with('msg','No Data Found!');
                }
            }
            Auth::logout();
            return redirect()->route('login')->with('type','danger')->with('msg',"You've been logged out because of unauthorized attempt to access ...");
        }
        Auth::logout();
        return redirect()->route('login')->with('type','warning')->with('msg','Session Expired. Login again to proceed');
    }
    // paid and approved guests
    public function paidApprovedGuests(Request $request){
        if(Auth::check()){
            $admin = Auth::user();
            if($admin->id == $admin_id && $admin->is_admin == true && \Session::token() == $token){
                $users = \DB::table('users')
                            ->join('personal_informations','users.id','=','personal_informations.user_id')
                            ->join('educational_informations','personal_informations.user_id','=','educational_informations.user_id')
                            ->join('guests','personal_informations.user_id','=','guests.user_id')
                            ->join('stages','personal_informations.user_id','=','stages.user_id')
                            ->join('statuses','personal_informations.user_id','=','statuses.user_id')
                            ->select('users.id','guests.name','guests.relation') //,'personal_informations.dob','personal_informations.disability','educational_informations.degree','educational_informations.school','educational_informations.discipline','educational_informations.enrollment_year','educational_informations.graduation_year','educational_informations.has_alumni_card')
                            ->where('statuses.status','approved')
                            ->get()
                            ;
                
                if($users && count($users)>0){
                    $csvData = array('User ID, Guest Name, Relation '); //, DOB, Age, Disability, Degree, School, Discipline, Enrollment Year, Graduation Year, Has Alumni Card,');
                    foreach($users as $user){
                        $personalI = PersonalI::where('user_id',$user->id)->first();
                        $csvData[] = $user->id.', '.$user->name.', '.$user->relation; //.', '.$user->dob.', '.$personalI->age().', '.$user->disability.', '.$user->degree.', '.$user->school.', '.$user->discipline.', '.$user->enrollment_year.', '.$user->graduation_year.', '.$user->has_alumni_card;
                    }
                    $filename='paid_approved_guests_'.date('Y-m-d').".csv";
                    $file_path=public_path().'/'.$filename;  
                    $file = fopen($file_path,"w+");
                    foreach ($csvData as $exp_data){
                      fputcsv($file,explode(',',$exp_data));
                    }   
                    fclose($file);          
             
                    $headers = ['Content-Type' => 'application/csv'];
                    return response()->download($file_path,$filename,$headers );
                    
                 }
                else{
                    return redirect()->back()->with('type','error')->with('msg','No Data Found!');
                }
            }
            Auth::logout();
            return redirect()->route('login')->with('type','danger')->with('msg',"You've been logged out because of unauthorized attempt to access ...");
        }
        Auth::logout();
        return redirect()->route('login')->with('type','warning')->with('msg','Session Expired. Login again to proceed');
    }
    // paid but pending approval guests
    public function paidButPendingApprovalGuests(Request $request){
        if(Auth::check()){
            $admin = Auth::user();
            if($admin->id == $admin_id && $admin->is_admin == true && \Session::token() == $token){
                $users = \DB::table('users')
                            ->join('personal_informations','users.id','=','personal_informations.user_id')
                            ->join('educational_informations','personal_informations.user_id','=','educational_informations.user_id')
                            ->join('guests','personal_informations.user_id','=','guests.user_id')
                            ->join('stages','personal_informations.user_id','=','stages.user_id')
                            ->join('statuses','personal_informations.user_id','=','statuses.user_id')
                            ->select('users.id','guests.name','guests.relation') //,'personal_informations.dob','personal_informations.disability','educational_informations.degree','educational_informations.school','educational_informations.discipline','educational_informations.enrollment_year','educational_informations.graduation_year','educational_informations.has_alumni_card')
                            ->where('statuses.status','Receipt Uploaded')
                            ->orWhere('stages.is_final_payment_done',true)
                            ->get()
                            ;
                
                if($users && count($users)>0){
                    $csvData = array('User ID, Guest Name, Relation '); //, DOB, Age, Disability, Degree, School, Discipline, Enrollment Year, Graduation Year, Has Alumni Card,');
                    foreach($users as $user){
                        $personalI = PersonalI::where('user_id',$user->id)->first();
                        $csvData[] = $user->id.', '.$user->name.', '.$user->relation; //.', '.$user->dob.', '.$personalI->age().', '.$user->disability.', '.$user->degree.', '.$user->school.', '.$user->discipline.', '.$user->enrollment_year.', '.$user->graduation_year.', '.$user->has_alumni_card;
                    }
                    $filename='paid_but_pending_approval_guests_'.date('Y-m-d').".csv";
                    $file_path=public_path().'/'.$filename;  
                    $file = fopen($file_path,"w+");
                    foreach ($csvData as $exp_data){
                      fputcsv($file,explode(',',$exp_data));
                    }   
                    fclose($file);          
             
                    $headers = ['Content-Type' => 'application/csv'];
                    return response()->download($file_path,$filename,$headers );
                    
                 }
                else{
                    return redirect()->back()->with('type','error')->with('msg','No Data Found!');
                }
            }
            Auth::logout();
            return redirect()->route('login')->with('type','danger')->with('msg',"You've been logged out because of unauthorized attempt to access ...");
        }
        Auth::logout();
        return redirect()->route('login')->with('type','warning')->with('msg','Session Expired. Login again to proceed');
    }

    // non paid guests
    public function nonPaidGuests(Request $request){
        if(Auth::check()){
            $admin = Auth::user();
            if($admin->id == $admin_id && $admin->is_admin == true && \Session::token() == $token){
                $users = \DB::table('users')
                            ->join('personal_informations','users.id','=','personal_informations.user_id')
                            ->join('educational_informations','personal_informations.user_id','=','educational_informations.user_id')
                            ->join('guests','personal_informations.user_id','=','guests.user_id')
                            ->join('stages','personal_informations.user_id','=','stages.user_id')
                            ->join('statuses','personal_informations.user_id','=','statuses.user_id')
                            ->join('payments','personal_informations.user_id','=','payments.user_id')
                            ->select('users.id','guests.name','guests.relation') //,'personal_informations.dob','personal_informations.disability','educational_informations.degree','educational_informations.school','educational_informations.discipline','educational_informations.enrollment_year','educational_informations.graduation_year','educational_informations.has_alumni_card')
                            ->where('statuses.status','Receipt Uploaded')
                            ->orWhere(function($query){
                                $query->where('stages.is_final_payment_done',false)
                                    ->where('payments.resident','<>','overseas'); //not overseas
                            })
                            ->get()
                            ;
                
                if($users && count($users)>0){
                    $csvData = array('User ID, Guest Name, Relation '); //, DOB, Age, Disability, Degree, School, Discipline, Enrollment Year, Graduation Year, Has Alumni Card,');
                    foreach($users as $user){
                        $personalI = PersonalI::where('user_id',$user->id)->first();
                        $csvData[] = $user->id.', '.$user->name.', '.$user->relation; //.', '.$user->dob.', '.$personalI->age().', '.$user->disability.', '.$user->degree.', '.$user->school.', '.$user->discipline.', '.$user->enrollment_year.', '.$user->graduation_year.', '.$user->has_alumni_card;
                    }
                    $filename='non_paid_guests_'.date('Y-m-d').".csv";
                    $file_path=public_path().'/'.$filename;  
                    $file = fopen($file_path,"w+");
                    foreach ($csvData as $exp_data){
                      fputcsv($file,explode(',',$exp_data));
                    }   
                    fclose($file);          
             
                    $headers = ['Content-Type' => 'application/csv'];
                    return response()->download($file_path,$filename,$headers );
                    
                 }
                else{
                    return redirect()->back()->with('type','error')->with('msg','No Data Found!');
                }
            }
            Auth::logout();
            return redirect()->route('login')->with('type','danger')->with('msg',"You've been logged out because of unauthorized attempt to access ...");
        }
        Auth::logout();
        return redirect()->route('login')->with('type','warning')->with('msg','Session Expired. Login again to proceed');
    }

    // international alumni's guests
    public function overseasAlumniGuests(Request $request){
        if(Auth::check()){
            $admin = Auth::user();
            if($admin->id == $admin_id && $admin->is_admin == true && \Session::token() == $token){
                $users = \DB::table('users')
                            ->join('personal_informations','users.id','=','personal_informations.user_id')
                            ->join('educational_informations','personal_informations.user_id','=','educational_informations.user_id')
                            ->join('guests','personal_informations.user_id','=','guests.user_id')
                            ->join('stages','personal_informations.user_id','=','stages.user_id')
                            ->join('statuses','personal_informations.user_id','=','statuses.user_id')
                            ->join('payments','personal_informations.user_id','=','payments.user_id')
                            ->select('users.id','guests.name','guests.relation') //,'personal_informations.dob','personal_informations.disability','educational_informations.degree','educational_informations.school','educational_informations.discipline','educational_informations.enrollment_year','educational_informations.graduation_year','educational_informations.has_alumni_card')
                            ->where('payments.resident','overseas')
                            
                            ->get()
                            ;
                
                if($users && count($users)>0){
                    $csvData = array('User ID, Guest Name, Relation '); //, DOB, Age, Disability, Degree, School, Discipline, Enrollment Year, Graduation Year, Has Alumni Card,');
                    foreach($users as $user){
                        $personalI = PersonalI::where('user_id',$user->id)->first();
                        $csvData[] = $user->id.', '.$user->name.', '.$user->relation; //.', '.$user->dob.', '.$personalI->age().', '.$user->disability.', '.$user->degree.', '.$user->school.', '.$user->discipline.', '.$user->enrollment_year.', '.$user->graduation_year.', '.$user->has_alumni_card;
                    }
                    $filename='overseas_alumni_guests_'.date('Y-m-d').".csv";
                    $file_path=public_path().'/'.$filename;  
                    $file = fopen($file_path,"w+");
                    foreach ($csvData as $exp_data){
                      fputcsv($file,explode(',',$exp_data));
                    }   
                    fclose($file);          
             
                    $headers = ['Content-Type' => 'application/csv'];
                    return response()->download($file_path,$filename,$headers );
                    
                 }
                else{
                    return redirect()->back()->with('type','error')->with('msg','No Data Found!');
                }
            }
            Auth::logout();
            return redirect()->route('login')->with('type','danger')->with('msg',"You've been logged out because of unauthorized attempt to access ...");
        }
        Auth::logout();
        return redirect()->route('login')->with('type','warning')->with('msg','Session Expired. Login again to proceed');
    }
}
