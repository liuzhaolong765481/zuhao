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
        $r->get('user-list','AuthController@userList');
        $r->get('manager-list','AuthController@managerList');
    });

    Route::group(['prefix' => 'index'], function ($r){
        /**
         * @var $r Route
         */
        $r->get('home','IndexController@home')->name('admin.home');
        $r->get('console','IndexController@console');
    });




});