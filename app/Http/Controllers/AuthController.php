<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/9
 * Time: 9:42
 */

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;

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
                'exists:' . (new User())->getTable()
            ],
            'password'   => 'required',
        ];

        $this->validateInput($rules);

        $user = User::where('user_phone', $this->validated['user_phone'])
            ->where('password', encrypt_psd($this->validated['password']))
            ->first();

        // 登录
        if ($user instanceof User) {
            AuthService::login($user);
            return $this->success();
        }

        return $this->badRequestError(trans('message.auth.login_failed'));
    }

    public function loginCode()
    {

    }

    public function register()
    {

    }

    public function logout()
    {
        \Auth::guard('web')->logout();
    }


}