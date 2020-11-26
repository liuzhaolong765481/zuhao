<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Http\Controllers\MemberController;
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
 * @property string|null $account
 * @property string|null $password
 * @property int|null $browse_times
 * @property int|null $lease_times
 * @property int|null $lease_hour
 * @property int|null $follow_times
 * @property float|null $deposit
 * @property float|null $amount
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

	const IN_SHELF = 1;

	const UN_SHELF = 0;

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
        'amount' => 'float',
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
        'amount',
		'deposit',
		'tags',
		'is_upper',
		'create_time',
		'update_time',
        'account',
        'password'
	];


	protected $appends = ['game_name', 'user_phone', 'user_nick'];

    /**
     * 游戏名称
     * @return mixed
     */
	public function getGameNameAttribute()
    {
        return Game::whereKey($this->game_id)->value('name');
    }

    /**
     * 账号所有者
     * @return mixed
     */
    public function getUserPhoneAttribute()
    {
        return User::whereKey($this->uid)->value('user_phone') ?: '系统发布';
    }

    /**
     * 账号所有者
     * @return mixed
     */
    public function getUserNickAttribute()
    {
        return User::whereKey($this->uid)->value('nick_name') ?: '平台出租';
    }

    /**
     * 格式化账号标签
     * @param $v
     */
    public function setTagsAttribute($v)
    {
        $this->attributes['tags'] = is_array($v) ? json_encode($v,JSON_UNESCAPED_UNICODE) : [];
    }

    /**
     * 格式化账号标签
     * @param $v
     * @return mixed
     */
    public function getTagsAttribute($v)
    {
        return  json_decode($v, true);
    }

    /**
     * 格式化账号图片
     * @param $v
     */
    public function setImagesAttribute($v)
    {
        $this->attributes['images'] = is_array($v) ? json_encode($v) : [];
    }


    /**
     * 格式化账号标签
     * @param $v
     * @return mixed
     */
    public function getImagesAttribute($v)
    {
        return  json_decode($v, true);
    }

    /**
     * 关联关系表
     */
    public function account_specs()
    {
        return $this->hasMany(AccountSpcesRelation::class,'account_id','id');
    }


    public function user()
    {
        return $this->hasOne(User::class,'id','uid');
    }

}
