<?php

namespace App\Services;


use App\Models\User;
use App\Models\UserBehavior;

class AuthService extends BaseServices
{
    const BEHAVIOR = [
        1 => '登录账号',
        2 => '退出登录',
        3 => '充值',
        4 => '发布账号',
        5 => '租号',
        6 => '浏览账号详情',
        7 => '关注商品',
        0 => '其他',
    ];

    /**
     * @param $members
     * @return array
     */
    public static function login($members)
    {
        \Auth::guard('web')->login($members);
        self::addBehavior(1);
        return [
            auth()->id(),
        ];

    }

    /**
     * 创建用户行为
     * @param $case
     * @param string $context
     * @return UserBehavior|bool|\Illuminate\Database\Eloquent\Model
     */
    public static function addBehavior($case, $context = '')
    {
        if(!array_key_exists($case, self::BEHAVIOR)) {
            return false;
        }
        return UserBehavior::create(
            [
                'uid' => auth()->id(),
                'type' => $case,
                'description' => $context ? $context: self::BEHAVIOR[$case]
            ]
        );
    }


    /**
     * 修改用户信息
     * @param $validated
     * @return bool|int
     */
    public static function updateUser($validated)
    {
        $validated = array_filter($validated);

        if(isset($validated['trade_password'])){
            $validated['trade_password'] = encrypt($validated['trade_password']);
        }

        return User::whereKey(auth()->id())->update($validated);
    }
}