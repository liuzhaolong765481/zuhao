<?php
/**
 * Created by lzl.
 * Date: 2020 2020/11/1 0001
 * Time: 12:26
 */

namespace App\Http\Controllers;

use App\Models\AccountSpec;
use App\Models\Game;
use App\Services\AuthService;

class MemberController extends Controller
{

    /**
     * 个人中心
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->rView('member.index');
    }

    /**
     * 发布账号
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function publish()
    {
        $game = Game::where('status',Game::IN_USE_STATUS)->orderBy('sort','desc')->get();

        $specs = AccountSpec::all();

        return $this->rView('member.publish', compact('game','specs'));
    }

    /**
     * 我的优惠券
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function carbon()
    {
       return $this->rView('member.carbon');
    }

    /**
     * 更新用户信息
     * @return mixed
     * @throws \App\Exceptions\RequestException
     */
    public function upUser()
    {
        $rules = [
            'avatar'         => 'nullable',
            'nick_name'      => 'nullable',
            'email'          => 'nullable',
            'trade_password' => 'nullable',
            'ali_number'     => 'nullable',
        ];

        $this->validateInput($rules);

        return $this->successOrFailed(AuthService::updateUser($this->validated));
    }

    public function myAccount()
    {
        return $this->rView('member.my_account');
    }


}