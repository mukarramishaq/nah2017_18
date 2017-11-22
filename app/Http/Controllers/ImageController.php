<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    class ImageController extends Controller
    {
        public function getImage(){
            return view('ajaxUploadImage');
        }
        public function ajaxUploadImage(Request $request){
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1020',
              ]);
            $image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $image);
            $url='images/'.$image;
            return response()->json(['url'=>$url]);
        }
    }

