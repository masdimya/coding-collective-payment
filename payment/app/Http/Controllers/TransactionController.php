<?php

namespace App\Http\Controllers;

use App\Services\PaymentTransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $paymentService;
    public function __construct() {
        $this->paymentService = new PaymentTransactionService();
    }
    public function withdrawBalance(Request $request){
    }

    public function depositBalance(Request $request){
            $customer = $request->attributes->get('customer');
            $amount   = $request->amount;
            $category = 'deposit';
            $orderId  = '11111';

            $this->paymentService->deposit($customer->id, $amount);
            $this->paymentService->createTransaction(
                $customer->id,
                $amount,
                $category,
                $orderId,
            );

        
    }
}
