<?php
/**
 * Created by lzl
 * Date: 2020 2020/10/9
 * Time: 11:06
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    protected $table = 'xf_admin';

    protected $fillable = ['name', 'password'];

    protected $hidden = [
        'password'
    ];

}