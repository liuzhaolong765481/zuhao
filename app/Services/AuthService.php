<?php

namespace App\Services;



class AuthService extends BaseServices
{

    /**
     * @param $members
     * @return array
     */
    public static function login($members)
    {
        \Auth::login($members);

        return [
            auth()->id(),
        ];
    }
}