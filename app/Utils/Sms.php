<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/10
 * Time: 15:15
 */

namespace App\Utils;

use App\Exceptions\RequestException;
use \Mrgoon\AliSms\AliSms;

class Sms
{

    const VALID_TIME = 5;

    const CODE_LIST = [
        'register' => 'SMS_200694369', //用户注册短信验证码
        'code'     => 'SMS_204290666', //常规短信验证码
    ];

    /**
     * 发送验证码
     * @param $phone
     * @param $type
     * @return bool
     * @throws RequestException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public static function send($phone, $type)
    {
        if(!array_key_exists($type, self::CODE_LIST)){
            throw new RequestException(trans('message.sms.error_type'));
        }

        $code  = mt_rand(100000, 999999);

        // 存入缓存  设置过期时间
        \Cache::set($type . $phone, $code, self::VALID_TIME * 60);

        //todo 多类型需封装
        $data = [ 'code' => $code ];

        return self::run($phone, $data, self::CODE_LIST[$type]);

    }


    /**
     * 验证短信验证码
     * @param $validated
     * @param $type
     * @return bool
     * @throws RequestException
     */
    public static function verificationCode($validated, $type)
    {
        // 判断验证码是否正确
        if (\Cache::get($type . $validated['user_phone']) != $validated['validate_code']) {
            throw new RequestException(trans('message.sms.code_failed'));
        }
        return true;
    }


    /**
     * 发送
     * @param $phone
     * @param $data
     * @param $template_code
     * @return bool
     * @throws RequestException
     */
    private static function run($phone, $data, $template_code)
    {
        $aliSms = new AliSms();
        $response = $aliSms->sendSms($phone, $template_code, $data);
        if($response->Message != 'OK'){//发送成功
            throw new RequestException(trans('message.sms.send_error'));
        }

        return true;
    }

}