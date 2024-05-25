<?php

namespace App\Services;

use App\Models\PaymentTransactionModel;



class PaymentTransactionService
{
  protected function makeTransaction($custId, $amount, $category, $orderId)
  {
    PaymentTransactionModel::create([
      'cust_id'  => $custId,
      'amount'   => $amount,
      'category' => $category,
      'order_id' => $orderId,
    ]);

    $this->updateBalance();
    $this->notify();

  }

  public function withdraw($custId, $amount, $orderId)
  {
    $this->makeTransaction($custId, $amount, 'witdraw', $orderId);
  }

  public function deposit($custId, $amount, $orderId)
  {
    $this->makeTransaction($custId, $amount, 'deposit', $orderId);
  }

  public function notify(){

  }

  public function updateBalance(){

  }
}
