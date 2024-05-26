<?php

namespace App\Exceptions;

use Exception;

class JobsException extends Exception
{
    public function __construct($message = "Internal Server Error")
    {
        parent::__construct($message);
    }
}
