<?php

namespace App\Services;

use App\Models\UserBalance;
use App\Models\UserTransaction;

class UserServices
{
  public function getBalance(){
    return UserBalance::find(1); 
  }

  public function getTransactions(){
    return UserTransaction::all();
  }

  protected function generateOrderId($type){
    $total = UserTransaction::count();
    return $type . $total + 1;
  }

  public function generateWithdrawOrderId(){
    return $this->generateOrderId('withdraw');
  }

  public function generateDepositOrderId(){
    return $this->generateOrderId('deposit');
  }

  public function updateWithdrawBalance(){

  }

  public function updateDepostiBalance(){

  }

  protected function createTransaction(){

  }

  protected function updateTransaction(){

  }

  public function createWithdrawProcess(){
    $this->createTransaction();
  }

  public function createDepositProcess(){
    $this->createTransaction();
  }

  public function updateWithdrawProcess(){
    $this->updateTransaction();
  }

  public function updateDepositProcess(){
    $this->updateTransaction();
  }



}

