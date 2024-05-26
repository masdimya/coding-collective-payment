<?php

namespace App\Exceptions;

use App\Exceptions\JobsException;

class PaymentJobsException extends JobsException
{
    
    public static function insufficientBalance(){
        return new self("Insufficient Balance");
    }
}
