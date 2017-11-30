<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Price;
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
        return view('home')->with('price',$price)->with('user',$user);
    }
}
