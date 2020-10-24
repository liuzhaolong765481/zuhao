<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;



/**
 * Class GameCate
 * 
 * @property int $id
 * @property string|null $cate_name
 * @property string|null $image
 *
 * @package App\Models
 */
class GameCate extends BaseModel
{
	protected $table = 'xf_game_cate';
	public $timestamps = false;

	protected $fillable = [
		'cate_name',
		'image'
	];

	public function game(){
	    return $this->hasMany(Game::class,'cate_id','id')->where('status',Game::IN_USE_STATUS);
    }
}
