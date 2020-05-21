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
});

Route::middleware(['auth'])->group(function(){ //ต้องlogin ก่อน
    Route::get('details/create','DetailController@create');
    Route::post('details/create','DetailController@store');
    Route::get('details/edit/{id}','DetailController@edit');
    Route::post('details/update/{id}','DetailController@update');

    Route::get('register/create','RegisterController@create');
    Route::get('register/addToCart/{id}','RegisterController@addSubjectToCart');

    // Route::get('admin/Problemtype','Admin\ProblemTypeController@index');
    // Route::get('admin/Problemtype/delete/{id}','Admin\ProblemTypeController@delete');
});

Route::get('public/subjects','PublicController@public');

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


