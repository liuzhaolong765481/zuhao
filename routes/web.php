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



//});
Route::group([],function($r){
    /**
     * @var $r Route
     */
    $r->get('/', 'IndexController@index')->name('index');
    $r->get('hall', 'AccountController@hall');


    $r->group(['prefix' => 'index'], function ($r){
        /**
         * @var $r Route
         */
        $r->get('404', 'IndexController@notFund')->name('404');
        $r->get('500', 'IndexController@serverError')->name('500');
    });

    $r->group(['prefix' => 'auth'], function ($r){
        /**
         * @var $r Route
         */
        $r->get('login','AuthController@login')->name('login');
        $r->post('login-psd','AuthController@loginPsd');
        $r->post('login-code','AuthController@loginCode');
        $r->get('logout','AuthController@logout');
        $r->post('register','AuthController@register');
        $r->post('reset-psd','AuthController@resetPsd');
    });

    $r->group(['prefix' => 'account'], function ($r) {
        /**
         * @var $r Route
         */
        $r->post('list', 'AccountController@hallList');
    });

    /**
     * 公共部分
     */
    $r->group(['prefix' => 'public'], function ($r){
        /**
         * @var $r Route
         */
        $r->post('send-sms','PublicController@sendSms');
        $r->post('upload','PublicController@upload');
        $r->post('uploads','PublicController@uploads');
        $r->post('get-game-spu','PublicController@getGameSpu');

    });

    /**
     * 登录后操作
     */
    $r->group(['middleware' => 'auth'], function ($r){
        /**
         * 用户
         * @var $r Route
         */
        $r->group(['prefix' => 'member'], function ($r) {
            /**
             * @var $r Route
             */
            $r->get('/', 'MemberController@index');
            $r->get('publish', 'MemberController@publish');
            $r->get('my-account','MemberController@myAccount');
            $r->get('carbon','MemberController@carbon');
            $r->post('up-user','MemberController@upUser');

        });

        /**
         * 账号相关
         */
        $r->group(['prefix' => 'account'], function ($r) {
            /**
             * @var $r Route
             */
            $r->post('publish','AccountController@publish');
            $r->get('detail/{id}', 'AccountController@detail');

        });

    });


});



