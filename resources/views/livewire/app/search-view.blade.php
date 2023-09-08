<div>
    <div class="flex justify-start my-4 mx-3 md:mx-40">
        <p class="text-2xl md:text-3xl">Search: {{$search}}</p>
    </div>

    <div class="grid md:grid-cols-2 md:gap-4 mx-3 md:mx-40">

        @foreach ($cars as $car)
            <div class="w-full rounded-md shadow-md overflow-hidden relative mb-4 md:mb-0">
                <a href="/car/{{ $car->id }}/{{ $car->slug }}" wire:navigate>
                    <div class="flex items-end justify-end h-56 w-full bg-cover bg-center"
                        style="background-image: url({{ Storage::url($car->image) }})">
                    </div>

                    <div class="px-5 py-3">
                        <h3 class="text-gray-700 uppercase">{{ $car->name }}</h3>
                        <span class="text-gray-500 mt-2">${{ $car->price }}</span>
                    </div>
                </a>

                <div class="absolute bottom-14 right-0">
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
            </div>
        @endforeach


    </div>
</div>
