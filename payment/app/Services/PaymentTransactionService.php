<?php

namespace App\Services;

use App\Models\PaymentBalanceModel;
use App\Models\PaymentTransactionModel;
use Error;

class PaymentTransactionService
{
  public function createTransaction($custId, $amount, $category, $orderId, $status='success')
  {
    PaymentTransactionModel::create([
      'cust_id'  => $custId,
      'amount'   => $amount,
      'category' => $category,
      'order_id' => $orderId,
      'status'   => $status,
    ]);


  }

  public function withdraw($custId, $amount)
  {
    $balance = PaymentBalanceModel::where('cust_id', $custId )->first();
    if($balance->balance < $amount){
      throw New Error('error');
    } 

    $balance->balance -= $amount;
    $balance->save();
  }

  public function deposit($custId, $amount)
  {
    $balance = PaymentBalanceModel::where('cust_id', $custId )->first();
    $balance->balance += $amount;
    $balance->save();
  }

  public function notify(){
    return 'notify';
  }

}
