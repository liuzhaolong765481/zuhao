<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/19
 * Time: 14:20
 */

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use App\Models\AccountSpec;
use App\Models\Game;
use App\Models\GameRegion;
use App\Models\GameService;
use App\Services\AccountService;

class AccountController extends Controller
{

    /**
     * 账号列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function accountList()
    {
        if($this->request->ajax()) {
            $rules = [
                'page'    => 'required',
                'limit'   => 'required',
                'game_id' => 'nullable'
            ];

            $this->validateInput($rules);

            $validated = $this->validated;

            $where = [];
            if(isset($validated['game_id']) && $validated['game_id']){
                $where['game_id'] = $validated['game_id'];
            }

            $list = Account::where($where)
                ->page($validated['page'], $validated['limit'])
                ->get();

            return $this->showJsonLayui($list);
        }

        return $this->rView('account.account_list');
    }

    /**
     * 添加账号
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function addAccount()
    {
        $rules = [
            'id'           => 'nullable',
            'title'        => 'nullable',
            'descript'     => 'nullable',
            'explain'      => 'nullable',
            'uid'          => 'nullable',
            'game_id'      => 'nullable',
            'region_id'    => 'nullable',
            'service_id'   => 'nullable',
            'images'       => 'nullable',
            'browse_times' => 'nullable',
            'lease_times'  => 'nullable',
            'lease_hour'   => 'nullable',
            'follow_times' => 'nullable',
            'deposit'      => 'nullable',
            'tags'         => 'nullable',
            'specs'        => 'nullable',
            'is_upper'     => 'nullable'
        ];

        $this->validateInput($rules);

        if($this->request->isMethod('post')) {
            return $this->successOrFailed(AccountService::createAccount($this->validated));
        }

        $account = Account::findOrNew($this->validated['id'] ?? 0);

        $game = Game::where('status', Game::IN_USE_STATUS)->get(['id', 'name']);

        //TODO 渲染数据，写的不好 后期优化
        $specs = AccountSpec::all();

        if(isset($this->validated['id']) && $this->validated['id'] && $account->region_id){
            $region = GameRegion::where('game_id',$account->game_id)->get();
        }else{
            $region = [];
        }

        if(isset($this->validated['id']) && $this->validated['id'] && $account->service_id){
            $service = GameService::where('region_id',$account->region_id)->get();
        }else{
            $service = [];
        }

        return $this->rView('account.add_account', compact('account','game', 'specs', 'region', 'service'));
    }

}