<?php

use function Livewire\Volt\{state};

//

?>

<div>
    <div x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90" class="fixed bottom-4 left-4">

        <div
            class="flex items-center w-full max-w-xs p-4 space-x-4 bg-white divide-x divide-black rounded-lg shadow-xl space-x text-black">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
            <div class="pl-4 text-sm font-bold">
                Product add to cart
            </div>
        </div>

    </div>
</div>
