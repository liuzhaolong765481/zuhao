<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/12
 * Time: 16:40
 */

namespace App\Http\Controllers\Admin;

class ArticleController extends Controller
{

    public function articleList()
    {
        return $this->rView('article.list');
    }

}