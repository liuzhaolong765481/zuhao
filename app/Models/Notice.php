<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

/**
 * Class Notice
 * 
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property Carbon|null $create_time
 *
 * @package App\Models
 */
class Notice extends BaseModel
{
	protected $table = 'xf_notice';
	public $timestamps = false;

	protected $dates = [
		'create_time'
	];

	protected $fillable = [
		'title',
		'content',
		'create_time'
	];
}
