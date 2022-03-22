<?php

namespace App\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{

    public function __construct($message = '', $code = 0, Throwable $previous = null) {
        $message = 'User not found.';
        parent::__construct($message, $code, $previous);
    }
}
