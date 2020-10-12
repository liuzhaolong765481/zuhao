<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

/**
 * Class Order
 * 
 * @property int $id
 * @property int|null $uid
 * @property int|null $account_uid
 * @property string|null $account_name
 * @property int|null $account_id
 * @property string|null $account_title
 * @property string|null $account_image
 * @property int|null $card_id
 * @property int|null $specs_relation_id
 * @property float|null $specs_relation_price
 * @property string|null $spces_name
 * @property int|null $count
 * @property string|null $order_sn
 * @property int|null $status
 * @property float|null $total_amount
 * @property float|null $real_amount
 * @property float|null $deposit
 * @property Carbon|null $pay_time
 * @property int|null $pay_channel
 * @property Carbon|null $start_time
 * @property Carbon|null $end_time
 * @property string|null $appeal_remark
 * @property Carbon|null $create_time
 * @property Carbon|null $update_time
 * @property string|null $expansion
 * @property string|null $remarks
 *
 * @package App\Models
 */
class Order extends BaseModel
{
	protected $table = 'xf_order';
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int',
		'account_uid' => 'int',
		'account_id' => 'int',
		'card_id' => 'int',
		'specs_relation_id' => 'int',
		'specs_relation_price' => 'float',
		'count' => 'int',
		'status' => 'int',
		'total_amount' => 'float',
		'real_amount' => 'float',
		'deposit' => 'float',
		'pay_channel' => 'int'
	];

	protected $dates = [
		'pay_time',
		'start_time',
		'end_time',
		'create_time',
		'update_time'
	];

	protected $fillable = [
		'uid',
		'account_uid',
		'account_name',
		'account_id',
		'account_title',
		'account_image',
		'card_id',
		'specs_relation_id',
		'specs_relation_price',
		'spces_name',
		'count',
		'order_sn',
		'status',
		'total_amount',
		'real_amount',
		'deposit',
		'pay_time',
		'pay_channel',
		'start_time',
		'end_time',
		'appeal_remark',
		'create_time',
		'update_time',
		'expansion',
		'remarks'
	];
}
