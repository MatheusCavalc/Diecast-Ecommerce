<?php

namespace App\Livewire\App;

use App\Models\Car;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Index extends Component
{
    #[Title('Home')]
    #[Layout('layouts.main')]
    public function render()
    {
        $car = Car::all()->first();

        return view('livewire.app.index', compact('car'));
    }
}
