<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

/**
 * Class UserCard
 * 
 * @property int $id
 * @property int|null $card_id
 * @property int|null $uid
 * @property int|null $status
 * @property Carbon|null $create_time
 * @property string|null $invalid_time
 *
 * @package App\Models
 */
class UserCard extends BaseModel
{
	protected $table = 'xf_user_card';
	public $timestamps = false;

	protected $casts = [
		'card_id' => 'int',
		'uid' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'create_time'
	];

	protected $fillable = [
		'card_id',
		'uid',
		'status',
		'create_time',
		'invalid_time'
	];
}
