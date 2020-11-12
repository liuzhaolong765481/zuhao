<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/13
 * Time: 15:58
 */

namespace App\Http\Controllers\Admin;


use App\Models\Game;
use App\Models\GameCate;
use App\Models\GameRegion;
use App\Models\GameService;
use App\Models\GameSku;
use App\Services\CacheService;

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

            $list = Game::OrderBy('sort', 'desc')
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
            'id'           => 'nullable',
            'cate_id'      => 'nullable',
            'name'         => 'nullable',
            'poster'       => 'nullable',
            'tag'          => 'nullable',
            'description'  => 'nullable',
            'status'       => 'nullable',
            'sort'         => 'nullable',
            'is_hot'       => 'nullable',
            'is_index'     => 'nullable',
            'index_poster' => 'nullable',
            'icon'         => 'nullable',
        ];

        $this->validateInput($rules);

        $game = Game::findOrNew($this->validated['id'] ?? 0);

        if($this->request->isMethod('post')){
            //todo 后期改为监听器
            CacheService::refresh('header');
            if(isset($this->validated['name'])){
                $this->validated['first_number'] = $this->validated['name'];
            }
            return $this->successOrFailed(Game::updateOrCreate(['id' => $this->validated['id']], $this->validated));
        }

        $game_cate = GameCate::all();

        return $this->rView('game.add_game', compact('game','game_cate'));
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function regionList()
    {
        $game_id = request()->input('game_id');

        if($this->request->ajax()) {

            $rules = [
                'page'       => 'required',
                'limit'      => 'required',
            ];

            $this->validateInput($rules);

            $validated = $this->validated;

            $list = GameRegion::where('game_id', $game_id)
                ->page($validated['page'], $validated['limit'])
                ->get();

            return $this->showJsonLayui($list);
        }

        return $this->rView('game.region_list', compact('game_id'));
    }


    /**
     * 添加大区
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function addRegion()
    {
        $rules = [
            'id'          => 'nullable',
            'game_id'     => 'required',
            'region_name' => 'nullable',
        ];

        $this->validateInput($rules);

        if($this->request->isMethod('post')){

            return $this->successOrFailed(GameRegion::updateOrCreate(['id' => $this->validated['id']], $this->validated));

        }

        $region = GameRegion::findOrNew($this->validated['id'] ?? 0);
        $game_id = $this->validated['game_id'];

        return $this->rView('game.add_region', compact('region','game_id'));
    }

    /**
     * 游戏服务器列表
     * @return mixed
     * @throws \App\Exceptions\RequestException
     */
    public function addService()
    {
        $rules = [
            'region_id'     => 'required',
            'service_name'  => 'nullable',
            'id'            => 'nullable',
        ];

        $this->validateInput($rules);

        $region_id = $this->validated['region_id'];

        if($this->request->isMethod('post')){
            if(isset($this->validated['id']) && $this->validated['id']){
                return $this->successOrFailed(GameService::whereKey($this->validated['id'])->delete());
            }else{
                return $this->successOrFailed(GameService::create($this->validated));
            }
        }

        $service = GameService::where('region_id', $region_id)->get();

        return $this->rView('game.add_service',compact('service','region_id'));
    }


    /**
     * sku列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function skuList()
    {
        if($this->request->ajax()) {

            $rules = [
                'page'       => 'required',
                'limit'      => 'required',
                'game_id'    => 'nullable'
            ];

            $this->validateInput($rules);

            $validated = $this->validated;

            $where = [];
            if(isset($validated['game_id'])){
                $where['game_id'] = $validated['game_id'];
            }

            $list = GameSku::where($where)
                ->page($validated['page'], $validated['limit'])
                ->get();

            return $this->showJsonLayui($list);
        }

        return $this->rView('game.sku_list');
    }


    /**
     * 添加sku
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function addSku()
    {
        $rules = [
            'id'       => 'nullable',
            'game_id'  => 'nullable',
            'sku_name' => 'nullable',
            'sku_icon' => 'nullable',
        ];

        $this->validateInput($rules);

        if($this->request->isMethod('post')){
            return $this->successOrFailed(GameSku::updateOrCreate(['id' => $this->validated['id'] ?? 0], $this->validated));
        }

        $game = Game::get();

        $sku = GameSku::findOrNew($this->validated['id'] ?? 0);

        return $this->rView('game.add_sku', compact('game','sku'));
    }
}