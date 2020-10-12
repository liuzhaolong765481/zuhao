<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;



/**
 * Class Setting
 * 
 * @property int $id
 * @property string|null $name
 * @property int|null $pid
 * @property string|null $key
 * @property string|null $value
 *
 * @package App\Models
 */
class Setting extends BaseModel
{
	protected $table = 'xf_setting';
	public $timestamps = false;

	protected $casts = [
		'pid' => 'int'
	];

	protected $fillable = [
		'name',
		'pid',
		'key',
		'value'
	];
}
