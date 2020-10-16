<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;



/**
 * Class Ad
 * 
 * @property int $id
 * @property string|null $image
 * @property string|null $href
 * @property int|null $type
 *
 * @package App\Models
 */
class Ad extends BaseModel
{
    const INDEX_BANNER = 1;  //首页banner

    const NAV_BANNER = 3;  //导航banner

	protected $table = 'xf_ad';

    const CREATED_AT = 'create_time';

    const UPDATED_AT = null;

	protected $casts = [
		'type' => 'int'
	];

	protected $fillable = [
		'image',
		'href',
		'type',
        'is_show'
	];

	protected $appends = ['type_name'];

    /**
     * 幻灯片类型
     * @return string
     */
	public function getTypeNameAttribute()
    {
        switch ($this->type)
        {
            case self::INDEX_BANNER:
                return '首页banner';
            case self::NAV_BANNER:
                return '导航页banner';
            default:
                return '默认广告';
        }
    }
}
