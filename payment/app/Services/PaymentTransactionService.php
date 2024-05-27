<?php

namespace App\Services;

use App\Exceptions\PaymentJobsException;
use App\Models\PaymentBalanceModel;
use App\Models\PaymentTransactionModel;

class PaymentTransactionService
{
  public function createTransaction($custId, $amount, $category, $orderId,  $transactionDate, $status='success')
  {
    PaymentTransactionModel::create([
      'cust_id'  => $custId,
      'amount'   => $amount,
      'category' => $category,
      'order_id' => $orderId,
      'status'   => $status,
      'transaction_date' => $transactionDate
    ]);
  }

  public function withdrawTranscationSuccess($custId, $amount, $orderId,  $transactionDate)
  {
    $this->createTransaction($custId, $amount, 'withdraw', $orderId,  $transactionDate);
  }

  public function withdrawTranscationFailed($custId, $amount, $orderId,  $transactionDate)
  {
    $this->createTransaction($custId, $amount, 'withdraw', $orderId, $transactionDate, 'failed');
  }

  public function depositTranscationSuccess($custId, $amount, $orderId,  $transactionDate)
  {
    $this->createTransaction($custId, $amount, 'deposit', $orderId,  $transactionDate);
  }

  public function depositTranscationFailed($custId, $amount, $orderId,  $transactionDate)
  {
    $this->createTransaction($custId, $amount, 'deposit', $orderId, $transactionDate, 'failed');
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
