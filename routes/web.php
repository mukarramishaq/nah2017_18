<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome2');
});


Auth::routes();

Route::get('/register2/er/{pin}',['as'=>'register2ER','uses'=>'Auth\RegisterController@register2ER']);


Route::post('/auth/login',['as'=>'authLogin','uses'=>'Auth\LoginController@authenticateLogin']);
Route::get('/register/verify/{email}/{verification_code}','Auth\RegisterController@verifyEmail');
//route for resending confirmation email
Route::get('/resend/email/verification/{userId}/{email}',['as'=>'resendVerificationEmail','uses'=>'Auth\RegisterController@resendVerificationEmail']);

//not found 
Route::get('/notFound',function(){return view('notFound');})->name('NotFound');

Route::get('/getChalan',function(){return view('chalan');});

Route::group(['middleware'=>['App\Http\Middleware\IsAdmin']],function(){
    Route::get('/adminPanel',['as'=>'adminPanel','uses'=>'admin\AdminController@index']);
    Route::get('/userDetails/{user_id}', ['as'=>'userDetails','uses'=>'admin\AdminController@userDetails']);
    Route::post('/admin/approve/{admin_id}/{user_id}',['as'=>'adminApprove','uses'=>'admin\AdminController@approve']);
    Route::post('/admin/reject/{admin_id}/{user_id}',['as'=>'adminReject','uses'=>'admin\AdminController@reject']);
    Route::get('/download/uploaded/receipts/unapproved/{admin_id}/{user_id}/{token}',['as'=>'downloadUAReceipts','uses'=>'admin\AdminController@downloadUAReceipts']);
});

Route::group(['middleware'=>['App\Http\Middleware\IsAdmin2']],function(){
    Route::get('/adminPanel2',['as'=>'adminPanel2','uses'=>'admin\AdminController@index2']);
});

Route::get('/index/admin/{pin}/{phone_no}',['as'=>'adminIndex','uses'=>'Auth\LoginController@adminIndex']);
Route::post('/authenticate/admin',['as'=>'adminAuthenticate','uses'=>'Auth\LoginController@adminAuthenticate']);

Route::group(['middleware'=>['App\Http\Middleware\IsEmailVerified']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    
    // Route::get('/adminPanel', function () {
    // return view('adminPanel');
    // });
    


    Route::get('/change/payment/method/{user_id}/{token}',['as'=>'changePaymentMethod','uses'=>'PaymentController@changePaymentMethod']);




    Route::get('/personalInformation',['as'=>'personalInformation','uses'=>'PersonalController@index']);
    
    Route::get('/educationalInformation',['as'=>'educationalInformation','uses'=>'EducationalController@index']);
    Route::post('/educationalInformation/saveAndNext',['as'=>'educationalSaveAndNext','uses'=>'EducationalController@saveAndNext']);
    Route::post('/educationalInformation/save',['as'=>'educationalSave','uses'=>'EducationalController@save']);

    Route::get('/professionalInformation',['as'=>'professionalInformation','uses'=>'ProfessionalController@index']);
    Route::post('/professionalInformation/save',['as'=>'professionalSave','uses'=>'ProfessionalController@save']);
    Route::post('/professionalInformation/saveAndNext',['as'=>'professionalSaveAndNext','uses'=>'ProfessionalController@saveAndNext']);

    Route::get('/personalInformation/save', ['as'=>'personalSave', 'uses'=>'PersonalController@save']);
    Route::post('/personalInformation/saveAndNext', ['as'=>'personalSaveAndNext', 'uses'=>'PersonalController@saveAndNext']);
    Route::post('/personalInformation/saveImage', ['as'=>'personalSaveImage', 'uses'=>'PersonalController@saveImage']);
    
    Route::get('get-image','ImageController@getImage');
    Route::post('ajax-upload-image', ['as'=>'ajax.upload-image','uses'=>'ImageController@ajaxUploadImage']);
    Route::post('ajax-upload-chalan', ['as'=>'ajax.upload-chalan','uses'=>'ImageController@ajaxUploadChalan']);


    Route::get("/resident",['as'=>'resident','uses'=>'PaymentController@residentIndex'])->middleware('checkResidentStage');
    Route::post('/residentSubmit',['as'=>'residentSubmit','uses'=>'PaymentController@residentSubmit'])->middleware('checkResidentStage');
    Route::get('/paymentMethod',['as'=>'paymentMethod','uses'=>'PaymentController@paymentMethodIndex'])->middleware('checkPaymentMethodStage');
    Route::post('/paymentMethodSubmit',['as'=>'paymentMethodSubmit','uses'=>'PaymentController@paymentMethodSubmit'])->middleware('checkPaymentMethodStage');
    Route::get('/chalanMethod',['as'=>'chalanMethod','uses'=>'PaymentController@chalanMethodIndex'])->middleware('checkChalanMethod');
    Route::get('/downloadChalan',['as'=>'downloadChalan','uses'=>'PaymentController@downloadChalan'])->middleware('checkChalanMethod');;
    Route::post('/chalanMethodSubmit',['as'=>'chalanMethodSubmit','uses'=>'PaymentController@chalanMethodSubmit'])->middleware('checkChalanMethod');
    
    
    Route::get('/afterPayment',['as'=>'afterPayment','uses'=>'PaymentController@afterPaymentIndex']);

    Route::get('/onlineMethod',['as'=>'onlineMethod','uses'=>'PaymentController@onlineMethodIndex'])->middleware('checkOnlineMethod');
    Route::post('/onlineMethodSubmit',['as'=>'onlineMethodSubmit','uses'=>'PaymentController@onlineMethodSubmit'])->middleware('checkOnlineMethod');

    Route::get('/codMethod',['as'=>'codMethod','uses'=>'PaymentController@codMethodIndex'])->middleware('checkCODMethod');

    Route::get('/overseasMethod',['as'=>'overseasMethod','uses'=>'PaymentController@overseasMethodIndex'])->middleware('checkOverseasMethod');

    // guest route
    Route::get('/guests', ['as'=>'guestsInfo','uses'=>'GuestController@index'])->middleware('checkGuestStage');
    Route::post('/guest/add', ['as'=>'guestAdd','uses'=>'GuestController@addGuest'])->middleware('checkGuestStage');
    Route::get('/guest/delete/{id}', ['as'=> 'guestDelete', 'uses' => 'GuestController@removeGuest'])->middleware('checkGuestStage');
    Route::post('/guests/saveAndNext',['as'=>'doneAndNext','uses'=>'GuestController@saveAndNext'])->middleware('checkGuestStage');



});
