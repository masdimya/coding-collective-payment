<?php

namespace App\Http\Controllers;

use App\Exceptions\PaymentHttpException;
use App\Jobs\ProcessWithdraw;
use App\Jobs\ProcessDeposit;
use App\Services\PaymentTransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $paymentService;
    public function __construct() {
        $this->paymentService = new PaymentTransactionService();
    }
    public function withdrawBalance(Request $request){
        try {
            $customer = $request->attributes->get('customer');
            $amount   = $request->amount;
            $orderId  = $request->order_id;

            ProcessWithdraw::dispatch($customer->id, $amount, $orderId );

            return response()->json([
                'order_id' => $orderId,
                'amount'   => $amount,
                'status'   => 1,
            ]);
            
        } catch (\Throwable $th) {
            throw new PaymentHttpException($th, $orderId, $amount);
        }
        
    }

    public function depositBalance(Request $request){
        try {
            $customer = $request->attributes->get('customer');
            $amount   = $request->amount;
            $orderId  = $request->order_id;

            ProcessDeposit::dispatch($customer->id, $amount, $orderId );

            return response()->json([
                'order_id' => $orderId,
                'amount'   => $amount,
                'status'   => 1,
            ]);
            
        } catch (\Throwable $th) {
            throw new PaymentHttpException($th, $orderId, $amount);
        }
    }
}
