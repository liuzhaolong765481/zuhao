<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;



/**
 * Class AccountSkuRelation
 * 
 * @property int $id
 * @property int|null $sku_id
 * @property string|null $val
 *
 * @package App\Models
 */
class AccountSkuRelation extends BaseModel
{
	protected $table = 'xf_account_sku_relation';
	public $timestamps = false;

	protected $casts = [
		'sku_id' => 'int'
	];

	protected $fillable = [
		'sku_id',
		'val'
	];
}
