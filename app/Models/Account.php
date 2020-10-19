<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

/**
 * Class Account
 * 
 * @property int $id
 * @property string|null $title
 * @property string|null $descript
 * @property string|null $explain
 * @property int|null $uid
 * @property int|null $shop_id
 * @property int|null $game_id
 * @property int|null $region_id
 * @property string|null $region_name
 * @property int|null $service_id
 * @property string|null $service_name
 * @property string|null $images
 * @property int|null $browse_times
 * @property int|null $lease_times
 * @property int|null $lease_hour
 * @property int|null $follow_times
 * @property float|null $deposit
 * @property string|null $tags
 * @property int|null $is_upper
 * @property Carbon|null $create_time
 * @property Carbon|null $update_time
 *
 * @package App\Models
 */
class Account extends BaseModel
{
	protected $table = 'xf_account';

	const CREATED_AT = 'create_time';

	const UPDATED_AT = 'update_time';

	protected $casts = [
		'uid' => 'int',
		'shop_id' => 'int',
		'game_id' => 'int',
		'region_id' => 'int',
		'service_id' => 'int',
		'browse_times' => 'int',
		'lease_times' => 'int',
		'lease_hour' => 'int',
		'follow_times' => 'int',
		'deposit' => 'float',
		'is_upper' => 'int'
	];

	protected $dates = [
		'create_time',
		'update_time'
	];

	protected $fillable = [
		'title',
		'descript',
		'explain',
		'uid',
		'shop_id',
		'game_id',
		'region_id',
		'region_name',
		'service_id',
		'service_name',
		'images',
		'browse_times',
		'lease_times',
		'lease_hour',
		'follow_times',
		'deposit',
		'tags',
		'is_upper',
		'create_time',
		'update_time'
	];


	protected $appends = ['game_name', 'game_cate', 'user_phone', 'spu'];


	public function getGameNameAttribute()
    {
        return Game::whereKey($this->game_id)->value('name');
    }

    public function getGameCateAttribute()
    {

    }

    public function getUserPhoneAttribute()
    {

    }

    public function getSpuAttribute()
    {

    }

}
