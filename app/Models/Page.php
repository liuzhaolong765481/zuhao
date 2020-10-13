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
    public function scopePage($query, $page = 1, $limit = 10)
    {
        define('PAGE_COUNT', $query->count());

        return \Request::input('page') ? $query->offset((int)$page - 1 * (int)$limit)->limit((int)$limit) : $query;
    }


}