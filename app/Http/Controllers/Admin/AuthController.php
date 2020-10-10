<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/9
 * Time: 13:14
 */

namespace App\Http\Controllers\Admin;

use App\Models\Admin;

class AuthController extends Controller
{

    /**
     * 管理员登录
     * @return mixed
     * @throws \App\Exceptions\RequestException
     */
    public function login()
    {
        if(auth('admin')->check()){
            return redirect(route('admin.home'));
        }

        if($this->request->isMethod('post')){
            $rules = [
                'name' => 'required|string',
                'password' => 'required',
                'captcha' => 'required|captcha',
            ];

            $this->validateInput($rules);

            $admin = Admin::where('name', $this->validated['name'])
                ->where('password', encrypt_psd($this->validated['password']))
                ->first();

            // 登录
            if ($admin instanceof Admin) {

                \Auth::guard('admin')->login($admin);

                return $this->success();
            }

            return $this->badRequestError(trans('message.auth.login_failed'));
        }

        return $this->rView('auth.login');

    }


    /**
     * 退出登录
     */
    public function logout()
    {
        \Auth::guard('admin')->logout();
        return $this->rView('auth.login');

    }



    public function userList()
    {
        return $this->rView('auth.user_list');
    }

    public function managerList()
    {
        return $this->rView('auth.manager_list');
    }



}