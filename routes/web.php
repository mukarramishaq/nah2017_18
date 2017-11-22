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


Auth::routes();
Route::post('/auth/login',['as'=>'authLogin','uses'=>'Auth\LoginController@authenticateLogin']);



Route::group(['middleware'=>['App\Http\Middleware\IsEmailVerified']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/personalInformation',['as'=>'personalInformation','uses'=>'PersonalController@index']);
    
    Route::get('/educationalInformation',['as'=>'educationalInformation','uses'=>'EducationalController@index']);
    Route::post('/educationalInformation/saveAndNext',['as'=>'educationalSaveAndNext','uses'=>'EducationalController@saveAndNext']);
    Route::post('/educationalInformation/save',['as'=>'educationalSave','uses'=>'EducationalController@save']);

    Route::get('/professionalInformation',['as'=>'professionalInformation','uses'=>'ProfessionalController@index']);

    Route::get('/personalInformation/save', ['as'=>'personalSave', 'uses'=>'PersonalController@save']);
    Route::post('/personalInformation/saveAndNext', ['as'=>'personalSaveAndNext', 'uses'=>'PersonalController@saveAndNext']);
    Route::post('/personalInformation/saveImage', ['as'=>'personalSaveImage', 'uses'=>'PersonalController@saveImage']);
    
});
