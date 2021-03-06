<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Overtrue\Pinyin\Pinyin;

/**
 * Class Game
 * 
 * @property int $id
 * @property int|null $cate_id
 * @property int|null $status
 * @property int|null $is_hot
 * @property int|null $is_index
 * @property int|null $sort
 * @property string|null $name
 * @property string|null $poster
 * @property string|null $index_poster
 * @property string|null $icon
 * @property string|null $tag
 * @property string|null $description
 * @property Carbon|null $create_time
 * @property Carbon|null $update_time
 * @property Carbon|null $delete_time
 * @property string $first_number
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

    const IS_HOT = 1;  //热门

    const IS_INDEX = 1;  //首页展示

	protected $casts = [
        'cate_id'  => 'int',
        'status'   => 'int',
        'sort'     => 'int',
        'is_hot'   => 'int',
        'is_index' => 'int'
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
        'sort',
        'is_hot',
        'is_index',
        'index_poster',
        'icon',
        'first_number'
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

    public function setFirstNumberAttribute($v)
    {
        $this->attributes['first_number'] =
            strtoupper(substr((preg_match_all("/^[a-zA-Z]/", $v) ? $v : (new Pinyin)->abbr($v)), 0, 1));
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

    /**
     * 游戏sku
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sku()
    {
        return $this->hasMany(GameSku::class,'game_id','id');
    }
}
