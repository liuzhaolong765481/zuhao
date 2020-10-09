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

//Route::group(['middleware' => 'auth'], function ($r) {

    Route::get('/', function () {
        return view('welcome');
    });

//});



Route::group(['prefix' => 'auth'], function ($r){
    /**
     * @var $r Route
     */
    $r->get('login','AuthController@login')->name('login');
    $r->post('login-psd','AuthController@loginPsd');
    $r->post('login-code','AuthController@loginCode');
    $r->get('logout','AuthController@logout');

});