<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;



/**
 * Class Ad
 * 
 * @property int $id
 * @property string|null $image
 * @property string|null $href
 * @property int|null $type
 *
 * @package App\Models
 */
class Ad extends BaseModel
{
	protected $table = 'xf_ad';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int'
	];

	protected $fillable = [
		'image',
		'href',
		'type'
	];
}
