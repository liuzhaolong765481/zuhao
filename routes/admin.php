<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/9
 * Time: 13:06
 */

Route::any('auth/login','AuthController@login')->name('admin.login');

Route::group(['middleware' => 'admin'], function ($r) {

    Route::group(['prefix' => 'auth'], function ($r){

        /**
         * @var $r Route
         */

        $r->get('logout','AuthController@logout');
        $r->get('home','IndexController@home')->name('admin.home');

    });

});