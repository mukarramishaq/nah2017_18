<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\EducationalI;
use App\School;
class EducationalController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        if($user){
            $schools = School::all();
            $disciplines = Discipline::all();
            return view('educationalInformation')->with('schools',$schools)->with('disciplines',$disciplines)->with('educationalI',$educationalI);
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
            $data = array(
                'user_id'=>$user->id,
                'reg_no'=> $request->input('registrationNumber'),
                'degree'=> $request->input('degree'),
                'school'=> $request->input('school'),
                'discipline'=> $request->input('discipline'),
                'enrollment_year'=> $request->input('enrollmentYear'),
                'graduation_year'=> $request->input('graduationYear'),
                'has_alumni_card'=> $request->input('hasAlumniCard'),
            );
            //check if user has an entry of educational information in database
            //if yes
            $educationalI = $user->educationalI();
            if($educationalI){
               $educationalI->reg_no = $data->reg_no;
               $educationalI->degree = $data->degree;
               $educationalI->school = $data->school;
               $educationalI->discipline = $data->discipline;
               $educationalI->enrollment_year = $data->enrollment_year;
               $educationalI->graduation_year = $data->graduation_year;
               $educationalI->has_alumni_card = $data->has_alumni_card;
                //save to database
                $educationalI->save();

                return \Response::json(['success'=>'success','msg'=>'Data saved successfully.']);
            }
            else{
                $educational = EducationalI::create($data);
                return \Response::json(['success'=>'success','msg'=>'Data saved successfully.']);
            }

            return \Response::json(['error'=>'error','msg'=>'Unknown error while saving data. Please try again.']);
            
        }
        else{
            //either session is expired or page is directly being accessed so stop it
            return \Response::json(['error'=>'error','msg'=>'Your session is expired. Please login to continue']);
        }
    	

    }


    public function saveAndNext(){
        $user = Auth::user();
        //if session is still active
        if($user){

            $data = array(
                'user_id'=>$user->id,
                'reg_no'=> $request->input('registrationNumber'),
                'degree'=> $request->input('degree'),
                'school'=> $request->input('school'),
                'discipline'=> $request->input('discipline'),
                'enrollment_year'=> $request->input('enrollmentYear'),
                'graduation_year'=> $request->input('graduationYear'),
                'has_alumni_card'=> $request->input('hasAlumniCard'),
            );
            //check if user has educationalInformation entry in table already or not
            $educationalI = $user->educationalI();
            if($educationalI){
                //then update
                $educationalI->reg_no = $data->reg_no;
                $educationalI->degree = $data->degree;
                $educationalI->school = $data->school;
                $educationalI->discipline = $data->discipline;
                $educationalI->enrollment_year = $data->enrollment_year;
                $educationalI->graduation_year = $data->graduation_year;
                $educationalI->has_alumni_card = $data->has_alumni_card;
                //save to database
                $educationalI->save();

                return redirect()->to('educationalInformation')->with('type','success')->with('msg','Personal Information saved successfully.');
                
            }
            else{
                //otherwise create one
                $personal = EducationalI::create($data);
                return redirect()->to('educationalInformation')->with('type','success')->with('msg','Personal Information saved successfully.');
                
            }

            return redirect()->back()->with('type','error')->with('msg','Unknow error. Please try again.');

        }
        else{
            //session is expired
            return redirect()->to('login')->with('type','error')->with('msg','Session expired. Login to continue');
        }

    }
}
