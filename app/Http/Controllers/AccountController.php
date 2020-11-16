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
use App\Services\AccountService;

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
        $game = Game::whereKey($id)->first();

        return $this->rView('game.detail', compact('game'));
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



}