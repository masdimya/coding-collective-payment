<?php

namespace App\Jobs;

use App\Services\PaymentTransactionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class ProcessWithdraw implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $paymentService;
    protected $customerId;
    protected $amount;
    protected $orderId;
    protected $timestamp;
    public $tries = 1;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customerId, $amount, $orderId, $timestamp)
    {
        $this->paymentService = new PaymentTransactionService();
        $this->customerId = $customerId;
        $this->amount     = $amount;
        $this->orderId    = $orderId;
        $this->timestamp    = $timestamp;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $this->paymentService->withdraw($this->customerId, $this->amount);
            $this->paymentService->withdrawTranscationSuccess(
                $this->customerId,
                $this->amount,
                $this->orderId,
                $this->timestamp
            );
            $this->paymentService->notifySuccess($this->customerId, $this->orderId);
        } catch (\Throwable $th) {
            $this->paymentService->withdrawTranscationFailed(
                $this->customerId,
                $this->amount,
                $this->orderId,
                $this->timestamp
            );
            $this->paymentService->notifyFailed($this->customerId, $this->orderId);

            throw $th;
        }
        
    }

}
