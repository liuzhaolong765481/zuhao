<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    /**
     * 分页方法
     * @param Builder $query
     * @param int $offset 偏移量
     * @param int $limit 取出条数
     * @return mixed
     */
    public function scopePage($query, $offset = 0, $limit = 10)
    {
        return \Request::input('excel') == 2 ? $query : $query->offset(($offset - 1) * $limit)->limit($limit);
    }
}
