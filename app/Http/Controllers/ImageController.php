<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\PersonalI;
class ImageController extends Controller
{
    public function getImage(){
        return view('ajaxUploadImage');
    }
    public function ajaxUploadImage(Request $request){
        $user = Auth::user();
        if(!$user){
          return response()->json(['type'=>'error','msg'=>'Session expired']);  
        }
        
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        $image = $user->id.'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $image);
        $url='images/'.$image;

        

        $personalI = $user->personalI()->get();
        if($personalI && count($personalI)>0){
            $personalI = $personalI[0];

            $personalI->picture_path = $image;
            $personalI->save();

            $user->is_image_uploaded = true;
            $user->save();

        }
        else{
            $personalI = PersonalI::create(array(
                'user_id'=>$user->id,
                'picture_path'=>$image,
            ));

            $user->is_image_uploaded = true;
            $user->save();
        }



        return response()->json(['url'=>$url]);

    }
}

