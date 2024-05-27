<?php

namespace App\Http\Livewire;

use App\Services\UserServices;
use Livewire\Component;

class Balance extends Component
{
    protected $userService;
    public $local;
    public $wallet;
    protected $listeners = ['updateBalance' => 'getBalance'];

    public function __construct() {
        $this->userService = new UserServices();
        $this->getBalance();
    }

    public function render()
    {
        return view('livewire.balance');
    }

    public function getBalance(){
        $getBalance = $this->userService->getBalance();
        $this->local = $getBalance->balance;
        $this->wallet = $getBalance->balance_wallet;
    }

}
