<div>
    <main class="my-8">
        <div class="container lg:px-6 mx-auto">
            <div class="h-64 overflow-hidden bg-center bg-cover rounded-md mx-2 lg:mx-0"
                style="background-image: url({{ Storage::url($car->image) }})">
                <div class="flex items-center h-full bg-gray-900 bg-opacity-50">
                    <div class="max-w-xl px-10">
                        <h2 class="text-2xl font-semibold text-white">{{ $car->name }}</h2>
                        <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                        <a href="/car/{{ $car->id }}/{{ $car->slug }}" wire:navigate>
                            <button
                                class="flex items-center px-3 py-2 mt-4 text-sm font-medium text-white uppercase bg-blue-600 rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <span>Shop Now</span>
                                <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-3 lg:mt-8 md:flex md:-mx-4 mx-2">


                <div class="w-full h-64 overflow-hidden bg-center bg-cover rounded-md md:mx-4 md:w-1/2"
                    style="background-image: url({{ Storage::url($car2->image) }})">
                    <div class="flex items-center h-full bg-gray-900 bg-opacity-50">
                        <div class="max-w-xl px-10">
                            <h2 class="text-2xl font-semibold text-white">{{ $car2->name }}</h2>
                            <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                            <a href="/car/{{ $car2->id }}/{{ $car2->slug }}" wire:navigate>
                                <button
                                    class="flex items-center mt-4 text-sm font-medium text-white uppercase rounded hover:underline focus:outline-none">
                                    <span>Shop Now</span>
                                    <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="w-full h-64 overflow-hidden bg-center bg-cover rounded-md md:mx-4 md:w-1/2 mt-3 lg:mt-0"
                    style="background-image: url({{ Storage::url($car3->image) }})">
                    <div class="flex items-center h-full bg-gray-900 bg-opacity-50">
                        <div class="max-w-xl px-10">
                            <h2 class="text-2xl font-semibold text-white">{{ $car3->name }}</h2>
                            <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                            <a href="/car/{{ $car3->id }}/{{ $car3->slug }}" wire:navigate>
                                <button
                                    class="flex items-center mt-4 text-sm font-medium text-white uppercase rounded hover:underline focus:outline-none">
                                    <span>Shop Now</span>
                                    <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>


            </div>

            <livewire:components.items-list :cars="$cars" :header="true" />

        </div>
    </main>
</div>
