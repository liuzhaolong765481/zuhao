<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Class User
 * 
 * @property int $id
 * @property string $user_phone
 * @property string $password
 * @property string|null $nick_name
 * @property string|null $email
 * @property string|null $trade_password
 * @property Carbon $register_time
 * @property Carbon|null $last_login_time
 * @property int|null $is_auth
 * @property string|null $ali_number
 * @property float|null $balance
 * @property float|null $withable_balance
 * @property float|null $deposit
 * @property string|null $uuid
 * @property string|null $real_name
 * @property string|null $idcard
 * @property int|null $status
 *
 * @package App\Models
 */
class User extends Authenticatable
{

    use Page;

	protected $table = 'xf_user';
	public $timestamps = false;

	protected $casts = [
		'is_auth' => 'int',
		'balance' => 'float',
		'withable_balance' => 'float',
		'deposit' => 'float',
		'status' => 'int'
	];

	protected $dates = [
		'register_time',
		'last_login_time'
	];

	protected $hidden = [
		'password',
		'trade_password'
	];

	protected $fillable = [
		'user_phone',
		'password',
		'nick_name',
		'email',
		'trade_password',
		'register_time',
		'last_login_time',
		'is_auth',
		'ali_number',
		'balance',
		'withable_balance',
		'deposit',
		'uuid',
		'real_name',
		'idcard',
		'status'
	];
}
