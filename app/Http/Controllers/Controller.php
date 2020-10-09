<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Format;
use App\Http\Controllers\Base\Input;
use App\Http\Controllers\Base\Output;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use Format, Input, Output;

    // 状态码定义
    const SUCCESS = 10001;  // 成功
    const INVALID_TOKEN = 10002;  // 身份认证失败
    const NO_DATA = 10003;  // 没有数据
    const INVALID_SIGN = 10004;  // 失败
    const FAILED = 10005;  // 未知错误


    const BAD_REQUEST = 400;    // 参数效验错误
    const UNAUTHORIZED = 401;    // 保留
    const NOT_FOUND = 404;    // 无此资源
    const INTERNAL_SERVER_ERROR = 500;    // 服务器错误

    // 未效验用户请求参数
    public $request;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->request = app('request');
    }

    /**
     * 验证字段本地化
     * @return array
     */
    public static function getCustomAttributes()
    {
        return [];
    }


    public function rView($url)
    {
        return view('tpl.'.$url);
    }
}
