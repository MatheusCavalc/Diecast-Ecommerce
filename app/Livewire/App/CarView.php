<?php

namespace App\Livewire\App;

use App\Models\Car;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CarView extends Component
{
    public Car $car;

    public function mount($id, $slug)
    {
        $this->car = Car::findOrFail($id);
    }

    public function addToCart(Car $sneaker, $quantity)
    {
        $cart = session()->get('cart');

        if (!$cart) {
            $price = $sneaker->in_promotion == true ? $sneaker->promotion_price : $sneaker->price;
            $cart = [
                $sneaker->id => [
                    'id' => $sneaker->id,
                    'name' => $sneaker->name,
                    'image' => $sneaker->image,
                    'quantity' => $quantity,
                    'price' => $price,
                    'total_price' => (float) $price * $quantity,
                ],
            ];

            session()->put('cart', $cart);
        }

        if (isset($cart)) {
            $price = $sneaker->in_promotion == true ? $sneaker->promotion_price : $sneaker->price;
            $cart[$sneaker->id] = [
                'id' => $sneaker->id,
                'name' => $sneaker->name,
                'image' => $sneaker->image,
                'quantity' => $quantity,
                'price' => $price,
                'total_price' => (float) $price * $quantity,
            ];

            session()->put('cart', $cart);
        }

        $this->dispatch('cart-updated');
    }

    #[Title('Car')]
    #[Layout('layouts.main')]
    public function render()
    {
        $other_cars = Car::where('id', '!=', $this->car->id)->take(4)->get();

        return view('livewire.app.car-view', compact('other_cars'));
    }
}
