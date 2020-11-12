<?php
/**
 * Created by lzl
 * Date: 2020 2020/11/2
 * Time: 13:57
 */

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Game;
use App\Models\GameCate;
use App\Services\AccountService;
use Overtrue\Pinyin\Pinyin;

class AccountController extends Controller
{

    /**
     * 租号大厅
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\RequestException
     */
    public function hall()
    {

        $rules = [
            'game_id'     => 'nullable',
            'o'           => 'nullable',
//            'lease_times' => 'nullable',
//            'create_time' => 'nullable',
//            'amount'      => 'nullable',
        ];

        $this->validateInput($rules);

        $where['status'] = Game::IN_USE_STATUS;

        //筛选条件
        if(isset($this->validated['game_id'])){
            $where['game_id'] = $this->validated['game_id'];
        }

        if(isset($this->validated['o'])){

            if($this->validated['o'] == 'amount'){
                $order['amount'] = 'asc';
            }else{
                $order[$this->validated['o']] = 'desc';
            }

        }else{
            $order['sort'] = 'desc';
        }

        $game = Game::where($where)
            ->orderBy(array_key_first($order), $order[array_key_first($order)])
            ->get();

        $game_cate = GameCate::all();

        return $this->rView('hall', compact('game','game_cate'));
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