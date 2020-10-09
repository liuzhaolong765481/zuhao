<?php


namespace App\Http\Controllers\Base;

use App\Exceptions\RequestException;
use Validator;

/**
 * Trait Input
 * 请求类 trait
 * @package App\Http\Controllers\Base
 */
trait Input
{
    public $validated;

    /**
     * 验证请求信息
     * @param $rules
     * @throws RequestException;
     */
    public function validateInput($rules)
    {
        // 获取传入参数
        $params = $this->request->all();

        // 参数效验
        $validator = Validator::make($params, $rules, [], static::getCustomAttributes());

        // 返回错误信息
        if ($validator->fails()) {
            throw new RequestException($validator->getMessageBag()->first(), 200);
        }

        // 请求参数过滤
        $this->validated = array_intersect_key($params, $rules);
    }
}
