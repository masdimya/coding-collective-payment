<?php

namespace App\Http\Livewire;

use App\Services\UserServices;
use Livewire\Component;

class TransactionTable extends Component
{
    protected $userService;
    public $transactions;

    public function __construct() {
        $this->userService = new UserServices();
    }
    public function render()
    {
        $this->transactions = $this->userService->getTransactions();
        return view('livewire.transaction-table');
    }
}
