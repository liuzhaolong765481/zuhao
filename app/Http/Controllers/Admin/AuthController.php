<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/9
 * Time: 13:14
 */

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\User;

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


    /**
     * 用户列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function userList()
    {
        if($this->request->ajax()) {

            $rules = [
                'page'       => 'required',
                'limit'      => 'required',
                'user_phone' => 'nullable',
            ];

            $this->validateInput($rules);

            $validated = $this->validated;

//            \DB::connection()->enableQueryLog();
            $where = [];
            if(isset($validated['user_phone'])){
                $where['user_phone'] = $validated['user_phone'];
            }

            $list = User::where($where)
                ->page($validated['page'], $validated['limit'])
                ->get();
//            dd(\DB::getQueryLog());

            return $this->showJsonLayui($list);
        }

        return $this->rView('auth.user_list');
    }

    /**
     * 用户信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function userInfo()
    {
        $rules = [
            'id' => 'required',
            'field' => 'nullable',
            'value' => 'nullable',
        ];

        $this->validateInput($rules);

        $user =  User::whereKey($this->validated['id'])->first();
        if($this->request->isMethod('post')){

            if(isset($this->validated['field'])){
                $user->update([$this->validated['field'] => $this->validated['value']]);
            }

            return $this->success();
        }


        return $this->rView('auth.user_info', compact('user'));

    }

    /**
     * 用户后台充值
     */
    public function userRecharge()
    {

    }

    public function managerList()
    {
        return $this->rView('auth.manager_list');
    }



}