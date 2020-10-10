<?php

return [

    'success' => '成功',

    'token' => [
        'invalid' => '身份认证无效',
        'expired' => '身份认证过期',
        'login'   => '请先登录',
    ],


    'error' => [
        'unknown'               => '网络不给力',
        '404'                   => '您请求的页面不存在',
        'unauthorized'          => '没有权限',
        'internal_server_error' => '网络不给力',
        'nodata'                => '暂无数据',
        'identity'              => '当前角色无权进行此操作',
    ],

    'auth' => [
        'login_failed' => '账号密码有误'
    ],

    'file' => [
        'error' => '文件上传失败！请重试'
    ],

    'sms' => [
        'error_type'  => '当前请求发送短信模板不存在',
        'send_error'  => '短信发送失败，请稍后重试',
        'code_failed' => '短信验证码有误',
    ],
];
