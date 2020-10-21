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
//        \DB::beginTransaction();
//        try {
            if (isset($validate['region_id'])) {
                $validate['region_name'] = GameRegion::whereKey($validate['region_id'])->value('region_name');
            }
            if (isset($validate['service_id'])) {
                $validate['service_name'] = GameService::whereKey($validate['service_id'])->value('service_name');
            }
            $account = Account::create($validate);
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

            return true;

//            \DB::commit();
//            return true;
//
//        }catch (\Exception $e){
//            \DB::commit();
//            throw new RequestException($e->getMessage());
//        }


    }


}