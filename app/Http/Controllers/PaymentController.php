<?php

namespace App\Http\Controllers;
use App\Payment;
use App\User;
use App\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //

    public function residentIndex(){
        $user = Auth::user();
        if($user){
            $payment = $user->payment()->get();
            if($payment && count($payment)>0){
                $payment = $payment[0];
            }
            else{
                $payment = Payment::create(array(
                    'user_id'=>$user->id,
                ));
            }
            
            return view('resident')->with('payment',$payment);
        }
        else{
            return view('login')->with('type','warning')->with('msg','Session Expired. Please Login again');
        } 
    }
    public function paymentMethodIndex(){
        $user = Auth::user();
        if($user){
            $payment = $user->payment()->get();
            if($payment && count($payment)>0){
                $payment = $payment[0];
            }
            else{
                $payment = new Payment;
            }
            return view('paymentMethod')->with('payment',$payment);
        }
        else{
            return view('login')->with('type','warning')->with('msg','Session Expired. Please Login again');
        } 
    }

    public function chalanMethodIndex(){
        $user = Auth::user();
        if($user){
            $payment = $user->payment()->get();
            if($payment && count($payment)>0){
                $payment = $payment[0];
            }
            else{
                $payment = new Payment;
            }
            return view('chalanMethod')->with('payment',$payment);
        }
        else{
            return view('login')->with('type','warning')->with('msg','Session Expired. Please Login again');
        } 
    }

    public function onlineMethodIndex(){
        $user = Auth::user();
        if($user){
            $payment = $user->payment()->get();
            if($payment && count($payment)>0){
                $payment = $payment[0];
            }
            else{
                $payment = new Payment;
            }
            return view('onlineMethod')->with('payment',$payment);
        }
        else{
            return view('login')->with('type','warning')->with('msg','Session Expired. Please Login again');
        } 
    }

    public function codMethodIndex(){
        $user = Auth::user();
        if($user){
            $payment = $user->payment()->get();
            if($payment && count($payment)>0){
                $payment = $payment[0];
            }
            else{
                $payment = new Payment;
            }
            return view('codMethod')->with('payment',$payment);
        }
        else{
            return view('login')->with('type','warning')->with('msg','Session Expired. Please Login again');
        } 
    }

    public function overseasMethodIndex(){
        $user = Auth::user();
        if($user){
            $payment = $user->payment()->get();
            if($payment && count($payment)>0){
                $payment = $payment[0];
            }
            else{
                $payment = new Payment;
            }
            return view('overseasMethod')->with('payment',$payment);
        }
        else{
            return view('login')->with('type','warning')->with('msg','Session Expired. Please Login again');
        } 

    }



    public function afterPaymentIndex(){
        $user = Auth::user();
        if($user){
            return view('afterPayment');
        }
        else{
            return view('login')->with('type','warning')->with('msg','Session Expired. Please Login again');
        } 
    }


    public function residentSubmit(Request $request){
        $user = Auth::user();
        if($user){
            $payment = $user->payment()->get();
            if($payment && count($payment)>0){
                $payment = $payment[0];
                $payment->resident = $request->input('resident');
                $payment->save();

                $stage = $user->stage()->get();
                if($stage && count($stage)>0){
                    $stage = $stage[0];
                    $stage->is_residence_done = true;
                    $stage->save();
                }

                if($payment->resident == 'overseas'){
                    return redirect('overseasMethod');
                }

                return redirect('paymentMethod');
            }
            else{
                $payment = Payment::create(array(
                    'user_id'=>$user->id,
                    'resident'=>$request->input('resident')
                ));
                return redirect('paymentMethod');
            }
            return redirect('resident')->with('type','danger')->with('unknown error. Please try again');
        }
        else{
            return view('login')->with('type','warning')->with('msg','Session Expired. Please Login again');
        } 
    }

    public function paymentMethodSubmit(Request $request){
        $user = Auth::user();
        if($user){
            $payment = $user->payment()->get();
            if($payment && count($payment)>0){
                $payment = $payment[0];
                $payment->payment_method = $request->input('payment-method');
                $payment->save();

                $stage = $user->stage()->get();
                if($stage && count($stage)>0){
                    $stage = $stage[0];
                    $stage->is_payment_method_done = true;
                    $stage->save();
                }
                else{
                    return redirect('personalInformation')->with('type','warning')->with('msg','Kindly fill these details first');
                }

                if($request->input('payment-method') == 'chalan'){
                    return redirect('chalanMethod');
                }
                else if($request->input('payment-method') == 'online'){
                    return redirect('onlineMethod');
                }
                else if($request->input('payment-method') == 'cod'){
                    return redirect('codMethod');
                }
                else{
                    return redirect('paymentMethod')->with('type','danger')->with('msg','Unknown Payment Method');
                }

                return redirect('paymentMethod')->with('type','danger')->with('msg','Unknown Payment Method');
                
            }
            else{
                return redirect('resident')->with('type','warning')->with('msg','Please choose your residence first');
            }
            return redirect('resident')->with('type','danger')->with('Unknown error. Please try again');
        }
        else{
            return view('login')->with('type','warning')->with('msg','Session Expired. Please Login again');
        } 
    }

    public function chalanMethodSubmit(Request $request){
        $user = Auth::user();
        if($user){
            $payment = $user->payment()->get();
            if($payment && count($payment)>0){
                $payment = $payment[0];
                $payment->amount = $request->input('amount');
                $payment->branch_address = $request->input('branch-address');
                $payment->save();

                return redirect('afterPayment');
            }
            else{
                
                return redirect('resident')->with('type','danger')->with('msg','Please select your resident first');
            }
            return redirect('resident')->with('type','danger')->with('unknown error. Please try again');
        }
        else{
            return view('login')->with('type','warning')->with('msg','Session Expired. Please Login again');
        } 
    }


    public function onlineMethodSubmit(Request $request){
        $user = Auth::user();
        if($user){
            $payment = $user->payment()->get();
            if($payment && count($payment)>0){
                $payment = $payment[0];
                $payment->amount = $request->input('amount');
                $payment->account_no = $request->input('account-no');
                $payment->save();

                return redirect('afterPayment');
            }
            else{
                
                return redirect('resident')->with('type','danger')->with('msg','Please select your resident first');
            }
            return redirect('resident')->with('type','danger')->with('unknown error. Please try again');
        }
        else{
            return view('login')->with('type','warning')->with('msg','Session Expired. Please Login again');
        } 
    }


}
