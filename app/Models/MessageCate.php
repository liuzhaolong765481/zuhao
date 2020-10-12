<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;



/**
 * Class MessageCate
 * 
 * @property int $id
 * @property string|null $cate_name
 *
 * @package App\Models
 */
class MessageCate extends BaseModel
{
	protected $table = 'xf_message_cate';
	public $timestamps = false;

	protected $fillable = [
		'cate_name'
	];
}
