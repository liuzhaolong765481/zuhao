<?php


namespace App\Http\Controllers\Base;

/**
 * Trait Format
 * 返回数据格式 trait
 * @package App\Http\Controllers\Base
 */
trait Format
{

    /**
     * success
     * @param array $data
     * @param string $message
     * @return mixed
     */
    public function success($data = [], $message = '')
    {
        $body = [
            'status'  => self::SUCCESS,
            'message' => $message ? $message : trans('message.success'),
            'data'    => $data
        ];

        return $this->json($body);
    }

    /**
     * 通过返回时判断成功失败
     * @param $bool
     * @return mixed
     */
    public function successOrFailed($bool, $msg = null)
    {
        if ($bool) {
            return $this->success($bool);
        }

        if ($msg) {
            return $this->badRequestError($msg);
        }

        return $this->failed();
    }

    /**
     * 错误信息 格式
     * @param $code string 状态码
     * @param null $message 提示信息
     * @return mixed
     */
    public function error($code, $message = null)
    {
        $body['status'] = $code;
        $body['message'] = $message;

        return $this->json($body);
    }

    /**
     * 请求资源不存在
     * @return mixed
     */
    public function notFoundError()
    {
        return $this->error(self::NOT_FOUND, trans('message.error.404'));
    }

    /**
     * Sign无效
     * @return mixed
     */
    public function invalidSignError()
    {
        return $this->error(self::INVALID_SIGN, trans('message.sign.invalid'));
    }

    /**
     * 没有数据
     * @return mixed
     */
    public function noDataError()
    {
        return $this->error(self::NO_DATA, trans('message.error.nodata'));
    }

    /**
     * 参数错误
     * @param string $message
     * @return mixed
     */
    public function badRequestError($message = '')
    {
        return $this->error(self::BAD_REQUEST, $message);
    }

    /**
     * 服务器错误
     * @return mixed
     */
    public function internalServerError()
    {
        return $this->error(self::INTERNAL_SERVER_ERROR, trans('message.error.internal_server_error'));
    }

    /**
     * 身份认证失败
     * @return mixed
     */
    public function invalidTokenError()
    {
        return $this->error(self::INVALID_TOKEN, trans('message.token.login'));
    }

    /**
     * 成功或没有数据
     * @param $data
     * @return mixed
     */
    public function successOrNodata($data)
    {
        if (blank($data)) {
            return $this->noDataError();
        }

        return $this->success($data);
    }

    /**
     * 未知错误
     * @return mixed
     */
    public function failed()
    {
        return $this->error(self::FAILED, trans('message.error.unknown'));
    }


    /**
     * 成功跳转
     * @param string $msg
     * @param string $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function successJump($msg = "成功" , $url = "/"){

        return view('template.jump' , ['msg' => $msg , 'url' => $url , 'ok' => true]);
    }

    /**
     * 失败跳转
     * @param string $msg
     * @param string $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function failJump($msg = "失败" , $url = "/"){

        return view('template.jump' , ['msg' => $msg , 'url' => $url , 'ok' => false]);
    }


}
