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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('grade/create', 'Admin\GradeController@add');
    Route::post('grade/create', 'Admin\GradeController@create');
    Route::get('grade', 'Admin\GradeController@index');
    Route::get('grade/edit', 'Admin\GradeController@edit'); // 追記
    Route::post('grade/edit', 'Admin\GradeController@update'); // 追記
    Route::get('grade/delete', 'Admin\GradeController@delete');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
