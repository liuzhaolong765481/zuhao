<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

/**
 * Class UserBehavior
 * 
 * @property int $id
 * @property int|null $uid
 * @property int|null $type
 * @property string|null $descript
 * @property Carbon|null $create_time
 *
 * @package App\Models
 */
class UserBehavior extends BaseModel
{
	protected $table = 'xf_user_behavior';
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int',
		'type' => 'int'
	];

	protected $dates = [
		'create_time'
	];

	protected $fillable = [
		'uid',
		'type',
		'descript',
		'create_time'
	];
}
