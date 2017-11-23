<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\ProfessionalI;
use App\EntrepI;
class ProfessionalController extends Controller
{
    //
    public function index(Request $request){
        $user = Auth::user();
        $professionalI = $user->professionalI()->get();
        if($professionalI && count($professionalI)>0){
            $professionalI = $professionalI[0];
        }
        else{
            $professionalI = new ProfessionalI;
        }
        if($user){
            return view('professionalInformation')->with('professionalI',$professionalI);
        }
        else{
            return redirect()->to('login')->with('type','error')->with('msg','Session expired. Login to continue');
        }
    }

    public function save(Request $request){
        $user = Auth::user();
        if($user){
            //if applicant is unemployed

            if($request->input('employed') == 'unemployed'){
                echo "test";
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
                    return \Response::json(['success'=>'success','msg'=>'Data saved successfully.']);
                }
                else{
                    //create entry
                    $professionalI = ProfessionalI::create((array)$data);
                    return \Response::json(['success'=>'success','msg'=>'Data saved successfully.']);
                }

                return \Response::json(['error'=>'error','msg'=>'Unknown error while saving data. Please try again.']);

            }

            else if($request->input('employed') == 'employed'){
                echo "test";
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
                if($request->input('industry') == 'other')
                {
                    
                    // $data['industry'] = $request->input('otherIndustry');
                    $data->industry = $request->input('otherIndustry');
                    
                }

                if($request->input('designation') == 'other')
                {
                    // $data['designation'] = $request->input('otherDesignation');
                    $data->designation = $request->input('otherDesignation');
                    

                }

                

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
                    return \Response::json(['success'=>'success','msg'=>'Data saved successfully.']);
                }
                else{
                    //create entry
                    $professionalI = ProfessionalI::create((array)$data);
                    return \Response::json(['success'=>'success','msg'=>'Data saved successfully.']);
                }

                return \Response::json(['error'=>'error','msg'=>'Unknown error while saving data. Please try again.']);

            }
            // selfemplyed
            else if($request->input('employed') == 'selfemployed'){
                $data = (object) array(
                    'user_id'=>$user->id,
                    'employed'=>$request->input('employed'),
                    'industry'=>$request->input('selfIndustry'),
                    'company'=>$request->input('ecompany'),
                    'designation'=>$request->input('selfDesignation'),
                    'date'=>$request->input('date'),
                    'logo'=>$request->input('logo'),
                    'totalEmployes'=>$request->input('totalEmployes'),
                    'nustians'=>$request->input('nustians'),
                    'link'=>$request->input('link'),
                    'country'=>$request->input('country'),
                    'city'=>$request->input('city'),
                    'address'=>$request->input('address')
                );
                if($request->input('selfIndustry') == 'other')
                {
                    $data->industry = $request->input('selfOtherIndustry');
                }

                if($request->input('selfDesignation') == 'other')
                {
                    $data->designation = $request->input('selfOtherDesignation');
                }

                
                $professionalI = $user->professionalI()->get();
                // $entrepI = $user->entrepI()->get();
                // if($entrepI && count($entrepI)>0)
                // {
                //     $entrepI = $entrepI[0];
                //     $entrepI->industry = $data->industry;
                //     $entrepI->company_name = $data->company;
                //     $entrepI->established_date = $data->date;
                //     $entrepI->designation = $data->designation;
                //     $entrepI->company_logo_path = $data->logo;
                //     $entrepI->total_employees = $data->totalEmployes;
                //     $entrepI->total_nustian_employees = $data->nustians;
                //     $entrepI->website_link = $data->link;
                    
                //     $entrepI->save(); // save to database...    
                // }
                // else{
                //     $entrepI = EntrepI::create((array)$data);
                    
                // }

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
                    return \Response::json(['success'=>'success','msg'=>'Data saved successfully.']);
                }
                else{
                    //create entry
                    $professionalI = ProfessionalI::create((array)$data);
                    return \Response::json(['success'=>'success','msg'=>'Data saved successfully.']);
                }

                return \Response::json(['error'=>'error','msg'=>'Unknown error while saving data. Please try again.']);



            }


        }
        else{
            //either session is expired or page is directly being accessed so stop it
            return \Response::json(['error'=>'error','msg'=>'Your session is expired. Please login to continue']);
        }
    }
// save function ends here...









    public function saveAndNext(Request $request){
        $user = Auth::user();
        if($user){
            //if applicant is unemployed
            if($request->input('employed') == 'unemployed')
            {
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
                    return redirect()->to('home')->with('type','success')->with('msg','Professional Information saved successfully.');
                }
                else{
                    //otherwise create one
                    $data = (array) $data;
                    $professional = ProfessionalI::create($data);
                    return redirect()->to('home')->with('type','success')->with('msg','Professional Information saved successfully.');
                    
                }

                return redirect()->back()->with('type','error')->with('msg','Unknow error. Please try again.');

            }


            // 2nd
            else if($request->input('employed') == 'employed'){
                $data = (object) array(
                    'user_id'=>$user->id,
                    'employed'=>$request->input('employed'),
                    'industry'=>$request->input('industry'),
                    'organization'=>$request->input('organization'),
                    'designation'=>$request->input('designation'),
                    'country'=>$request->input('currentCountry'),
                    'city'=>$request->input('currentCity'),
                    'address'=>$request->input('currentAddress')
                );
                if($request->input('industry') == 'other')
                {
                    $data->industry = $request->input('otherIndustry');
                }

                if($request->input('designation') == 'other')
                {
                    // $data['designation'] = $request->input('otherDesignation');
                    $data->designation = $request->input('otherDesignation');
                    

                }

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
                    return redirect()->to('home')->with('type','success')->with('msg','Professional Information saved successfully.');
                }
                else{
                    //otherwise create one
                    $data = (array) $data;
                    $professional = ProfessionalI::create($data);
                    return redirect()->to('home')->with('type','success')->with('msg','Professional Information saved successfully.');
                    
                }
                return redirect()->back()->with('type','error')->with('msg','Unknow error. Please try again.');
                



            }

            // 3rd
            else if($request->input('employed') == 'selfemployed'){
                $data = (object) array(
                    'user_id'=>$user->id,
                    'employed'=>$request->input('employed'),
                    'industry'=>$request->input('eOtherIndustry'),
                    
                    'designation'=>$request->input('eDesignation'),
                    
                    // 'company_logo_path'=>$request->input('eCompanyLogo'),
                    
                    'country'=>$request->input('currentCountry'),
                    'city'=>$request->input('currentCity'),
                    'address'=>$request->input('currentAddress')
                );

                $data1 = (object) array(
                    'user_id'=>$user->id,
                    'industry'=>$request->input('eOtherIndustry'),
                    'company_name'=>$request->input('eCompany'),
                    'established_date'=>$request->input('establishedDate'),
                    'designation'=>$request->input('eDesignation'),
                    'total_employees'=>$request->input('eTotalEmployes'),
                    'total_nustian_employees'=>$request->input('eTotalNustEmployes'),
                    'website_link'=>$request->input('eWebsite'),



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
                    $entrepI->established_date = $data1->established_date;
                    $entrepI->designation = $data1->designation;
                    // $entrepI->company_logo_path = $data->logo;
                    $entrepI->total_employees = $data1->total_employees;
                    $entrepI->total_nustian_employees = $data1->total_nustian_employees;
                    $entrepI->website_link = $data1->website_link;
                    
                    $entrepI->save(); // save to database...    
                }
                else{
                    $data1 = (array) $data1;
                    $entrepI = EntrepI::create((array)$data1);
                    
                }
                if($professionalI && count($professionalI)>0){
                    $professionalI = $professionalI[0];
                    $professionalI->user_id = $data->user_id;
                    $professionalI->employed = "selfemplyed";
                    $professionalI->industry = $data->industry;
                    $professionalI->designation = $data->designation;
                    $professionalI->country = $data->country;
                    $professionalI->city = $data->city;
                    $professionalI->address = $data->address;
                    
                    $professionalI->save(); //save to database
                    return redirect()->to('home')->with('type','success')->with('msg','Professional Information saved successfully.');
                }
                else{
                    //otherwise create one
                    $data = (array) $data;
                    $professional = ProfessionalI::create($data);
                    return redirect()->to('home')->with('type','success')->with('msg','Professional Information saved successfully.');
                    
                }

                return redirect()->back()->with('type','error')->with('msg','Unknow error. Please try again.');
                




            }

            
        }
        else{
            //session is expired
            return redirect()->to('login')->with('type','error')->with('msg','Session expired. Login to continue');
        }


    }
    // saveAndNext ends here...


}
