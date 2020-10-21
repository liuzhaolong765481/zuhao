<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Game
 * 
 * @property int $id
 * @property int|null $cate_id
 * @property int|null $status
 * @property int|null $sort
 * @property string|null $name
 * @property string|null $poster
 * @property string|null $tag
 * @property string|null $description
 * @property Carbon|null $create_time
 * @property Carbon|null $update_time
 * @property Carbon|null $delete_time
 *
 * @package App\Models
 */
class Game extends BaseModel
{
    use SoftDeletes;

	protected $table = 'xf_game';

    const CREATED_AT = 'create_time';

    const UPDATED_AT = 'update_time';

    const DELETED_AT = 'delete_time';

    const IN_USE_STATUS = 1; //游戏状态，上架

    const UN_USE_STATUS = 0; //游戏状态，下架

	protected $casts = [
		'cate_id' => 'int',
        'status'  => 'int',
        'sort'    => 'int'
	];

	protected $dates = [
		'create_time', 'update_time', 'delete_time'
	];

	protected $fillable = [
		'cate_id',
		'name',
		'poster',
		'tag',
		'description',
		'create_time',
        'update_time',
        'delete_time',
        'status',
        'sort'
	];

    protected $appends = ['cate_string'];
    /**
     * 格式化游戏标签
     * @param $v
     */
	public function setTagAttribute($v)
    {
        $this->attributes['tag'] = is_array($v) ? json_encode($v ,JSON_UNESCAPED_UNICODE) : [];
    }

    /**
     * 格式化游戏标签
     * @param $v
     * @return mixed
     */
	public function getTagAttribute($v)
    {
        return  json_decode($v, true);
    }

    public function getCateStringAttribute()
    {
        return GameCate::find($this->cate_id)->cate_name;
    }

    /**
     * 关联类型
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cate()
    {
        return $this->hasOne(GameCate::class,'id','cate_id');
    }

    /**
     * 关联游戏大区
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function region()
    {
        return $this->hasMany(GameRegion::class,'game_id','id');
    }
}
