<?php

namespace App\Livewire\App;

use App\Models\Car;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Livewire\Component;

class ShopView extends Component
{
    use WithPagination;

    #[Title('Home')]
    #[Layout('layouts.main')]
    public function render()
    {
        return view('livewire.app.shop-view', [
            'cars' => Car::paginate(4)
        ]);
    }
}
