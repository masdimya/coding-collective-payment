<?php

namespace App\Services;

use App\Exceptions\PaymentJobsException;
use App\Models\PaymentBalanceModel;
use App\Models\PaymentTransactionModel;
use App\Services\PaymentWebHookService;


class PaymentTransactionService
{
  protected $webHookService;

  public function __construct(){
    $this->webHookService = new PaymentWebHookService();
  }
  
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

  public function notifySuccess($custId,$orderId){
    $balance = PaymentBalanceModel::where('cust_id', $custId )->first();
    $body    = [
      'order_id' => $orderId,
      'balance'  => $balance->balance,
      'status'   => 'success'
    ];
    $this->webHookService->transactionSendResult($custId, $body);
  }

  public function notifyFailed($custId,$orderId){
    $balance = PaymentBalanceModel::where('cust_id', $custId )->first();
    $body    = [
      'order_id' => $orderId,
      'balance'  => $balance->balance,
      'status'   => 'failed'
    ];
    $this->webHookService->transactionSendResult($custId, $body);
  }

}
