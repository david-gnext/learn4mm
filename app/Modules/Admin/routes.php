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
Route::get('/admin/modal', function(){
    return view("Admin::modal");
});
Route::get('/admin/dashboard', 'Admin\Controllers\IndexController@index')->middleware("auth");
Route::get('/setting', 'Admin\Controllers\SettingController@index')->middleware("auth");
Route::post('/setting/save', 'Admin\Controllers\SettingController@save')->middleware("auth");
/**Major create**/
Route::get('/admin/major', 'Admin\Controllers\MajorController@index')->middleware("auth");
Route::get('/admin/major/insert', 'Admin\Controllers\MajorController@insert')->middleware("auth");
Route::post('/admin/major/save/{id}', 'Admin\Controllers\MajorController@save')->middleware("auth");
Route::delete('/admin/major/delete/{id}', 'Admin\Controllers\MajorController@delete')->middleware("auth");
/**Subject create**/
Route::get('/admin/subject', 'Admin\Controllers\SubjectController@index')->middleware("auth");
Route::get('/admin/subject/get/{id}', 'Admin\Controllers\SubjectController@getByMajorId')->middleware("auth");
Route::get('/admin/subject/insert/{id}', 'Admin\Controllers\SubjectController@insert')->middleware("auth");
Route::post('/admin/subject/save/{id}', 'Admin\Controllers\SubjectController@save')->middleware("auth");
Route::delete('/admin/subject/delete/{id}', 'Admin\Controllers\SubjectController@delete')->middleware("auth");
/**Content create**/
Route::get('/admin/content', 'Admin\Controllers\ContentController@index')->middleware("auth");
Route::get('/admin/content/insert/{id}', 'Admin\Controllers\ContentController@insert')->middleware("auth");
Route::get('/admin/content/get/{id}', 'Admin\Controllers\ContentController@getByMajorId')->middleware("auth");
Route::post('/admin/content/save/{id}', 'Admin\Controllers\ContentController@save')->middleware("auth");
Route::delete('/admin/content/delete/{id}', 'Admin\Controllers\ContentController@delete')->middleware("auth");