<?php
/**
 * Created by lzl
 * Date: 2020 2020/11/2
 * Time: 13:57
 */

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Article;
use App\Models\Game;
use App\Models\GameCate;
use App\Models\UserFollow;
use App\Services\AccountService;
use App\Services\AuthService;

class AccountController extends Controller
{

    /**
     * 租号大厅
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\RequestException
     */
    public function hall()
    {
        //数据渲染
        $game = Game::where('status', Game::IN_USE_STATUS)->orderBy('sort', 'desc')->get();

        $game_cate = GameCate::all();

        $account_most = Account::where('is_upper', Account::IN_SHELF)->orderBy('lease_times', 'desc')->limit(5)->get();

        $article_most = Article::orderBy('sort', 'desc')->limit(5)->get();

        return $this->rView('hall', compact('game', 'game_cate', 'account_most', 'article_most'));

    }


    /**
     * @return mixed
     * @throws \App\Exceptions\RequestException
     */
    public function hallList()
    {

        $rules = [
            'game_id'     => 'nullable',
            'o'           => 'nullable',
            'page'        => 'required|integer',
            'limit'       => 'required|integer',
        ];

        $this->validateInput($rules);

        return $this->showJsonLayui( AccountService::getList($this->validated) );
    }

    /**
     * 账号详情
     */
    public function detail($id)
    {
        $account = Account::whereKey($id)->first();

        $recommend = Account::where('is_upper', Account::IN_SHELF)
            ->where('game_id', $account->game_id)
            ->orderBy('lease_times', 'desc')
            ->limit(4)
            ->get();
        return $this->rView('account.detail', compact('account','recommend'));
    }

    /**
     * 发布账号
     * @throws \App\Exceptions\RequestException
     */
    public function publish()
    {
        $rules = [
            'id'           => 'nullable',
            'title'        => 'required',
            'descript'     => 'present',
            'explain'      => 'nullable',
            'game_id'      => 'required|integer',
            'region_id'    => 'required|integer',
            'service_id'   => 'required|integer',
            'images'       => 'required|array',
            'amount'       => 'nullable',
            'deposit'      => 'present',
            'tags'         => 'nullable',
            'specs'        => 'nullable',
            'account'      => 'required',
            'password'     => 'required|string'
        ];

        $this->validateInput($rules);

        $this->validated['uid'] = auth()->id();

        return $this->successOrFailed(AccountService::createAccount($this->validated));

    }

    /**
     * 关注/取消关注
     * @throws \App\Exceptions\RequestException
     */
    public function focusAccount()
    {
        $rules = [
            'obj_id' => 'required'
        ];

        $this->validateInput($rules);

        //判断是否存在，存在则取消关注
        $exists = UserFollow::where('obj_id', $this->validated['obj_id'])->where('uid', auth()->id())->get();

        if($exists){
            return $this->successOrFailed($exists->delete());
        }

        $this->validated['uid'] = auth()->id();
        $this->validated['obj_title'] = Account::whereKey($this->validated['obj_id'])->value('title');

        //添加用户行为
        AuthService::addBehavior(7, $this->validated['obj_title']);

        return $this->successOrFailed(UserFollow::create($this->validated));
    }



}