<?php

use Illuminate\Support\Facades\Route;

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
// Route::resource('subjects', 'SubjectController');

Route::middleware(['auth','IsStatus'])->group(function(){
    Route::resource('subjects', 'SubjectController');

    Route::get('UserDetails','UserDetailController@index');
    Route::get('UserDetails/editStatus/{id}','UserDetailController@editStatus');
    Route::post('UserDetails/update/{id}','UserDetailController@update');

});

Route::middleware(['auth'])->group(function(){ //ต้องlogin ก่อน
    Route::get('details/create','DetailController@create');
    Route::post('details/create','DetailController@store');
    Route::get('details/edit/{id}','DetailController@edit');
    Route::post('details/update/{id}','DetailController@update');

    Route::get('register/create','RegisterController@create');
    Route::get('register/addToCart/{id}','RegisterController@addSubjectToCart');
    Route::get('registers/cart/','RegisterController@showCart');
    Route::get('registers/cart/deleteFromCart/{id}','RegisterController@deleteFromCart');
    Route::get('registers/incrementCart/{id}','RegisterController@incrementCart');
    Route::get('registers/decrementCart/{id}','RegisterController@decrementCart');
    Route::get('registers/checkout/{id}','RegisterController@checkout');
    Route::post('registers/createOrder/{id}','RegisterController@createOrder');
    Route::get('registers/showPayment','RegisterController@showPayment');





});

Route::get('public/subjects','PublicController@Public');
Route::get('public/search','PublicController@searchPublic');


Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


