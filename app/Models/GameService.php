<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;



/**
 * Class GameService
 * 
 * @property int $id
 * @property int|null $region_id
 * @property string|null $service_name
 *
 * @package App\Models
 */
class GameService extends BaseModel
{
	protected $table = 'xf_game_service';
	public $timestamps = false;

	protected $casts = [
		'region_id' => 'int'
	];

	protected $fillable = [
		'region_id',
		'service_name'
	];
}
