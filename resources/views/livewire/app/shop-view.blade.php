<div x-data="{
    open: false,
    showNotification: function() {
        this.open = true;
        setTimeout(() => {
            this.open = false;
        }, 3000);
    }
}">
    <div class="flex justify-center my-4">
        <p class="text-2xl md:text-3xl">Cars</p>
    </div>

    <div class="grid mx-3 md:grid-cols-2 md:gap-4 md:mx-40">

        @foreach ($cars as $car)
            <div class="relative w-full mb-4 overflow-hidden rounded-md shadow-md md:mb-0">
                <a href="/car/{{ $car->id }}/{{ $car->slug }}" wire:navigate>
                    <div class="flex items-end justify-end w-full h-56 bg-center bg-cover"
                        style="background-image: url({{ Storage::url($car->image) }})">
                    </div>

                    <div class="px-5 py-3">
                        <h3 class="text-gray-700 uppercase">{{ $car->name }}</h3>
                        <span class="mt-2 text-gray-500">${{ $car->price }}</span>
                    </div>
                </a>

                <div class="absolute right-0 bottom-14">
                    <button wire:click="addToCart({{ $car->id }}, 1)" x-on:click="showNotification()"
                        class="p-2 mx-5 -mb-4 text-white bg-blue-600 rounded-full hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
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

    <div class="mx-3 mt-20 mb-14 md:mb-32 md:mx-40">
        {{ $cars->links() }}
    </div>

    <div x-show="open" x-transition.opacity>
        <livewire:components.toast-notification />
    </div>
</div>
