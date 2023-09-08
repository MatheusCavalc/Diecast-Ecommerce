<?php

use function Livewire\Volt\{state, computed};
use App\Models\Car;

state(['search', 'results']);

$searchSneakers = function () {
    return $this->redirect('/search/car' . '/' . $this->search, true);
};

$searchLive = function () {
    if (strlen($this->search) >= 1) {
        $this->results = Car::where('name', 'LIKE', "%{$this->search}%")
            ->limit(3)
            ->get();
    }
};

?>

<div>
    <div>
        <input wire:model.live.debounce.500ms='search' wire:keyup="searchLive" wire:keydown.enter="searchSneakers"
            class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
            type="text" placeholder="Search">
    </div>

    @if ($results)
        @if (sizeof($results) > 0)
            <div x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="absolute z-50 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-80 md:w-full pl-3 mt-2 dark:bg-gray-700 dark:divide-gray-600">

                @foreach ($this->results as $sneaker)
                    <div class="p-2 text-sm">
                        <a href="/car/{{ $sneaker->id }}/{{ $sneaker->slug }}" wire:navigate>
                            {{ $sneaker->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    @endif
</div>
