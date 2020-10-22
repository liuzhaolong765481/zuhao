<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;



/**
 * Class AccountSpec
 * 
 * @property int $id
 * @property string|null $specs_name
 *
 * @package App\Models
 */
class AccountSpec extends BaseModel
{
	protected $table = 'xf_account_specs';
	public $timestamps = false;

	protected $fillable = [
		'specs_name'
	];


}
