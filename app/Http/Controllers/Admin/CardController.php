<?php
/**
 * Created by lzl
 * Date: 2020 2020/11/3
 * Time: 14:30
 */

namespace App\Http\Controllers\Admin;

use App\Models\Card;

class CardController extends Controller
{
    /**
     * 卡券列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function cardList()
    {
        if($this->request->ajax()) {
            $rules = [
                'page'  => 'required',
                'limit' => 'required',
                'type'  => 'nullable'
            ];

            $this->validateInput($rules);

            $validated = $this->validated;

            $where = [];
            if(isset($validated['type']) && $validated['type']){
                $where['type'] = $validated['type'];
            }

            $list = Card::where($where)
                ->page($validated['page'], $validated['limit'])
                ->get();

            return $this->showJsonLayui($list);
        }

        return $this->rView('card.card_list');
    }


    /**
     * 添加卡片
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \App\Exceptions\RequestException
     */
    public function addCard()
    {
        $rules = [
            'id'          => 'nullable',
            'card_name'   => 'nullable',
            'card_image'  => 'nullable',
            'type'        => 'nullable',
            'hour'        => 'nullable',
            'amount'      => 'nullable',
            'number'      => 'nullable',
            'expire_time' => 'nullable',
            'use_number'  => 'nullable',
            'channel'     => 'nullable',
            'status'      => 'nullable',

        ];

        $this->validateInput($rules);

        if($this->request->isMethod('post')) {
            return $this->successOrFailed(
                Card::updateOrCreate(['id' => $this->validated['id'] ?? 0], $this->validated)
            );
        }

        $card = Card::findOrNew($this->validated['id'] ?? 0);

        return $this->rView('card.add_card',compact('card'));

    }

}