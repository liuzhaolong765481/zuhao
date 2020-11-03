<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

/**
 * Class Card
 * 
 * @property int $id
 * @property string $card_name
 * @property string|null $card_image
 * @property int $type
 * @property int|null $hour
 * @property float|null $amount
 * @property int $number
 * @property int|null $expire_time
 * @property int|null $use_number
 * @property int|null $channel
 * @property int|null $status
 * @property Carbon|null $create_time
 *
 * @package App\Models
 */
class Card extends BaseModel
{
	protected $table = 'xf_card';

	const CREATED_AT = 'create_time';


	protected $casts = [
		'type' => 'int',
		'hour' => 'int',
		'amount' => 'float',
		'number' => 'int',
		'expire_time' => 'int',
		'use_number' => 'int',
		'channel' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'create_time'
	];

	protected $fillable = [
		'card_name',
		'card_image',
		'type',
		'hour',
		'amount',
		'number',
		'expire_time',
		'use_number',
		'channel',
		'status',
		'create_time'
	];
}
