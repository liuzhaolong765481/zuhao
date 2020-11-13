<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Article
 * 
 * @property int $id
 * @property string|null $title
 * @property string|null $auth
 * @property int|null $cate_id
 * @property string|null $seo_title
 * @property string|null $seo_keywords
 * @property string|null $seo_content
 * @property string|null $image
 * @property string|null $content
 * @property string|null $description
 * @property string|null $sort
 * @property string|null $follow
 * @property Carbon|null $create_time
 * @property Carbon|null $update_time
 * @property Carbon|null $delete_time
 *
 * @package App\Models
 */
class Article extends BaseModel
{
	protected $table = 'xf_article';

	use SoftDeletes;

	const INDEX_CATE = 1;

    const CREATED_AT = 'create_time';

    const UPDATED_AT = 'update_time';

    const DELETED_AT = 'delete_time';

	protected $casts = [
		'cate_id' => 'int',
        'sort'    => 'int'
	];

	protected $dates = [
		'create_time',
		'update_time',
		'delete_time'
	];

	protected $fillable = [
		'title',
		'auth',
		'cate_id',
		'seo_title',
		'seo_keywords',
		'seo_content',
		'image',
		'content',
		'create_time',
		'update_time',
		'delete_time',
        'sort',
        'description',
        'follow'
	];

	protected $appends = ['cate_name'];

    /**
     * 返回分类名称
     * @return mixed
     */
	public function getCateNameAttribute()
    {
        return ArticleCate::whereKey($this->cate_id)->value('cate_name');
    }


}
