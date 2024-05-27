<?php

namespace App\Http\Livewire;

use App\Services\PaymentService;
use App\Services\UserServices;
use Livewire\Component;

class Form extends Component
{
    public $amount;
    protected $userService;
    protected $paymentService;

    public function __construct(){
        $this->userService = new UserServices();
        $this->paymentService = new PaymentService();

        $this->amount = 0;
    }
    public function render()
    {
        return view('livewire.form');
    }

    public function withdrawAction(){
        $user   = $this->userService->getUserInfo();
        $amount = $this->amount;
        $orderId = $this->userService->generateWithdrawOrderId();
        $timestamp = now()->format('Y-m-d H:i:s');
        
        try {
            $this->paymentService->paymentWithdraw($orderId, $amount, $timestamp);
            $this->userService->createWithdrawProcess(
                $user->id,
                $orderId,
                $amount
            );
            $this->emit('updateTransaction');

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function depositAction(){
        
    }
}
