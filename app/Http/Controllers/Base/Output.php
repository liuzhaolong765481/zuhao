<?php

namespace App\Http\Controllers\Base;

use Log;

/**
 * Trait Output
 * 返回类 trait
 * @package App\Http\Controllers\Base
 */
trait Output
{
    /**
     * 返回Json数据
     * @param array $body
     * @return \Illuminate\Http\JsonResponse
     */
    public function json($body = [])
    {
        // 调试模式 输入输出写入日志
        $logId = $this->logDebug(json_encode($body));

        if (config('app.debug')) {
            $body['debug_id'] = $logId;
        }

        return response()->json($body);
    }

    /**
     * 记录 本次请求数据
     * @param $body
     * @return string
     */
    public function logDebug($body)
    {
        // 写入日志
        $debugId = uniqid();
        Log::debug($debugId, [
                'LOG_ID'         => $debugId,
                'IP_ADDRESS'     => $this->request->ip(),
                'REQUEST_URL'    => $this->request->fullUrl(),
                'AUTHORIZATION'  => $this->request->header('Authorization'),
                'REQUEST_METHOD' => $this->request->method(),
                'PARAMETERS'     => $this->request->all(),
                'RESPONSES'      => $body
            ]
        );

        return $debugId;
    }
}
