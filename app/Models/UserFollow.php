<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

/**
 * Class UserFollow
 * 
 * @property int $id
 * @property int $uid
 * @property int|null $obj_id
 * @property string|null $obj_title
 * @property int|null $type
 * @property Carbon|null $create_time
 *
 * @package App\Models
 */
class UserFollow extends BaseModel
{
	protected $table = 'xf_user_follow';
	public $timestamps = false;

	protected $casts = [
		'uid' => 'int',
		'obj_id' => 'int',
		'type' => 'int'
	];

	protected $dates = [
		'create_time'
	];

	protected $fillable = [
		'uid',
		'obj_id',
		'obj_title',
		'type',
		'create_time'
	];
}
