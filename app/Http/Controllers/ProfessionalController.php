<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\ProfessionalI;
use App\EntrepI;
use App\Country;
use App\HigherEducation;
class ProfessionalController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('checkProfessionalStage');
     }

    public function index(Request $request){
        $user = Auth::user();
        $professionalI = $user->professionalI()->get();
        $entrepI = $user->entrepI()->get();
        $countries = Country::all();
        $higherE = $user->higherEducation()->get();

        if($professionalI && count($professionalI)>0){
            $professionalI = $professionalI[0];
        }
        else{
            $professionalI = new ProfessionalI;
        }

        if($entrepI && count($entrepI)>0){
            $entrepI = $entrepI[0];
        }
        else{
            $entrepI = new EntrepI;
        }
        
        if($higherE && count($higherE)>0){
            $higherE = $higherE[0];
        }
        else{
            $higherE = new HigherEducation;
        }

        if($user){
            return view('professionalInformation')->with('higherE',$higherE)->with('professionalI',$professionalI)->with('entrepI',$entrepI)->with('countries',$countries);
        }
        else{
            return redirect()->route('login')->with('type','error')->with('msg','Session expired. Login to continue');
        }
    }

    public function save(Request $request){
        $this->validate($request,[
            'employed'=>'required|alpha',
        ]);
        $user = Auth::user();
        if($user){
            //if applicant is unemployed


            if($request->input('employed') == 'unemployed'){
                
                $this->validate($request,[
                    'country'=>'present|nullable|alpha|size:2',
                    'city'=>'present|nullable|regex:/^[a-zA-Z ]*$/',
                    'address'=>'present|nullable|string',
                ]);

                
                $data = (object) array(
                    'user_id'=>$user->id,
                    'country'=>$request->input('country'),
                    'employed'=>$request->input('employed'),
                    
                    'city'=>$request->input('city'),
                    'address'=>$request->input('address')
                );
                
                $professionalI = $user->professionalI()->get();
                if($professionalI && count($professionalI)>0){
                    $professionalI = $professionalI[0];
                    $professionalI->employed = $data->employed;
                    $professionalI->country = $data->country;
                    $professionalI->city = $data->city;
                    $professionalI->address = $data->address;
                    
                    $professionalI->save(); //save to database
                    return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
                }
                else{
                    //create entry
                    $professionalI = ProfessionalI::create((array)$data);
                    return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
                }

                return \Response::json(['type'=>'error','msg'=>'Unknown error while saving data. Please try again.']);

            }

            else if($request->input('employed') == 'employed'){
                $this->validate($request,[
                    'country'=>'present|nullable|alpha|size:2',
                    'city'=>'present|nullable|regex:/^[a-zA-Z ]*$/',
                    'address'=>'present|nullable|string',
                    'industry'=>'present|nullable|string',
                    'organization'=>'present|nullable|alpha_dash',
                    'designation'=>'present|nullable|alpha_dash',
                ]);
                
                $data = (object) array(
                    
                    'user_id'=>$user->id,
                    'employed'=>$request->input('employed'),
                    'industry'=>$request->input('industry'),
                    'organization'=>$request->input('organization'),
                    'designation'=>$request->input('designation'),
                    'country'=>$request->input('country'),
                    // 'country'=>'Aus',
                    
                    'city'=>$request->input('city'),
                    'address'=>$request->input('address')
                );
                // if($request->input('industry') == 'other')
                // {
                    
                //     // $data['industry'] = $request->input('otherIndustry');
                //     $data->industry = $request->input('otherIndustry');
                    
                // }

                // if($request->input('designation') == 'other')
                // {
                //     // $data['designation'] = $request->input('otherDesignation');
                //     $data->designation = $request->input('otherDesignation');
                    

                // }

                

                $professionalI = $user->professionalI()->get();
                if($professionalI && count($professionalI)>0){
                    $professionalI = $professionalI[0];
                    $professionalI->employed = $data->employed;
                    $professionalI->industry = $data->industry;
                    $professionalI->organization = $data->organization;
                    $professionalI->designation = $data->designation;
                    $professionalI->country = $data->country;
                    $professionalI->city = $data->city;
                    $professionalI->address = $data->address;
                    
                    $professionalI->save(); //save to database
                    return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
                }
                else{
                    //create entry
                    $professionalI = ProfessionalI::create((array)$data);
                    return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
                }

                return \Response::json(['type'=>'error','msg'=>'Unknown error while saving data. Please try again.']);

            }
            // selfemplyed
            else if($request->input('employed') == 'selfemployed'){
                $this->validate($request,[
                    'country'=>'present|nullable|alpha|size:2',
                    'city'=>'present|nullable|regex:/^[a-zA-Z ]*$/',
                    'address'=>'present|nullable|string',
                    'selfIndustry'=>'present|nullable|string',
                    'ecompany'=>'present|nullable|alpha_dash',
                    'selfDesignation'=>'present|nullable|alpha_dash',
                    // 'totalEmployes'=>'present|nullable|numeric',
                    // 'nustians'=>'present|nullable|numeric',
                    // 'link'=>'present|nullable|url',
                    // 'date'=>'present|nullable|regex:(^\d{2}\/\d{2}\/\d{4}$)',
                ]);
                
                $data = (object) array(
                    'user_id'=>$user->id,
                    'employed'=>$request->input('employed'),
                    'industry'=>$request->input('selfIndustry'),
                    
                    'designation'=>$request->input('selfDesignation'),
                    
                    // 'company_logo_path'=>$request->input('eCompanyLogo'),
                    
                    'country'=>$request->input('country'),
                    'city'=>$request->input('city'),
                    'address'=>$request->input('address')
                );

                $data1 = (object) array(
                    'user_id'=>$user->id,
                    'industry'=>$request->input('selfIndustry'),
                    'company_name'=>$request->input('ecompany'),
                    // 'established_date'=>$request->input('date'),
                    'designation'=>$request->input('selfDesignation'),
                    // 'total_employees'=>$request->input('totalEmployes'),
                    // 'total_nustian_employees'=>$request->input('nustians'),
                    // 'website_link'=>$request->input('link'),
                );
              

                
                $professionalI = $user->professionalI()->get();
                $entrepI = $user->entrepI()->get();
                if($entrepI && count($entrepI)>0)
                {
                    $entrepI = $entrepI[0];
                    $entrepI->industry = $data1->industry;
                    $entrepI->company_name = $data1->company_name;
                    // $entrepI->established_date = $data1->established_date;
                    $entrepI->designation = $data1->designation;
                    // $entrepI->company_logo_path = $data->logo;
                    // $entrepI->total_employees = $data1->total_employees;
                    // $entrepI->total_nustian_employees = $data1->total_nustian_employees;
                    // $entrepI->website_link = $data1->website_link;
                    
                    $entrepI->save(); // save to database...    
                }
                else{
                    $data1 = (array) $data1;
                    $entrepI = EntrepI::create((array)$data1);
                    
                }

                if($professionalI && count($professionalI)>0){
                    $professionalI = $professionalI[0];
                    $professionalI->user_id = $data->user_id;
                    $professionalI->employed = $data->employed;
                    $professionalI->industry = $data->industry;
                    $professionalI->designation = $data->designation;
                    $professionalI->country = $data->country;
                    $professionalI->city = $data->city;
                    $professionalI->address = $data->address;
                    
                    $professionalI->save(); //save to database
                    return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
                }
                else{
                    //create entry
                    $data = (array) $data;
                    $professionalI = ProfessionalI::create((array)$data);
                    return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
                }

                return \Response::json(['type'=>'error','msg'=>'Unknown error while saving data. Please try again.']);



            }

            // higher Education...

            else if($request->input('employed') == 'highereducation'){
                $this->validate($request,[
                    'country'=>'present|nullable|alpha|size:2',
                    'city'=>'present|nullable|regex:/^[a-zA-Z ]*$/',
                    'address'=>'present|nullable|string',
                    'degreeName'=>'present|nullable|string',
                    'universityName'=>'present|nullable|string',
                    
                ]);
                
                $data = (object) array(
                    'user_id'=>$user->id,
                    'country'=>$request->input('country'),
                    'city'=>$request->input('city'),
                    'address'=>$request->input('address')
                );

                $data1 = (object) array(
                    'user_id'=>$user->id,
                    'degree_name'=>$request->input('degreeName'),
                    'university_name'=>$request->input('universityName'),
                );
                

                
                $professionalI = $user->professionalI()->get();
                $high_edu = $user->higherEducation()->get();
                if($high_edu && count($high_edu)>0)
                {
                    $high_edu = $high_edu[0];
                    $high_edu->user_id = $data1->user_id;
                    $high_edu->university_name = $data1->university_name;
                    $high_edu->degree_name = $data1->degree_name;
                    
                    
                    $high_edu->save(); // save to database...    
                }
                else{
                    $data1 = (array) $data1;
                    $high_edu = HigherEducation::create((array)$data1);
                    
                }

                if($professionalI && count($professionalI)>0){
                    $professionalI = $professionalI[0];
                    $professionalI->user_id = $data->user_id;
                    $professionalI->country = $data->country;
                    $professionalI->city = $data->city;
                    $professionalI->address = $data->address;
                    $professionalI->employed = $request->input('employed');
                    
                    $professionalI->save(); //save to database
                    return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
                }
                else{
                    //create entry
                    $data = (array) $data;
                    $professionalI = ProfessionalI::create((array)$data);
                    return \Response::json(['type'=>'success','msg'=>'Data saved successfully.']);
                }

                return \Response::json(['type'=>'error','msg'=>'Unknown error while saving data. Please try again.']);



            }
            




            // higher Education ends here ...


        }
        else{
            //either session is expired or page is directly being accessed so stop it
            return \Response::json(['type'=>'error','msg'=>'Your session is expired. Please login to continue']);
        }
    }
// save function ends here...









    public function saveAndNext(Request $request){
        $this->validate($request,[
            'employed'=>'present|required|alpha',
        ]);
        $user = Auth::user();
        if($user){
            //if applicant is unemployed
            if($request->input('employed') == 'unemployed')
            {
                $this->validate($request,[
                    'currentCountry'=>'present|required|alpha|size:2',
                    'currentCity'=>'present|required|regex:/^[a-zA-Z ]*$/',
                    'currentAddress'=>'present|required|string',
                ]);
                $data = (object) array(
                    'user_id'=>$user->id,
                    'employed'=>$request->input('employed'),
                    'country'=>$request->input('currentCountry'),
                    'city'=>$request->input('currentCity'),
                    'address'=>$request->input('currentAddress')
                );
                \Log::info((array) $data);
                $professionalI = $user->professionalI()->get();
                if($professionalI && count($professionalI)>0){
                    $professionalI = $professionalI[0];
                    $professionalI->employed = $data->employed;
                    $professionalI->country = $data->country;
                    $professionalI->city = $data->city;
                    $professionalI->address = $data->address;
                    
                    $professionalI->save(); //save to database
                    $stage = $user->stage()->get();
                    if($stage && count($stage)>0){
                        $stage = $stage[0];
                        $stage->is_professional_info_done = true;
                        $stage->save();
                    }
                    else{
                        $stage = Stage::create(array(
                            'user_id'=>$user_id,
                            'is_professional_info_done'=>true,
                        ));
                    }

                    return redirect()->route('guestsInfo')->with('type','success')->with('msg','Professional Information saved successfully.');
                }
                else{
                    //otherwise create one
                    $data = (array) $data;
                    $professional = ProfessionalI::create($data);
                    $stage = $user->stage()->get();
                    if($stage && count($stage)>0){
                        $stage = $stage[0];
                        $stage->is_professional_info_done = true;
                        $stage->save();
                    }
                    else{
                        $stage = Stage::create(array(
                            'user_id'=>$user_id,
                            'is_professional_info_done'=>true,
                        ));
                    }
                    return redirect()->route('guestsInfo')->with('type','success')->with('msg','Professional Information saved successfully.');
                    
                }

                return redirect()->back()->with('type','error')->with('msg','Unknow error. Please try again.');

            }


            // 2nd
            else if($request->input('employed') == 'employed'){
                $this->validate($request,[
                    'currentCountry'=>'present|required|alpha|size:2',
                    'currentCity'=>'present|required|regex:/^[a-zA-Z ]*$/',
                    'currentAddress'=>'present|required|string',
                    'eIndustry'=>'present|required|string',
                    'eOrganization'=>'present|required|alpha_dash',
                    'eDesignation'=>'present|required|alpha_dash',
                ]);
                $data = (object) array(
                    'user_id'=>$user->id,
                    'employed'=>$request->input('employed'),
                    'industry'=>$request->input('eIndustry'),
                    'organization'=>$request->input('eOrganization'),
                    'designation'=>$request->input('eDesignation'),
                    'country'=>$request->input('currentCountry'),
                    'city'=>$request->input('currentCity'),
                    'address'=>$request->input('currentAddress')
                );
                // if($request->input('industry') == 'other')
                // {
                //     $data->industry = $request->input('otherIndustry');
                // }

                // if($request->input('designation') == 'other')
                // {
                //     // $data['designation'] = $request->input('otherDesignation');
                //     $data->designation = $request->input('otherDesignation');
                    

                // }

                \Log::info((array) $data);
                $professionalI = $user->professionalI()->get();
                if($professionalI && count($professionalI)>0){
                    $professionalI = $professionalI[0];
                    $professionalI->employed = $data->employed;
                    $professionalI->industry = $data->industry;
                    $professionalI->organization = $data->organization;
                    $professionalI->designation = $data->designation;
                    $professionalI->country = $data->country;
                    $professionalI->city = $data->city;
                    $professionalI->address = $data->address;
                    
                    $professionalI->save(); //save to database
                    $stage = $user->stage()->get();
                    if($stage && count($stage)>0){
                        $stage = $stage[0];
                        $stage->is_professional_info_done = true;
                        $stage->save();
                    }
                    else{
                        $stage = Stage::create(array(
                            'user_id'=>$user_id,
                            'is_professional_info_done'=>true,
                        ));
                    }
                    return redirect()->route('guestsInfo')->with('type','success')->with('msg','Professional Information saved successfully.');
                }
                else{
                    //otherwise create one
                    $data = (array) $data;
                    $professional = ProfessionalI::create($data);
                    $stage = $user->stage()->get();
                    if($stage && count($stage)>0){
                        $stage = $stage[0];
                        $stage->is_professional_info_done = true;
                        $stage->save();
                    }
                    else{
                        $stage = Stage::create(array(
                            'user_id'=>$user_id,
                            'is_professional_info_done'=>true,
                        ));
                    }
                    return redirect()->route('guestsInfo')->with('type','success')->with('msg','Professional Information saved successfully.');
                    
                }
                return redirect()->back()->with('type','error')->with('msg','Unknow error. Please try again.');
                



            }

            // 3rd
            else if($request->input('employed') == 'selfemployed'){
                $this->validate($request,[
                    'currentCountry'=>'present|required|alpha|size:2',
                    'currentCity'=>'present|required|regex:/^[a-zA-Z ]*$/',
                    'currentAddress'=>'present|required|string',
                    'seIndustry'=>'present|required|string',
                    'seCompany'=>'present|required|alpha_dash',
                    'seDesignation'=>'present|required|alpha_dash',
                    // 'seTotalEmployes'=>'present|required|numeric',
                    // 'seTotalNustEmployes'=>'present|required|numeric',
                    // 'eWebsite'=>'present|required|url',
                    // 'seEstablishedDate'=>'present|required|regex:(^\d{2}\/\d{2}\/\d{4}$)',
                ]);
                $data = (object) array(
                    'user_id'=>$user->id,
                    'employed'=>$request->input('employed'),
                    'industry'=>$request->input('seIndustry'),
                    
                    'designation'=>$request->input('seDesignation'),
                    
                    // 'company_logo_path'=>$request->input('eCompanyLogo'),
                    
                    'country'=>$request->input('currentCountry'),
                    'city'=>$request->input('currentCity'),
                    'address'=>$request->input('currentAddress')
                );

                $data1 = (object) array(
                    'user_id'=>$user->id,
                    'industry'=>$request->input('seIndustry'),
                    'company_name'=>$request->input('seCompany'),
                    // 'established_date'=>$request->input('seEstablishedDate'),
                    'designation'=>$request->input('seDesignation'),
                    // 'total_employees'=>$request->input('seTotalEmployes'),
                    // 'total_nustian_employees'=>$request->input('seTotalNustEmployes'),
                    // 'website_link'=>$request->input('eWebsite'),



                );
                if($request->input('eIndustry') == 'other')
                {
                    $data->industry = $request->input('eOtherIndustry');
                    $data1->industry = $request->input('eOtherIndustry');
                    
                }

                if($request->input('eDesignation') == 'other')
                {
                    $data->designation = $request->input('eOtherDesignation');
                    $data1->designation = $request->input('eOtherDesignation');
                    
                }

                $professionalI = $user->professionalI()->get();
                $entrepI = $user->entrepI()->get();
                if($entrepI && count($entrepI)>0)
                {
                    $entrepI = $entrepI[0];
                    $entrepI->industry = $data1->industry;
                    $entrepI->company_name = $data1->company_name;
                    // $entrepI->established_date = $data1->established_date;
                    $entrepI->designation = $data1->designation;
                    // $entrepI->company_logo_path = $data->logo;
                    // $entrepI->total_employees = $data1->total_employees;
                    // $entrepI->total_nustian_employees = $data1->total_nustian_employees;
                    // $entrepI->website_link = $data1->website_link;
                    
                    $entrepI->save(); // save to database...    
                }
                else{
                    $data1 = (array) $data1;
                    $entrepI = EntrepI::create((array)$data1);
                    
                }
                if($professionalI && count($professionalI)>0){
                    $professionalI = $professionalI[0];
                    $professionalI->user_id = $data->user_id;
                    $professionalI->employed = $data->employed;
                    $professionalI->industry = $data->industry;
                    $professionalI->designation = $data->designation;
                    $professionalI->country = $data->country;
                    $professionalI->city = $data->city;
                    $professionalI->address = $data->address;
                    
                    $professionalI->save(); //save to database
                    $stage = $user->stage()->get();
                    if($stage && count($stage)>0){
                        $stage = $stage[0];
                        $stage->is_professional_info_done = true;
                        $stage->save();
                    }
                    else{
                        $stage = Stage::create(array(
                            'user_id'=>$user_id,
                            'is_professional_info_done'=>true,
                        ));
                    }
                    return redirect()->route('guestsInfo')->with('type','success')->with('msg','Professional Information saved successfully.');
                }
                else{
                    //otherwise create one
                    $data = (array) $data;
                    $professional = ProfessionalI::create($data);
                    $stage = $user->stage()->get();
                    if($stage && count($stage)>0){
                        $stage = $stage[0];
                        $stage->is_professional_info_done = true;
                        $stage->save();
                    }
                    else{
                        $stage = Stage::create(array(
                            'user_id'=>$user_id,
                            'is_professional_info_done'=>true,
                        ));
                    }
                    return redirect()->route('guestsInfo')->with('type','success')->with('msg','Professional Information saved successfully.');
                    
                }

                return redirect()->back()->with('type','error')->with('msg','Unknow error. Please try again.');
                




            }

            // 4th...
            else if($request->input('employed') == 'highereducation'){
                
                $this->validate($request,[
                    'currentCountry'=>'present|nullable|alpha|size:2',
                    'currentCity'=>'present|nullable|regex:/^[a-zA-Z ]*$/',
                    'currentAddress'=>'present|nullable|string',
                    'heDegreeName'=>'present|nullable|string',
                    'heUniversityName'=>'present|nullable|string',
                    
                ]);
                $data = (object) array(
                    'user_id'=>$user->id,
                    'country'=>$request->input('currentCountry'),
                    'city'=>$request->input('currentCity'),
                    'address'=>$request->input('currentAddress')
                );

                $data1 = (object) array(
                    'user_id'=>$user->id,
                    'degree_name'=>$request->input('heDegreeName'),
                    'university_name'=>$request->input('heUniversityName'),
                );
                
                

                $professionalI = $user->professionalI()->get();
                $high_edu = $user->higherEducation()->get();
                if($high_edu && count($high_edu)>0)
                {
                    $high_edu = $high_edu[0];
                    $high_edu->user_id = $data1->user_id;
                    $high_edu->degree_name = $data1->degree_name;
                    $high_edu->university_name = $data1->university_name;
                    
                    
                    $high_edu->save(); // save to database...    
                }
                else{
                    $data1 = (array) $data1;
                    $entrepI = HigherEducation::create((array)$data1);
                    
                }
                if($professionalI && count($professionalI)>0){
                    $professionalI = $professionalI[0];
                    $professionalI->user_id = $data->user_id;
                    $professionalI->country = $data->country;
                    $professionalI->city = $data->city;
                    $professionalI->address = $data->address;                    
                    $professionalI->employed = $request->input('employed');
                    
                    $professionalI->save(); //save to database
                    $stage = $user->stage()->get();
                    if($stage && count($stage)>0){
                        $stage = $stage[0];
                        $stage->is_professional_info_done = true;
                        $stage->save();
                    }
                    else{
                        $stage = Stage::create(array(
                            'user_id'=>$user_id,
                            'is_professional_info_done'=>true,
                        ));
                    }
                    return redirect()->route('guestsInfo')->with('type','success')->with('msg','Professional Information saved successfully.');
                }
                else{
                    //otherwise create one
                    $data = (array) $data;
                    $professional = ProfessionalI::create($data);
                    $stage = $user->stage()->get();
                    if($stage && count($stage)>0){
                        $stage = $stage[0];
                        $stage->is_professional_info_done = true;
                        $stage->save();
                    }
                    else{
                        $stage = Stage::create(array(
                            'user_id'=>$user_id,
                            'is_professional_info_done'=>true,
                        ));
                    }
                    return redirect()->route('guestsInfo')->with('type','success')->with('msg','Professional Information saved successfully.');
                    
                }

                return redirect()->back()->with('type','error')->with('msg','Unknow error. Please try again.');
                




            }

            // 4th ends here ...

            
        }
        else{
            //session is expired
            return redirect()->route('login')->with('type','error')->with('msg','Session expired. Login to continue');
        }


    }
    // saveAndNext ends here...


}
