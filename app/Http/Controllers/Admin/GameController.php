<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/13
 * Time: 15:58
 */

namespace App\Http\Controllers\Admin;


use App\Models\Game;
use App\Models\GameCate;

class GameController extends Controller
{

    /**
     * 游戏列表
     */
    public function gameList()
    {

    }


    /**
     * 游戏分类列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function cateList()
    {
        if($this->request->ajax()) {

            $rules = [
                'page'       => 'required',
                'limit'      => 'required',
            ];

            $this->validateInput($rules);

            $validated = $this->validated;

            $list = GameCate::where([])
                ->page($validated['page'], $validated['limit'])
                ->get();

            return $this->showJsonLayui($list);
        }

        return $this->rView('game.cate_list');
    }




    /**
     * 游戏大区列表
     */
    public function regionList()
    {

    }


    /**
     * 游戏服务器列表
     */
    public function serviceList()
    {

    }


    /**
     * 游戏规格列表
     */
    public function skuList()
    {

    }
}