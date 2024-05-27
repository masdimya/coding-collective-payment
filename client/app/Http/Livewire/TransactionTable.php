<?php

namespace App\Http\Livewire;

use App\Services\UserServices;
use Livewire\Component;

class TransactionTable extends Component
{
    protected $userService;
    public $transactions;
    protected $listeners = ['updateTransaction' => 'getTransactions'];


    public function __construct() {
        $this->userService = new UserServices();
        $this->getTransactions();
    }

    public function render()
    {
        return view('livewire.transaction-table');
    }

    public function getTransactions(){
        $this->transactions = $this->userService->getTransactions();
    }
}
