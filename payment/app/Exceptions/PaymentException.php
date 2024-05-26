<?php

namespace App\Exceptions;

use App\Exceptions\ApiException;

class PaymentException extends ApiException
{
    public static function insufficientBalance(){
        return new static("Insufficient Balance",500);
    }
}
