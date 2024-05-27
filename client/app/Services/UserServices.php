<?php

namespace App\Services;

use App\Models\UserBalance;
use App\Models\UserTransaction;
use App\Models\User;


class UserServices
{
  public function getUserInfo(){
    return User::find(1); 
  }

  public function getBalance(){
    return UserBalance::find(1); 
  }

  public function getTransactions(){
    return UserTransaction::orderBy('id','desc')->get();
  }

  protected function generateOrderId($type){
    $total = UserTransaction::count();
    return $type . strval($total + 1);
  }

  public function generateWithdrawOrderId(){
    return $this->generateOrderId('WD');
  }

  public function generateDepositOrderId(){
    return $this->generateOrderId('DEPO');
  }


  protected function createTransaction($userId, $orderId, $amount, $category, $status = 'process'){
    
    UserTransaction::create([
      'user_id'  => $userId,
      'order_id' => $orderId,
      'amount'   => $amount,
      'category' => $category,
      'status'   => $status

    ]);
  }

  public function updateTransaction($orderId, $status){
    $transaction = UserTransaction::where('order_id',$orderId)->first();

    switch ($status) {
      case 'success':
        $transaction->status = 'success';
        break;
      case 'failed':
      default:
        $transaction->status = 'failed';
        break;
    }

    $transaction->save();
  }

  public function createWithdrawProcess($userId, $orderId, $amount){
    $this->createTransaction($userId, $orderId, $amount, 'withdraw');
  }

  public function createDepositProcess($userId, $orderId, $amount){
    $this->createTransaction($userId, $orderId, $amount, 'deposit');
  }

  public function updateBalance($orderId, $walletBalance){
    $transaction = UserTransaction::where('order_id',$orderId)->first();
    $category    = $transaction->category;
    $amount      = $transaction->amount;

    switch ($category) {
      case 'withdraw':
        $this->updateWithdrawBalance($amount, $walletBalance);
        break;
      case 'deposit':
        $this->updateDepositBalance($amount, $walletBalance);
        break;
      default:
        break;
    }

  }

  public function updateWithdrawBalance($amount, $walletBalance){
    $user = UserBalance::find(1);
    $user->balance -= $amount;
    $user->balance_wallet = $walletBalance;
    $user->save();
  }

  public function updateDepositBalance($amount, $walletBalance){
    $user = UserBalance::find(1);
    $user->balance += $amount;
    $user->balance_wallet = $walletBalance;
    $user->save();
  }




}

