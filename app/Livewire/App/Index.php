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
        $car2 = Car::where('id', 2)->get()->first();
        $car3 = Car::where('id', 3)->get()->first();
        $cars = Car::where('category_id', 1)->take(4)->get();

        return view('livewire.app.index', compact('car', 'car2', 'car3', 'cars'));
    }
}
