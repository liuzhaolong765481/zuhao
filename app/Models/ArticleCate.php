<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;



/**
 * Class ArticleCate
 * 
 * @property int $id
 * @property string|null $cate_name
 * @property int|null $pid
 * @property string|null $cate_descript
 * @property string|null $image
 *
 * @package App\Models
 */
class ArticleCate extends BaseModel
{
	protected $table = 'xf_article_cate';
	public $timestamps = false;

	protected $casts = [
		'pid' => 'int'
	];

	protected $fillable = [
		'cate_name',
		'pid',
		'cate_descript',
		'image'
	];
}
