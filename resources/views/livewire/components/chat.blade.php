<div x-data="{ open: false }">
    <div class="fixed bottom-0 right-2">
        <div class="w-72">
            <div class="flex justify-between border rounded-t-xl bg-blue-500 px-3 py-1">
                <p>Contact Us</p>

                <p @click="open = !open">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                    </svg>
                </p>
            </div>

            <div x-show="open" class="h-96 w-72 border bg-white">
                <div>
                    <form>
                        <div class="w-full px-1 flex flex-col justify-between">
                            <div class="flex flex-col mt-5">
                                {{-- Client --}}
                                <div class="flex justify-end mb-4">
                                    <div
                                        class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                                        Welcome to group everyone !
                                    </div>
                                </div>

                                {{-- Admin --}}
                                <div class="flex justify-start mb-4">
                                    <div
                                        class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                                        Lorem ipsum dolor sit amet
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fixed bottom-2">
                            <hr class="mb-1">

                            <input class="w-full bg-gray-300 py-2 rounded-xl" type="text"
                                placeholder="send your message" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
