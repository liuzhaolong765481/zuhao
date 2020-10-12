<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;



/**
 * Class GameRegion
 * 
 * @property int $id
 * @property int|null $game_id
 * @property string|null $region_name
 *
 * @package App\Models
 */
class GameRegion extends BaseModel
{
	protected $table = 'xf_game_region';
	public $timestamps = false;

	protected $casts = [
		'game_id' => 'int'
	];

	protected $fillable = [
		'game_id',
		'region_name'
	];
}
