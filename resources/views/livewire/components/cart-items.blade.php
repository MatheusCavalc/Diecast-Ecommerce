<?php

use function Livewire\Volt\{state, on};

state([
    'cart' => json_decode(json_encode(session()->get('cart')), false),
]);

on(['cart-updated' => function () {
    $this->cart = json_decode(json_encode(session()->get('cart')), false);
}]);

$removeItem = function ($sneaker_id)
{
    $cart = session()->get('cart');

    if (isset($cart[$sneaker_id])) {
        unset($cart[$sneaker_id]);
        session()->put('cart', $cart);

        $this->dispatch('cart-updated');
    }
}

?>

<div>
    @if ($cart)
        @foreach ($cart as $item)
            <div wire:key="{{ $item->id }}" class="flex justify-between mt-6">
                <div class="flex">
                    <img class="h-20 w-20 object-cover rounded border border-black" src="{{ Storage::url($item->image) }}"
                        alt="">
                    <div class="mx-3">
                        <h3 class="text-sm text-gray-600">{{ $item->name }}</h3>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600">{{ $item->price }}$</p>

                    <div class="mt-7">
                        <p wire:click='removeItem({{$item->id}})' class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-8">
            <form class="flex items-center justify-center">
                <input class="form-input w-48" type="text" placeholder="Add promocode">
                <button
                    class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    <span>Apply</span>
                </button>
            </form>
        </div>
        <a
            class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
            <span>Chechout</span>
            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    @else
        <div>
            <p>Cart Empty</p>
        </div>
    @endif
</div>
