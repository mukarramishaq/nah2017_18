<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Price;
use App\User;
use App\Admin;
use App\Status;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check()){
            return $this->route('login')->with('type','warning')->with('msg','Please login first to proceed');
        }
        $user = Auth::user();
        $price = Price::where('id',1)->first();
        $status = \DB::table('statuses')->where('user_id',$user->id)->first();
        if(!$status){
            $status = new Status;
        }
        
        return view('home')->with('price',$price)->with('user',$user)->with('status',$status);
    }
}
