<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/16
 * Time: 9:46
 */
namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use App\Models\Article;
use App\Models\ArticleCate;

class ApplicationController extends Controller
{

    /**
     * 广告列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function adList()
    {
        if($this->request->ajax()) {

            $rules = [
                'page'       => 'required',
                'limit'      => 'required',
                'type'       => 'nullable'
            ];

            $this->validateInput($rules);

            $validated = $this->validated;

            $where = [];
            if(isset($validated['type']) && $validated['type']){
                $where['type'] = $validated['type'];
            }

            $list = Ad::where($where)
                ->page($validated['page'], $validated['limit'])
                ->get();

            return $this->showJsonLayui($list);
        }

        return $this->rView('application.ad_list');
    }

    /**
     * 添加广告
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\RequestException
     */
    public function addAd()
    {
        $rules = [
            'id'      => 'nullable',
            'image'   => 'nullable',
            'href'    => 'nullable',
            'type'    => 'nullable',
            'is_show' => 'nullable'
        ];

        $this->validateInput($rules);

        if($this->request->isMethod('post')) {
            return $this->successOrFailed(Ad::updateOrCreate(['id' => $this->validated['id']], $this->validated));
        }

        $ad = Ad::findOrNew($this->validated['id'] ?? 0);

        return $this->rView('application.add_ad', compact('ad'));
    }


    /**
     * 文章列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function articleList()
    {
        if($this->request->ajax()) {

            $rules = [
                'page'       => 'required',
                'limit'      => 'required',
                'title'       => 'nullable'
            ];

            $this->validateInput($rules);

            $validated = $this->validated;

            $where = [];
            if(isset($validated['title']) && $validated['title']){
                $where['type'] = $validated['type'];
            }

            $list = Article::where($where)
                ->page($validated['page'], $validated['limit'])
                ->get();

            return $this->showJsonLayui($list);
        }

        return $this->rView('application.article_list');
    }

    /**
     * 添加文章
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function addArticle()
    {
        $rules = [
            'id'           => 'nullable',
            'title'        => 'nullable',
            'auth'         => 'nullable',
            'cate_id'      => 'nullable',
            'seo_title'    => 'nullable',
            'seo_keywords' => 'nullable',
            'seo_content'  => 'nullable',
            'image'        => 'nullable',
            'content'      => 'nullable',
            'sort'         => 'nullable',
        ];

        $this->validateInput($rules);

        if($this->request->isMethod('post')) {
            return $this->successOrFailed(Article::updateOrCreate(['id' => $this->validated['id'], $this->validated]));
        }

        $article = Article::findOrNew($this->validated['id'] ?? 0);

        return $this->rView('application.add_article', compact('article'));
    }



    /**
     * 文章列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function articleCateList()
    {
        if($this->request->ajax()) {

            $rules = [
                'page'       => 'required',
                'limit'      => 'required',
            ];

            $this->validateInput($rules);

            $list = ArticleCate::where([])
                ->page($this->validated['page'], $this->validated['limit'])
                ->get();

            return $this->showJsonLayui($list);
        }

        return $this->rView('application.article_cate_list');
    }

    /**
     * 添加文章
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function addArticleCate()
    {
        $rules = [
            'id'            => 'nullable',
            'cate_name'     => 'nullable',
            'pid'           => 'nullable',
            'cate_descript' => 'nullable',
            'image'         => 'nullable',
        ];

        $this->validateInput($rules);

        if($this->request->isMethod('post')) {
            return $this->successOrFailed(ArticleCate::updateOrCreate(['id' => $this->validated['id']], $this->validated));
        }

        $article = ArticleCate::findOrNew($this->validated['id'] ?? 0);

        $cate_list = ArticleCate::all();

        return $this->rView('application.add_article_cate', compact('article','cate_list'));
    }

}