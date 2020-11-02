<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/9
 * Time: 18:00
 */
namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Article;
use App\Models\Game;
use App\Utils\Sms;

class IndexController extends Controller
{

    public function index()
    {
        $banner = Ad::where('type', Ad::INDEX_BANNER)->get();

        $index_game = Game::where('is_index', Game::IS_INDEX)->limit(5)->get();

        $article = Article::where('cate_id', Article::INDEX_CATE)
            ->orderBy('sort','desc')
            ->limit(4)
            ->get();

        return $this->rView('index', compact('banner','index_game','article'));
    }


    /**
     * 404 页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notFund()
    {
        return view('template.404');
    }

    /**
     * 500 页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function serverError()
    {
        return view('template.500');
    }




}