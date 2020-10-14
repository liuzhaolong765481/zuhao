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
        $r->any('user-info','AuthController@userInfo');
        $r->any('user-recharge','AuthController@userRecharge');


    });

    Route::group(['prefix' => 'index'], function ($r){
        /**
         * @var $r Route
         */
        $r->get('home','IndexController@home')->name('admin.home');
        $r->get('console','IndexController@console');
    });



    Route::group(['prefix' => 'article'], function ($r){
        /**
         * @var $r Route
         */
        $r->get('article-list','ArticleController@articleList');
        $r->get('console','IndexController@console');
    });


    Route::group(['prefix' => 'game'], function ($r){
        /**
         * @var $r Route
         */
        $r->get('game-list','GameController@gameList');
        $r->any('add-game','GameController@addGame');
        $r->get('cate-list','GameController@cateList');
        $r->any('add-cate','GameController@addCate');
        $r->get('region-list','GameController@regionList');


    });

});