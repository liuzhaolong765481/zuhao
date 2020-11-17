<?php
/**
 * Created by lzl.
 * Date: 2020 2020/10/19 0019
 * Time: 21:49
 */

namespace App\Services;


use App\Exceptions\RequestException;
use App\Models\Account;
use App\Models\AccountSpcesRelation;
use App\Models\GameRegion;
use App\Models\GameService;

class AccountService extends BaseServices
{

    /**
     * 添加账号
     * @param $validate
     * @return bool
     * @throws RequestException
     */
    public static function createAccount($validate)
    {
        \DB::beginTransaction();

        try {
            if (isset($validate['region_id'])) {
                $validate['region_name'] = GameRegion::whereKey($validate['region_id'])->value('region_name');
            }
            if (isset($validate['service_id'])) {
                $validate['service_name'] = GameService::whereKey($validate['service_id'])->value('service_name');
            }
            $account = Account::updateOrCreate(['id' => $validate['id'] ], $validate);
            //处理租号规格
            if (isset($validate['specs']) && is_array($validate['specs'])) {

                AccountSpcesRelation::where('account_id', $account->id)->delete();
                foreach ($validate['specs'] as $k => $v) {
                    if ($v) {
                        AccountSpcesRelation::create([
                            'account_id' => $account->id,
                            'specs_id'   => $k,
                            'price'      => $v,
                        ]);
                    }
                }

            }

            \DB::commit();
            return true;

        }catch (\Exception $e){
            \DB::commit();
            throw new RequestException($e->getMessage());
        }


    }

    /**
     * 租号大厅列表筛选
     * @param $validate
     * @return mixed
     */
    public static function getList($validate)
    {
        $where['is_upper'] = Account::IN_SHELF;

        //筛选条件
        if (isset($validate['game_id']) && $validate['game_id']) {
            $where['game_id'] = $validate['game_id'];
        }

        if (isset($validate['o']) && $validate['o']) {

            if ($validate['o'] == 'amount') {
                $order['amount'] = 'asc';
            } else {
                $order[$validate['o']] = 'desc';
            }

        } else {
            //默认排序浏览次数
            $order['browse_times'] = 'desc';
        }

        return Account::where($where)
            ->orderBy(array_key_first($order), $order[array_key_first($order)])
            ->page($validate['page'], $validate['limit'])
            ->get(['id', 'game_id', 'title', 'tags', 'images', 'region_name', 'service_name', 'amount', 'lease_times']);
    }


}