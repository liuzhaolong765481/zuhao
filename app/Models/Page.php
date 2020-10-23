<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Created by lzl
 * Date: 2020 2020/10/13
 * Time: 14:18
 */

trait Page
{

    /**
     * 分页方法
     * @param Builder $query
     * @param int $page 偏移量
     * @param int $limit 取出条数
     * @return mixed
     */
    public function scopePage($query)
    {
        $limit = (int)(\Request::input('limit') ?? 10);

        $page = (int)(\Request::input('page') ?? 1);

        define('PAGE_COUNT', $query->count());

        return \Request::input('page') ? $query->offset(($page - 1) * $limit)->limit($limit) : $query;
    }


}