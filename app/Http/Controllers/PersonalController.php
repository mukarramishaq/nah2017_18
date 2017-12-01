<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\PersonalI;
use App\User;
use App\Stage;
class PersonalController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('checkPersonalStage');
     }


    public function index(Request $request){
        $user = Auth::user();
        if($user){
            $personalI = $user->personalI()->get();
            if($personalI && count($personalI) > 0){
                $personalI = $personalI[0];
            }
            else{
               $personalI = new PersonalI;
            //    $personalI->name = 'Mukarram Is' ;
            }
            return view('personalInformation')->with('user',$user)->with('personalI',$personalI);
        }
        else{
            return redirect()->route('login')->with('type','error')->with('msg','Session expired. Login to continue');
        }
    }


    public function save(Request $request)
    {
        //validation logic
        $this->validate($request, [
            'name' => 'regex:/^[a-zA-Z ]*$/',
            'cNIC'=>'nullable|regex:(^\d{5}\-\d{7}\-\d{1})',
            'phoneNumber'=>'nullable|regex:(^\(\d{3}\)\s\d{3}\-\d{7})',
            'emergencyPhoneNumber'=>'nullable|regex:(^\(\d{3}\)\s\d{3}\-\d{7})',
            'dob'=>'nullable|regex:(^\d{2}\/\d{2}\/\d{4}$)',
        ]);

        $user = Auth::user();
        //if session is active
    	if($user){
            $data = (object) array(
                'user_id'=>$user->id,
                'name'=> $request->input('name'),
                'gender'=> $request->input('gender'),
                'cnic'=> $request->input('cNIC'),
                'dob'=>$request->input('dob'),
                'email'=> $request->input('email'),
                'mobile_no'=> $request->input('phoneNumber'),
                'emergency_no'=> $request->input('emergencyPhoneNumber'),
                // 'disability'=>$request->input('disability'),
            );
            //check if user has an entry of personal information in database
            //if yes
            
            $personalI = $user->personalI()->get();
            if($personalI && count($personalI)>0){
                $personalI = $personalI[0];
                $personalI->name = $data->name;
                $personalI->gender = $data->gender;
                $personalI->cnic = $data->cnic;
                $personalI->dob = $data->dob;
                $personalI->email = $data->email;
                $personalI->mobile_no = $data->mobile_no;
                $personalI->emergency_no = $data->emergency_no;

                // $personalI->disability = $data->disability;
                //save to database
                $personalI->save();
                $user->name = $data->name;
                $user->save();
                return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
            }
            else{
                
                $personal = PersonalI::create((array) $data);
                $user->name = $data->name;
                $user->save();
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
        //validation logic
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z ]*$/',
            'cNIC'=>'required|regex:(^\d{5}\-\d{7}\-\d{1})',
            'phoneNumber'=>'required|regex:(^\(\d{3}\)\s\d{3}\-\d{7})',
            'emergencyPhoneNumber'=>'required|regex:(^\(\d{3}\)\s\d{3}\-\d{7})',
            'dob'=>'required|regex:(^\d{2}\/\d{2}\/\d{4}$)',
            'gender'=>'required',
            'email'=>'required|email',
            // 'disability'=>'required|boolean',
        ]);
        $user = Auth::user();
        //if session is still active
        if($user){
            if(!$user->is_image_uploaded){
                return response()->json(['type','danger','msg'=>'Upload Your Image Please!']);
            }
            $data = (object) array(
                'user_id'=>$user->id,
                'name'=> $request->input('name'),
                'gender'=> $request->input('gender'),
                'cnic'=> $request->input('cNIC'),
                'dob'=>$request->input('dob'),
                'email'=> $request->input('email'),
                'mobile_no'=> $request->input('phoneNumber'),
                'emergency_no'=> $request->input('emergencyPhoneNumber'),
                // 'disability'=>$request->input('disability'),
            );
            // \Log::info((array) $data);
            \Log::info(gettype($data));
            //check if user has personalInformation entry in table already or not
            $personalI = $user->personalI()->get();
            if($personalI && count($personalI)>0){
                $personalI = $personalI[0];
                //then update
                $personalI->name = $data->name;
                $personalI->gender = $data->gender;
                $personalI->cnic = $data->cnic;
                $personalI->dob = $data->dob;
                $personalI->email = $data->email;
                $personalI->mobile_no = $data->mobile_no;
                $personalI->emergency_no = $data->emergency_no;
                // $personalI->disability = $data->disability;
                //save to database
                $personalI->save();

                $user->name = $data->name;
                $user->save();

                $stage = $user->stage()->get();
                if($stage && count($stage)>0){
                    $stage = $stage[0];
                    $stage->is_personal_info_done = true;
                    $stage->save();
                }
                else{
                    $stage = Stage::create(array(
                        'user_id'=>$user_id,
                        'is_personal_info_done'=>true,
                    ));
                }

                // return redirect()->route('educationalInformation')->with('type','success')->with('msg','Personal Information saved successfully.');
                return response()->json(['type'=>'success','msg'=>'Stage Completed!']);
            }
            else{
                //otherwise create one
                $personal = PersonalI::create((array)$data);
                $user->name = $data->name;
                $user->save();
                $stage = $user->stage()->get();
                if($stage && count($stage)>0){
                    $stage = $stage[0];
                    $stage->is_personal_info_done = true;
                    $stage->save();
                }
                else{
                    $stage = Stage::create(array(
                        'user_id'=>$user_id,
                        'is_personal_info_done'=>true,
                    ));
                }
                // return redirect()->route('educationalInformation')->with('type','success')->with('msg','Personal Information saved successfully.');
                return response()->json(['type'=>'success','msg'=>'Stage Completed!']);
            }

            // return redirect()->back()->with('type','error')->with('msg','Unknow error. Please try again.');
            return response()->json(['type'=>'danger','msg'=>'Unknown Error. Please try again']);

        }
        else{
            //session is expired
            // return redirect()->route('login')->with('type','error')->with('msg','Session expired. Login to continue');
            return response()->json(['type'=>'danger','msg'=>'Session expired. Please login again']);
        }

    }

    public function fileUpload(Request $request) {
        $user = Auth::user();
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
        $image = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $image);
        $url='images/'.$image;
        return response()->json(['url'=>$url]);
    }
}
