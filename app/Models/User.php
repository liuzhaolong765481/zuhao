<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/9
 * Time: 10:31
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = '';

    protected $fillable = [];

    protected $hidden = [
        'password'
    ];

}