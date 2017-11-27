<?php

namespace App\Http\Controllers;
use App\Payment;
use App\User;
use App\Stage;
use App\Chalan;
use App\Price;
use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use PDF;

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

    public function downloadChalan(Request $request){
        $user = Auth::user();
        if($user){
            $chalan = $user->chalan()->get();
            if($chalan && count($chalan)>0){
                $chalan = $chalan[0];
                $guests = $user->guest()->get();
                $price = Price::where('id',1)->first();
                $totalAmount = 0;
                $totalAmount += $price->alumni_price;
                if($guests && count($guests)>0){
                    $noOfGuest = count($guests);
                    $totalAmount += $noOfGuest*$price->guest_price;
                }

                if($totalAmount != $chalan->amount){
                    $chalan->amount = $totalAmount;
                    $chalan->save();
                }

                $pdf = PDF::loadView('chalan',[
                    'user_id'=>$chalan->user_id,
                    'chalan_id'=>$chalan->chalan_id,
                    'name'=>$chalan->name,
                    'cnic'=>$chalan->cnic,
                    'school'=>$chalan->school,
                    'issue_date'=>$chalan->issue_date,
                    'amount'=>$chalan->amount,
                    'due_date'=>$chalan->due_date,
                ]);
                $pdf->setPaper('A4', 'landscape');
                return $pdf->download('chalan.pdf');
                
            }
            else{
                $guests = $user->guest()->get();
                $price = Price::where('id',1)->first();
                if($guests && count($guests)>0){
                    $noOfGuest = count($guests);
                    $totalAmount = 0;
                    $totalAmount += $noOfGuest*$price->guest_price;
                    $totalAmount += $price->alumni_price;

                    $personalI = $user->personalI()->get();
                    $personalI = $personalI[0];

                    $educationalI = $user->educationalI()->get();
                    $educationalI = $educationalI[0];
                    $chalan = Chalan::create(array(
                        'user_id'=>$user->id,
                        'chalan_id'=>time(),
                        'name'=>$user->name,
                        'cnic'=>$personalI->cnic,
                        'school'=>$educationalI->school,
                        'issue_date'=>time(),
                        'amount'=>$totalAmount,
                        'due_date'=>'19/12/2017',
                    ));
                    $pdf = PDF::loadView('chalan',[
                        'user_id'=>$chalan->user_id,
                        'chalan_id'=>$chalan->chalan_id,
                        'name'=>$chalan->name,
                        'cnic'=>$chalan->cnic,
                        'school'=>$chalan->school,
                        'issue_date'=>$chalan->issue_date,
                        'amount'=>$chalan->amount,
                        'due_date'=>$chalan->due_date,
                    ]);
                    $pdf->setPaper('A4', 'landscape');
                    return $pdf->download('chalan.pdf');
                }
                else{

                    $totalAmount = $price->alumni_price;
                    
                    $personalI = $user->personalI()->get();
                    $personalI = $personalI[0];

                    $educationalI = $user->educationalI()->get();
                    $educationalI = $educationalI[0];
                    $chalan = Chalan::create(array(
                        'user_id'=>$user->id,
                        'chalan_id'=>time(),
                        'name'=>$user->name,
                        'cnic'=>$personalI->cnic,
                        'school'=>$educationalI->school,
                        'issue_date'=>time(),
                        'amount'=>$totalAmount,
                        'due_date'=>'19/12/2017',
                    ));

                    $pdf = PDF::loadView('chalan',['$chalan'=>$chalan,'uuid',$user->uuid]);
                    $pdf->setPaper('A4', 'landscape');
                    return $pdf->download('chalan.pdf');
    
                }
            }

            
            
        }
        else{
            return redirect('login')->with('type','warning')->with('msg','Session expired. Login again to continue');
        }
        

    }


}
