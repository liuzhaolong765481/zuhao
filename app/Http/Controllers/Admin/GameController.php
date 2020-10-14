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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function gameList()
    {
        if($this->request->ajax()){
            $rules = [
                'page'  => 'required',
                'limit' => 'required',
                'name'  => 'nullable',
            ];

            $this->validateInput($rules);

            $validated = $this->validated;

            $list = Game::where([])
                ->page($validated['page'], $validated['limit'])
                ->get();

            return $this->showJsonLayui($list);
        }

        return $this->rView('game.list');

    }

    /**
     * 添加游戏
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function addGame()
    {
        $rules = [
            'id'          => 'nullable',
            'cate_id'     => 'nullable',
            'name'        => 'nullable',
            'post'        => 'nullable',
            'tag'         => 'nullable',
            'description' => 'nullable',
            'status'      => 'nullable'
        ];

        $this->validateInput($rules);

        $game = Game::findOrNew($this->validated['id'] ?? 0);

        if($this->request->isMethod('post')){

            return $this->successOrFailed(Game::updateOrCreate(['id' => $this->validated['id']], $this->validated));

        }

        return $this->rView('game.add_game', compact('game'));

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
     * 添加/修改 规格
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\RequestException
     */
    public function addCate()
    {
        $rules = [
            'id'        => 'nullable',
            'cate_name' => 'nullable',
            'image'     => 'nullable'
        ];

        $this->validateInput($rules);

        $cate = GameCate::findOrNew($this->validated['id'] ?? 0);

        if($this->request->isMethod('post')){

            return $this->successOrFailed(GameCate::updateOrCreate(['id' => $this->validated['id']], $this->validated));

        }

        return $this->rView('game.add_cate', compact('cate'));
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