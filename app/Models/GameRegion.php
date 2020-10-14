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

    /**
     * 关联游戏服务器
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function service()
    {
        return $this->hasMany(GameService::class,'region_id','id');
    }
}
