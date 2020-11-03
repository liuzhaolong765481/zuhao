<?php
/**
 * Created by lzl
 * Date: 2020 2020/11/3
 * Time: 11:27
 */

$rules = [
    'avatar'         => null,
    'nick_name'      => null,
    'email'          => null,
    'trade_password' => 12,
    'ali_number'     => null,
];

var_dump(array_filter($rules));