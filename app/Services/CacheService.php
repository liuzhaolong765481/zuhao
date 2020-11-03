<?php
/**
 * Created by lzl
 * Date: 2020 2020/11/2
 * Time: 17:33
 */

namespace App\Services;

use App\Models\Game;

class CacheService extends BaseServices
{

    const PREFIX = 'index.';

    const TTL = 60 * 60 * 24;  //默认存储时间为24小时

    /**
     * 头部菜单缓存文件
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public static function header()
    {
        $res['pc'] = Game::where(['cate_id' => 1 , 'status' => Game::IN_USE_STATUS])
            ->orderBy('sort','desc')->get(['poster', 'name', 'is_hot', 'id']);
        $res['mobile'] = Game::where(['cate_id' => 2 , 'status' => Game::IN_USE_STATUS])
            ->orderBy('sort','desc')->get(['poster', 'name', 'is_hot', 'id']);

        \Cache::set(self::PREFIX . 'header', $res, self::TTL);

        return $res;
    }



    /**
     * 获取缓存
     * @param $param
     * @return mixed
     */
    public static function get($param)
    {

        if ($res = \Cache::get(self::PREFIX . $param)) {

            return $res;
        }

        return self::$param();
    }


    /**
     * 刷新指定键名缓存
     * @param $param
     */
    public static function refresh($param)
    {
        \Cache::forget($param);
    }
}