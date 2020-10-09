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
    protected $table = 'xf_user';

    protected $fillable = ['user_phone', 'password'];

    protected $hidden = [
        'password'
    ];

}