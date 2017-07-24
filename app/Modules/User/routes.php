<?php
Route::group(['middleware'=>'web'],function(){
    Route::post('/logging', ['as' => 'logging', 'uses' => '\App\Http\Controllers\Auth\LoginController@login']);
});
