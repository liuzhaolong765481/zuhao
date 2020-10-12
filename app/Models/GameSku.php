<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;



/**
 * Class GameSku
 * 
 * @property int $id
 * @property int|null $game_id
 * @property string|null $sku_name
 * @property string|null $sku_icon
 *
 * @package App\Models
 */
class GameSku extends BaseModel
{
	protected $table = 'xf_game_sku';
	public $timestamps = false;

	protected $casts = [
		'game_id' => 'int'
	];

	protected $fillable = [
		'game_id',
		'sku_name',
		'sku_icon'
	];
}
