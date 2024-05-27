<?php

namespace App\Http\Controllers;

use App\Events\BroadCastTransaction;
use App\Services\UserServices;
use Illuminate\Http\Request;


class UserController extends Controller
{
    protected $userService;
    public function __construct()
    {
        $this->userService = new UserServices();
    }
    public function hookTransaction(Request $request){

        $status  = $request->status;
        $orderId = $request->orderId;
        $walletBalance = $request->balance;

        $this->userService->updateTransaction($orderId, $status);
        $this->userService->updateBalance($orderId, $walletBalance);

        event(new BroadCastTransaction(true));
        return response('ok',200);
    }
}
