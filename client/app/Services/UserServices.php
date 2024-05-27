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
    return UserTransaction::all();
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

  public function updateWithdrawBalance(){

  }

  public function updateDepostiBalance(){

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

  protected function updateTransaction(){

  }

  public function createWithdrawProcess($userId, $orderId, $amount){
    $this->createTransaction($userId, $orderId, $amount, 'withdraw');
  }

  public function createDepositProcess(){
    // $this->createTransaction();
  }

  public function updateWithdrawProcess(){
    $this->updateTransaction();
  }

  public function updateDepositProcess(){
    $this->updateTransaction();
  }



}

