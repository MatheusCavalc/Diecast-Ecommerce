<?php

use function Livewire\Volt\{state};

state([
    'user' => auth()->user(),
]);

?>

<div x-data="{ open: false }">
    <div class="mt-1.5">
        <button @click="open = !open" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
        </button>
    </div>

    <div x-show="open" x-on:mouseover="open = true" x-on:mouseleave="open = false"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-40 mt-2 md:mt-0 mr-2 right-0 font-normal bg-white rounded-lg shadow" id="dropdown-user">

        <div class="py-3">
            @auth
                <div class="px-4 pt-2 pb-1" role="none">
                    <p class="text-gray-900 dark:text-white" role="none">
                        {{ $user->name }}
                    </p>
                    <p class="font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                        {{ $user->email }}
                    </p>
                </div>
                <ul class="py-1" role="none">
                    <li>
                        <a href="/my-orders" wire:navigate
                            class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                            role="menuitem">My Orders</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="cursor-pointer">
                            @csrf

                            <a :href="route('logout')"
                                class="block px-4 py-1 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white""
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Log Out
                            </a>
                        </form>
                    </li>
                </ul>
            @else
                <ul class="py-1" role="none">
                    <li>
                        <a href="{{ route('login') }}"
                            class="block px-4 py-1 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                            role="menuitem">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"
                            class="block px-4 py-1 text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                            role="menuitem">Register</a>
                    </li>
                </ul>
            @endauth
        </div>

    </div>
</div>
