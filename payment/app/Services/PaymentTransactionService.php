<?php

namespace App\Services;

use App\Exceptions\PaymentJobsException;
use App\Models\PaymentBalanceModel;
use App\Models\PaymentTransactionModel;

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

  public function withdrawTranscationSuccess($custId, $amount, $orderId)
  {
    $this->createTransaction($custId, $amount, 'withdraw', $orderId);
  }

  public function withdrawTranscationFailed($custId, $amount, $orderId)
  {
    $this->createTransaction($custId, $amount, 'withdraw', $orderId, 'failed');
  }

  public function depositTranscationSuccess($custId, $amount, $orderId)
  {
    $this->createTransaction($custId, $amount, 'deposit', $orderId);
  }

  public function depositTranscationFailed($custId, $amount, $orderId)
  {
    $this->createTransaction($custId, $amount, 'deposit', $orderId, 'failed');
  }

  public function withdraw($custId, $amount)
  {
    $balance = PaymentBalanceModel::where('cust_id', $custId )->first();
    if($balance->balance < $amount){
      throw PaymentJobsException::insufficientBalance();
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
