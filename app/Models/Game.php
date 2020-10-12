<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

/**
 * Class Game
 * 
 * @property int $id
 * @property int|null $cate_id
 * @property string|null $name
 * @property string|null $poster
 * @property string|null $tag
 * @property string|null $descript
 * @property Carbon|null $create_time
 *
 * @package App\Models
 */
class Game extends BaseModel
{
	protected $table = 'xf_game';
	public $timestamps = false;

	protected $casts = [
		'cate_id' => 'int'
	];

	protected $dates = [
		'create_time'
	];

	protected $fillable = [
		'cate_id',
		'name',
		'poster',
		'tag',
		'descript',
		'create_time'
	];
}
