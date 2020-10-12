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
 *
 * @package App\Models
 */
class Admin extends Authenticatable
{
	protected $table = 'xf_admin';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'password'
	];
}
