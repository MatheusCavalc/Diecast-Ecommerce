<?php

namespace App\Livewire\App;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class OrderDetailsView extends Component
{
    public Order $order;

    public function mount($id)
    {
        $this->order = Order::findOrFail($id);
    }

    #[Title('Home')]
    #[Layout('layouts.main')]
    public function render()
    {
        return view('livewire.app.order-details-view');
    }
}
