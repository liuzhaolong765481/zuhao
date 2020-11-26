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

Route::group([],function($r){
    /**
     * @var $r Route
     */
    //首页
    $r->get('/', 'IndexController@index')->name('index');
    //租号大厅
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
        //账密登录
        $r->post('login-psd','AuthController@loginPsd');
        //短信验证码登录
        $r->post('login-code','AuthController@loginCode');
        //退出登录
        $r->get('logout','AuthController@logout');
        //注册
        $r->post('register','AuthController@register');
        //忘记密码
        $r->post('reset-psd','AuthController@resetPsd');
    });

    $r->group(['prefix' => 'account'], function ($r) {
        /**
         * @var $r Route
         */
        //租号大厅数据接口
        $r->post('list', 'AccountController@hallList');
        //账号详情
        $r->get('detail/{id}', 'AccountController@detail');
    });

    /**
     * 公共部分
     */
    $r->group(['prefix' => 'public'], function ($r){
        /**
         * @var $r Route
         */
        //发送短信
        $r->post('send-sms','PublicController@sendSms');
        //单文件上传
        $r->post('upload','PublicController@upload');
        //多文件上传
        $r->post('uploads','PublicController@uploads');
        //获取游戏区服
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
            //个人中心
            $r->get('/', 'MemberController@index');
            //发布账号
            $r->get('publish', 'MemberController@publish');
            //我的账号
            $r->get('my-account','MemberController@myAccount');
            //我的优惠券
            $r->get('carbon','MemberController@carbon');
            //更新用户信息
            $r->post('up-user','MemberController@upUser');

        });

        /**
         * 账号相关
         */
        $r->group(['prefix' => 'account'], function ($r) {
            /**
             * @var $r Route
             */
            //发布账号
            $r->post('publish','AccountController@publish');
            //关注/取消关注账号
            $r->post('focus','AccountController@focusAccount');

        });

    });


});



