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
    return view('/admin/index');
});

Route::get('/home', function () {
    return view('/admin/public/home');
});
Route::any("ment/cateadd","Admin\MentController@cateadd");
Route::any("ment/cateadddo","Admin\MentController@cateadddo");
Route::any("ment/catelist","Admin\MentController@catelist");
Route::any('ment/catelist','Admin\MentController@catelist');
Route::get('ment/catedel/{id}','Admin\MentController@catedel');
Route::get('ment/cateedit/{id}','Admin\MentController@cateedit');
Route::post('ment/cateupdate','Admin\MentController@cateupdate');
Route::any('ment/mentlist','Admin\MentController@mentlist');
Route::any('ment/mentadd','Admin\MentController@mentadd');
Route::get('ment/mentdel/{id}','Admin\MentController@mentdel');
Route::get('ment/mentedit/{id}','Admin\MentController@mentedit');
Route::post('ment/mentupdate','Admin\MentController@mentupdate');
Route::any('ment/mentupload','Admin\MentController@mentupload');