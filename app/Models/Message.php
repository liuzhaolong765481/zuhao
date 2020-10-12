<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

/**
 * Class Message
 * 
 * @property int $id
 * @property int|null $cate_id
 * @property string|null $content
 * @property int|null $is_read
 * @property Carbon|null $create_time
 *
 * @package App\Models
 */
class Message extends BaseModel
{
	protected $table = 'xf_message';
	public $timestamps = false;

	protected $casts = [
		'cate_id' => 'int',
		'is_read' => 'int'
	];

	protected $dates = [
		'create_time'
	];

	protected $fillable = [
		'cate_id',
		'content',
		'is_read',
		'create_time'
	];
}
