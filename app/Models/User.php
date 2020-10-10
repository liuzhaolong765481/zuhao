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

    protected $fillable = [
        'user_phone', 'nick_name', 'password', 'email', 'trade_password', 'register_time', 'last_login_time', 'is_auth',
        'ali_number', 'uuid', 'status'
    ];

    protected $hidden = [
        'password'
    ];

}