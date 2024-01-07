<div x-data="{
    open: false,
    showNotification: function() {
        this.open = true;
        setTimeout(() => {
            this.open = false;
        }, 3000);
    }
}">
    <section class="grid mx-3 my-20 md:grid-cols-2 md:gap-8 md:mx-40">

        <div>
            <img alt="ecommerce" class="object-cover object-center w-full border border-gray-200 rounded"
                src="{{ Storage::url($image) }}">

            <div class="flex justify-center gap-4 mt-5">
                <button wire:click="imageView('{{ $car->image }}')">
                    <img class="object-cover w-20 h-10" src="{{ Storage::url($car->image) }}" alt="">
                </button>

                <button wire:click="imageView('{{ $car->image_2 }}')">
                    <img class="object-cover w-20 h-10" src="{{ Storage::url($car->image_2) }}" alt="">
                </button>

                <button wire:click="imageView('{{ $car->image_3 }}')">
                    <img class="object-cover w-20 h-10" src="{{ Storage::url($car->image_3) }}" alt="">
                </button>

                <button wire:click="imageView('{{ $car->image_4 }}')">
                    <img class="object-cover w-20 h-10" src="{{ Storage::url($car->image_4) }}" alt="">
                </button>
            </div>
        </div>

        <div class="mt-5 md:mt-0">
            <h2 class="text-sm tracking-widest text-gray-500 title-font">{{ $car->category->name }}</h2>
            <h1 class="mb-1 text-3xl font-medium text-gray-900 title-font">{{ $car->name }}</h1>
            <div class="flex justify-end mb-4">
                {{-- <span class="flex items-center">
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                            </path>
                        </svg>
                        <span class="ml-3 text-gray-600">4 Reviews</span>
                    </span> --}}
                <span class="flex py-2 pl-3 ml-3 border-l-2 border-gray-200">
                    <a class="text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                    </a>
                    <a class="ml-2 text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-5 h-5" viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                            </path>
                        </svg>
                    </a>
                    <a class="ml-2 text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-5 h-5" viewBox="0 0 24 24">
                            <path
                                d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                            </path>
                        </svg>
                    </a>
                </span>
            </div>
            <div x-data="{ description: '{{ $car->description }}' }">
                <span class="leading-relaxed" x-html="description"></span>
            </div>
            {{-- <div class="flex items-center pb-5 mt-6 mb-5 border-b-2 border-gray-200">
                    <div class="flex">
                        <span class="mr-3">Color</span>
                        <button class="w-6 h-6 border-2 border-gray-300 rounded-full focus:outline-none"></button>
                        <button
                            class="w-6 h-6 ml-1 bg-gray-700 border-2 border-gray-300 rounded-full focus:outline-none"></button>
                        <button
                            class="w-6 h-6 ml-1 bg-red-500 border-2 border-gray-300 rounded-full focus:outline-none"></button>
                    </div>
                    <div class="flex items-center ml-6">
                        <span class="mr-3">Size</span>
                        <div class="relative">
                            <select
                                class="py-2 pl-3 pr-10 text-base border border-gray-400 rounded appearance-none focus:outline-none focus:border-red-500">
                                <option>SM</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                            </select>
                            <span
                                class="absolute top-0 right-0 flex items-center justify-center w-10 h-full text-center text-gray-600 pointer-events-none">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div> --}}
            <div class="flex mt-6">
                @if ($car->in_promotion)
                    <span class="text-2xl font-medium text-gray-900 title-font">${{ $car->promotion_price }}</span>
                @else
                    <span class="text-2xl font-medium text-gray-900 title-font">${{ $car->price }}</span>
                @endif

                <button wire:click="addToCart({{ $car->id }}, 1)" x-on:click="showNotification()"
                    class="flex px-6 py-2 ml-auto text-white bg-blue-600 border-0 rounded focus:outline-none hover:bg-blue-500">
                    <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </button>

                <button
                    class="inline-flex items-center justify-center w-10 h-10 p-0 ml-4 text-gray-500 bg-gray-200 border-0 rounded-full">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

    </section>

    <section class="container pb-10 md:mx-auto lg:mx-3">
        <div>
            <p class="mx-3 text-2xl">
                You may also like
            </p>
        </div>

        <livewire:components.items-list :cars="$other_cars" :header="false" />
    </section>

    <div x-show="open" x-transition.opacity>
        <livewire:components.toast-notification />
    </div>
</div>
