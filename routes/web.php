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

Route::group(['middleware'=>'web'],function(){
    
    Route::get('/',['uses' => '\App\Modules\Major\Controllers\IndexController@index']);

    Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@index']);
    Route::get('/signin',function() {
        return view("User::signin");
    });
    Route::get('/logout','Auth\LoginController@logout');
    Route::get('/new/create', function () {
        return view("saw");
    });
});