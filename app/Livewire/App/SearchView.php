<?php

namespace App\Livewire\App;

use App\Models\Car;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Livewire\Component;

class SearchView extends Component
{
    use WithPagination;

    public $search = '';

    public $cars = '';

    public function mount($search)
    {
        $this->search = $search;

        $this->cars = Car::query()
            ->where('name', 'LIKE', "%{$this->search}%")
            ->get();
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

    #[Layout('layouts.main')]
    #[Title('Home')]
    public function render()
    {
        return view('livewire.app.search-view');
    }
}
