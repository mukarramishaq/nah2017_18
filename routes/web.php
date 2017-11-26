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
    return view('welcome');
});

// guest route
Route::get('/guests', ['as'=>'guestsInfo','uses'=>'GuestController@index']);
Route::post('/guest/add', ['as'=>'guestAdd','uses'=>'GuestController@addGuest']);


Auth::routes();
Route::post('/auth/login',['as'=>'authLogin','uses'=>'Auth\LoginController@authenticateLogin']);

Route::get('/getChalan',function(){return view('chalan');});

Route::group(['middleware'=>['App\Http\Middleware\IsEmailVerified']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/adminPanel', function () {
    return view('adminPanel');
    });
    Route::get('/userDetails', function () {
    return view('userDetails');
    });

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
});
