<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

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
 * @property Carbon|null $create_time
 * @property Carbon|null $update_time
 * @property Carbon|null $delete_time
 *
 * @package App\Models
 */
class Article extends BaseModel
{
	protected $table = 'xf_article';
	public $timestamps = false;

	protected $casts = [
		'cate_id' => 'int'
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
		'delete_time'
	];
}
