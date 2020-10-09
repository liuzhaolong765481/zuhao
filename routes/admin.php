<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/9
 * Time: 13:06
 */

Route::group(['prefix' => 'auth'], function ($r){

    /**
     * @var $r Route
     */
    $r->get('login','AuthController@login');
    $r->get('logout','AuthController@logout');


});
