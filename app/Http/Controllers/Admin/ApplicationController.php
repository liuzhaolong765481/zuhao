<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/16
 * Time: 9:46
 */
namespace App\Http\Controllers\Admin;

use App\Models\Ad;

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
            if(isset($validated['type'])){
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
            'id'    => 'nullable',
            'image' => 'required',
            'href'  => 'present',
            'type'  => 'required|integer',
        ];

        $this->validateInput($rules);

        if($this->request->isMethod('post')) {
            Ad::updateOrCreate(['id' => $this->validated['id']], $this->validated);
        }

        $ad = Ad::findOrNew($this->validated['id'] ?? 0);

        return $this->rView('application.add_ad', compact('ad'));
    }
}