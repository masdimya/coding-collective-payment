<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
class Broadcast extends Component
{
    public function render()
    {        
        $key = 'transaction';
        $event = Cache::get($key);
        if ($event) {
            Cache::forget($key);
            $this->emit('updateBalance');
            $this->emit('updateTransaction');

        }
        return view('livewire.broadcast');
    }
}
