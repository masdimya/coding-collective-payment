<?php

namespace App\Http\Controllers;

use App\Events\BroadCastTransaction;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    protected $userService;
    public function __construct()
    {
        $this->userService = new UserServices();
    }
    public function hookTransaction(Request $request){

        $status  = $request->status;
        $orderId = $request->order_id;
        $walletBalance = $request->balance;
        Log::info('status & walletBalance: {id} {wallet}', ['id' => $orderId, 'wallet' => $walletBalance]);
        $this->userService->updateTransaction($orderId, $status);
        $this->userService->updateBalance($orderId, $walletBalance);

        event(new BroadCastTransaction(true));
        return response('ok',200);
    }
}
