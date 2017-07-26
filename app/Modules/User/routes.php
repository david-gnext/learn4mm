<?php
Route::post('/logging', '\App\Http\Controllers\Auth\LoginController@login');
Route::get('/major/subject/{id}', '\App\Modules\Major\Controllers\SubjectController@index');