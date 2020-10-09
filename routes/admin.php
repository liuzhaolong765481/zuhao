<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/9
 * Time: 13:06
 */

Route::group(['middleware' => 'auth'], function ($r) {

    Route::group(['prefix' => 'auth'], function ($r){

        /**
         * @var $r Route
         */
        $r->any('login','AuthController@login')->name('admin.login');
        $r->get('logout','AuthController@logout');


    });

});