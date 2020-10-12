<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

/**
 * Class UserBalanceLog
 * 
 * @property int $id
 * @property int $uid
 * @property int|null $cate
 * @property float|null $amount
 * @property string|null $descript
 * @property Carbon|null $create_time
 *
 * @package App\Models
 */
class UserBalanceLog extends BaseModel
{
	protected $table = 'xf_user_balance_log';
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int',
		'cate' => 'int',
		'amount' => 'float'
	];

	protected $dates = [
		'create_time'
	];

	protected $fillable = [
		'uid',
		'cate',
		'amount',
		'descript',
		'create_time'
	];
}
