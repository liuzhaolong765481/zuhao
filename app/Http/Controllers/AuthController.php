<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/9
 * Time: 9:42
 */

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use App\Utils\Sms;

class AuthController extends Controller
{

    /**
     * 登录
     * @return mixed
     * @throws \App\Exceptions\RequestException
     */
    public function login()
    {
        if(auth('web')->check()){
            return redirect('/');
        }

        return $this->rView('auth.login');
    }


    /**
     * 账密登录
     * @return mixed
     * @throws \App\Exceptions\RequestException
     */
    public function loginPsd()
    {
        $rules = [
            'user_phone' => [
                'required',
                'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/',
                'exists:xf_user,user_phone'
            ],
            'password'   => 'required',
        ];

        $this->validateInput($rules);

        $user = User::where('user_phone', $this->validated['user_phone'])->first();

        // 登录
        if (($user instanceof User) && decrypt($user->password) == $this->validated['password']) {
            AuthService::login($user);
            return $this->success();
        }

        return $this->badRequestError(trans('message.auth.login_failed'));
    }

    /**
     * 注册
     * @return mixed
     * @throws \App\Exceptions\RequestException
     */
    public function register()
    {
        $rules = [
            'user_phone' => [
                'required',
                'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/',
                'unique:xf_user,user_phone'
            ],
            'validate_code' => 'required|integer',
            'password'   => [
                'required',
                'regex:/^[a-z0-9]{6,20}$/'
            ],
        ];

        $this->validateInput($rules);

        //效验短信验证码
        Sms::verificationCode($this->validated,'register');

        //封装注册字段
        $this->validated['nick_name'] = 'XF' . $this->validated['user_phone'];
        $this->validated['last_login_time'] = date('Y-m-d H:i:s');
        $this->validated['password'] = encrypt($this->validated['password']);

        User::create($this->validated);

        return $this->success();
    }

    /**
     * 修改密码
     * @return mixed
     * @throws \App\Exceptions\RequestException
     */
    public function resetPsd()
    {
        $rules = [
            'user_phone' => [
                'required',
                'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/',
                'exists:xf_user,user_phone'
            ],
            'validate_code' => 'required|integer',
            'password'   => [
                'required',
                'regex:/^[a-z0-9]{6,20}$/'
            ],
        ];

        $this->validateInput($rules);

        Sms::verificationCode($this->validated,'code');

        User::where('user_phone', $this->validated['user_phone'])->update(['password' => encrypt($this->validated['password'])]);

        return $this->success();

    }

    /**
     * 退出登录
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        //记录用户行为
        AuthService::addBehavior(2);
        \Auth::guard('web')->logout();
        return redirect('/');
    }


}