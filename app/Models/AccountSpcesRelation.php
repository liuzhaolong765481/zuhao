<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;



/**
 * Class AccountSpcesRelation
 * 
 * @property int $id
 * @property int|null $account_id
 * @property int|null $specs_id
 * @property float|null $price
 *
 * @package App\Models
 */
class AccountSpcesRelation extends BaseModel
{
	protected $table = 'xf_account_spces_relation';
	public $timestamps = false;

	protected $casts = [
		'account_id' => 'int',
		'specs_id' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'account_id',
		'specs_id',
		'price'
	];
}
