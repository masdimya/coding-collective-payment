<?php

namespace App\Exceptions;

use Exception;
use Throwable;


class PaymentHttpException extends Exception
{

    protected $orderId;
    protected $amount;
    protected const FAILED_STATUS = 2;


    public function __construct(Throwable $e, $orderId, $amount)
    {
        $this->orderId = $orderId;
        $this->amount  = $amount;

        parent::__construct($e->getMessage(), $e->getCode(), $e);

    }

    public function getOrderId(){
        return $this->orderId;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function getStatus(){
        return $this::FAILED_STATUS;
    }
}
