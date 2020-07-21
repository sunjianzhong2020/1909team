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