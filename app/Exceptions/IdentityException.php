<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class IdentityException extends Exception
{
    public function __construct($message = "", $code = 301, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
