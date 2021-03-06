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

    Route::get('/major/index', 'Major\Controllers\IndexController@index')->middleware("auth");
    Route::get('/subject/{id}', 'Major\Controllers\SubjectController@index');
    Route::get('/content/{id}', 'Major\Controllers\ContentController@index');
    Route::get('/content/check/{id}', 'Major\Controllers\ContentController@check')->middleware("auth");
