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
}

