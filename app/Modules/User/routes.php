<?php
Route::group(['middleware'=>'web'],function(){
    Route::get('/logging', ['as' => 'logging', 'uses' => '\App\Http\Controllers\Auth\LoginController@login']);
});
