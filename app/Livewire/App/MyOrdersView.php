<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class MyOrdersView extends Component
{
    #[Title('Home')]
    #[Layout('layouts.main')]
    public function render()
    {
        $orders = auth()->user()->my_orders;

        return view('livewire.app.my-orders-view', compact('orders'));
    }
}
