<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Admin
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $password
 * @property string|null $email
 * @property string|null $create_time
 *
 * @package App\Models
 */
class Admin extends Authenticatable
{
    use Page;

	protected $table = 'xf_admin';

	const CREATED_AT =  'create_time';

	const UPDATED_AT = null;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'password'
	];
}
