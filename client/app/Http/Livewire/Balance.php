<?php

namespace App\Http\Livewire;

use App\Services\UserServices;
use Livewire\Component;

class Balance extends Component
{
    protected $userService;
    public $local;
    public $wallet;

    public function __construct() {
        $this->userService = new UserServices();
    }
    public function render()
    {
        $getBalance = $this->userService->getBalance();
        $this->local = $getBalance->balance;
        $this->wallet = $getBalance->balance_wallet;

        return view('livewire.balance');
    }
}
