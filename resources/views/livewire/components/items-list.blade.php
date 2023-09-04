<?php

use function Livewire\Volt\{state};
use Livewire\Volt\Component;
use App\Models\Car;

state('cars');

$addToCart = function (Car $sneaker, $quantity) {
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
};

?>

<div x-data="{
    open: false,
    showNotification: function() {
        this.open = true;
        setTimeout(() => {
            this.open = false;
        }, 3000);
    }
}">
    <div class="mt-16">
        <h3 class="text-gray-600 text-2xl font-medium">{{ $cars[0]->category->name }}</h3>
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">

            @foreach ($cars as $car)
                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-full bg-cover bg-center"
                        style="background-image: url({{ Storage::url($car->image) }})">
                        <button wire:click="addToCart({{ $car->id }}, 1)" x-on:click="showNotification()"
                            class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <a href="/car/{{ $car->id }}/{{ $car->slug }}" wire:navigate>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">{{ $car->name }}</h3>
                            <span class="text-gray-500 mt-2">${{ $car->price }}</span>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>

    <div x-show="open" x-on:cart-updated="showNotification()">
        <livewire:components.toast-notification />
    </div>
</div>
