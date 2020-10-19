<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/19
 * Time: 14:20
 */

namespace App\Http\Controllers\Admin;

use App\Models\Account;

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
                'page'       => 'required',
                'limit'      => 'required',
                'game_id'       => 'nullable'
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


    public function addAccount()
    {

    }

}