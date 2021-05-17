<div>
    <div
        x-show="show"
        x-cloak
        class="fixed inset-0 flex z-40 lg:hidden"
        role="dialog"
        aria-modal="true"
    >
        <div
            x-show="show"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-600 bg-opacity-75"
            aria-hidden="true"
        ></div>

        <div
            x-show="show"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white"
        >
            <div
                x-show="show"
                x-transition:enter="ease-in-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in-out duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute top-0 right-0 -mr-12 pt-2"
            >
                <button
                    x-on:click="show = false"
                    class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                >
                    <span class="sr-only">Close sidebar</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-shrink-0 flex items-center px-4">
                Bladebook
            </div>
            <div class="mt-5 flex-1 h-0 overflow-y-auto">
                <nav class="px-2 space-y-1">
                    @foreach($elements as $category => $categoryItems)
                        <a href="{{ $categoryItems['route'] }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            {{ $category }}
                        </a>
                    @endforeach
                </nav>
            </div>
        </div>

        <div class="flex-shrink-0 w-14" aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden lg:flex lg:flex-shrink-0 h-full">
        <div class="flex flex-col w-64">
            <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 pb-4 bg-white overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-4 font-bold text-2xl text-pink-600">
                    <svg class="h-10 w-10 mr-4" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 128 128" viewBox="0 0 128 128" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M18,117.7c0,4.2,3,8.3,7.2,8.3H106c4.2,0,8-4.1,8-8.3V8.8c0-4.2-3.8-6.8-8-6.8H25.2C21,2,18,4.7,18,8.8    V117.7z" fill="#DB2777"></path>
                            <path d="M25.5,11.5c0,0.3-0.2,0.5-0.5,0.5h-3.5c0.2,1,1.7,2.6,3.5,2.6c1.9,0,3.5-1.8,3.5-3.7    c0-1.9-1.6-3.6-3.5-3.6c-0.5,0-1.1,0.1-1.6,0.3c-0.2,0.1-0.3,0.4-0.5,0.3L21.3,11H25C25.2,11,25.5,11.2,25.5,11.5z" fill="#F0C960"></path>
                            <path d="M25.5,24.5c0,0.3-0.2,0.5-0.5,0.5h-3.5c0.2,1,1.7,2.6,3.5,2.6c1.9,0,3.5-1.8,3.5-3.7    c0-1.9-1.6-3.6-3.5-3.6c-0.5,0-1.1,0.1-1.6,0.3c-0.2,0.1-0.3,0.5-0.5,0.4L21.3,24H25C25.2,24,25.5,24.2,25.5,24.5z" fill="#F0C960"></path>
                            <path d="M25.5,37.5c0,0.3-0.2,0.5-0.5,0.5h-3.5c0.2,1,1.7,2.6,3.5,2.6c1.9,0,3.5-1.8,3.5-3.7    c0-1.9-1.6-3.6-3.5-3.6c-0.5,0-1.1,0.1-1.6,0.3c-0.2,0.1-0.3,0.4-0.5,0.3l-1.7,3H25C25.2,37,25.5,37.2,25.5,37.5z" fill="#F0C960"></path>
                            <path d="M25.5,50.5c0,0.3-0.2,0.5-0.5,0.5h-3.5c0.2,1,1.7,2.6,3.5,2.6c1.9,0,3.5-1.8,3.5-3.7    c0-1.9-1.6-3.6-3.5-3.6c-0.5,0-1.1,0.1-1.6,0.3c-0.2,0.1-0.3,0.4-0.5,0.3L21.3,50H25C25.2,50,25.5,50.2,25.5,50.5z" fill="#F0C960"></path>
                            <path d="M25.5,63.5c0,0.3-0.2,0.5-0.5,0.5h-3.5c0.2,1,1.7,2.7,3.5,2.7c1.9,0,3.5-1.8,3.5-3.7s-1.6-3.6-3.5-3.6    c-0.5,0-1.1,0.1-1.6,0.3c-0.2,0.1-0.3,0.4-0.5,0.3l-1.7,3H25C25.2,63,25.5,63.2,25.5,63.5z" fill="#F0C960"></path>
                            <path d="M25.5,76.5c0,0.3-0.2,0.5-0.5,0.5h-3.5c0.2,1,1.7,2.6,3.5,2.6c1.9,0,3.5-1.8,3.5-3.7    c0-1.9-1.6-3.6-3.5-3.6c-0.5,0-1.1,0.1-1.6,0.3c-0.2,0.1-0.3,0.4-0.5,0.3l-1.7,3H25C25.2,76,25.5,76.2,25.5,76.5z" fill="#F0C960"></path>
                            <path d="M25.5,89.5c0,0.3-0.2,0.5-0.5,0.5h-3.5c0.2,1,1.7,2.7,3.5,2.7c1.9,0,3.5-1.8,3.5-3.7    c0-1.9-1.6-3.6-3.5-3.6c-0.5,0-1.1,0.1-1.6,0.3c-0.2,0.1-0.3,0.4-0.5,0.3l-1.7,3H25C25.2,89,25.5,89.2,25.5,89.5z" fill="#F0C960"></path>
                            <path d="M25.5,102.5c0,0.3-0.2,0.5-0.5,0.5h-3.5c0.2,1,1.7,2.6,3.5,2.6c1.9,0,3.5-1.8,3.5-3.7s-1.6-3.6-3.5-3.6    c-0.5,0-1.1,0.1-1.6,0.3c-0.2,0.1-0.3,0.4-0.5,0.3l-1.7,3H25C25.2,102,25.5,102.2,25.5,102.5z" fill="#F0C960"></path>
                            <path d="M25.5,115.5c0,0.3-0.2,0.5-0.5,0.5h-3.5c0.2,1,1.7,2.6,3.5,2.6c1.9,0,3.5-1.8,3.5-3.7    c0-1.9-1.6-3.6-3.5-3.6c-0.5,0-1.1,0.1-1.6,0.3c-0.2,0.1-0.3,0.4-0.5,0.3l-1.7,3.1H25C25.2,115,25.5,115.2,25.5,115.5z" fill="#F0C960"></path>
                            <path d="M56.9,81.8c-0.1-0.1-0.1-0.3-0.1-0.4c0.3-1.1,0.7-2.4,1.1-3.6c0.4-1.2,0.7-1.8,1-2.7c0.1-0.2,0.3,0,0.5,0    h18c0.2,0,0.4-0.2,0.5,0l2.1,6.5c0,0.2,0,0.3-0.1,0.4S79.6,82,79.5,82H76v7h18v-7h-4c-0.2,0-0.4,0.2-0.5,0L75.2,40H62.8L47.9,82    c-0.1,0.2-0.3,0-0.5,0H44v7h18v-7h-4.7C57.2,82,57,81.9,56.9,81.8z M61.3,67.7l1.3-4.1c0.5-1.5,1-3,1.5-4.6c0.5-1.6,1-3.1,1.5-4.6    c0.5-1.5,0.9-2.9,1.3-4.1L68,47c0.1-0.2,0.3,0,0.5,0h0.2c0.2,0,0.4-0.3,0.5,0c0.2,0.7,0.4,1.1,0.6,1.7c0.2,0.6,0.4,1.2,0.5,1.8    l5.4,17.2c0.1,0.1,0.1,0.1,0.1,0.2c0,0.3-0.2,0.8-0.5,0.8c0,0,0,0.3,0,0.3H61.7c-0.2,0-0.3-0.4-0.4-0.5    C61.2,68.3,61.2,67.9,61.3,67.7z" fill="#FFF"></path>
                        </g>
                        <g>
                            <path d="M114.5,118.5c0,4.4-3.6,8-8,8H25.5c-4.4,0-8-3.6-8-8V10.5c0-4.4,3.6-8,8-8h80.9c4.4,0,8,3.6,8,8V118.5z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                            <g>
                                <path d="M23.2,7.1c0.5-0.3,1.1-0.4,1.8-0.4c2.2,0,4,1.8,4,4c0,2.2-1.8,4-4,4c-2.2,0-4-1.8-4-4" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                <line fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="25" x2="14" y1="11.5" y2="11.5"></line>
                            </g>
                            <g>
                                <path d="     M23.2,20.1c0.5-0.3,1.1-0.4,1.8-0.4c2.2,0,4,1.8,4,4c0,2.2-1.8,4-4,4c-2.2,0-4-1.8-4-4" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                <line fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="25" x2="14" y1="24.5" y2="24.5"></line>
                            </g>
                            <g>
                                <path d="     M23.2,33.1c0.5-0.3,1.1-0.4,1.8-0.4c2.2,0,4,1.8,4,4s-1.8,4-4,4c-2.2,0-4-1.8-4-4" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                <line fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="25" x2="14" y1="37.5" y2="37.5"></line>
                            </g>
                            <g>
                                <path d="     M23.2,46.1c0.5-0.3,1.1-0.4,1.8-0.4c2.2,0,4,1.8,4,4c0,2.2-1.8,4-4,4c-2.2,0-4-1.8-4-4" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                <line fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="25" x2="14" y1="50.5" y2="50.5"></line>
                            </g>
                            <g>
                                <path d="     M23.2,59.2c0.5-0.3,1.1-0.4,1.8-0.4c2.2,0,4,1.8,4,4c0,2.2-1.8,4-4,4c-2.2,0-4-1.8-4-4" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                <line fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="25" x2="14" y1="63.5" y2="63.5"></line>
                            </g>
                            <g>
                                <path d="     M23.2,72.1c0.5-0.3,1.1-0.4,1.8-0.4c2.2,0,4,1.8,4,4c0,2.2-1.8,4-4,4c-2.2,0-4-1.8-4-4" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                <line fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="25" x2="14" y1="76.5" y2="76.5"></line>
                            </g>
                            <g>
                                <path d="     M23.2,85.2c0.5-0.3,1.1-0.4,1.8-0.4c2.2,0,4,1.8,4,4c0,2.2-1.8,4-4,4c-2.2,0-4-1.8-4-4" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                <line fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="25" x2="14" y1="89.5" y2="89.5"></line>
                            </g>
                            <g>
                                <path d="     M23.2,98.2c0.5-0.3,1.1-0.4,1.8-0.4c2.2,0,4,1.8,4,4c0,2.2-1.8,4-4,4c-2.2,0-4-1.8-4-4" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                <line fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="25" x2="14" y1="102.5" y2="102.5"></line>
                            </g>
                            <g>
                                <path d="     M23.2,111.1c0.5-0.3,1.1-0.4,1.8-0.4c2.2,0,4,1.8,4,4c0,2.2-1.8,4-4,4c-2.2,0-4-1.8-4-4" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                <line fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="25" x2="14" y1="115.5" y2="115.5"></line>
                            </g>
                            <path d="    M62.4,39.5l-15,42h-3.9v8h19v-8h-5.2c0.3-1,0.7-2,1.1-3.3c0.4-1.2,0.7-1.7,1-2.7h18l2.1,6h-4v8h19v-8H90l-14.5-42H62.4z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                            <path d="    M63.1,64.1c0.5-1.5,1-3.2,1.5-4.7c0.5-1.6,1-3.2,1.5-4.7c0.5-1.5,0.9-2.5,1.3-3.7l1.2-3.5h0.2c0.2,0,0.4,0.9,0.6,1.5    c0.2,0.6,0.4,1.3,0.5,2l5.5,17.5H61.7C62.1,67.5,62.6,65.6,63.1,64.1z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                        </g>
                    </g>
                </svg>
                    Bladebook
                </div>
                <div class="mt-5 flex-grow flex flex-col">
                    <nav class="flex-1 px-2 space-y-1 bg-white" aria-label="Sidebar">
                        <div class="border-b border-gray-200 pt-0 mb-2 pb-3 px-1">
                            <label for="book" class="block text-sm font-medium text-gray-700">Project</label>
                            <select
                                wire:model="book"
                                id="book"
                                name="book"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                            >
                                @foreach(config('bladebook.books') as $book)
                                    <option value="{{ $book['name'] }}">{{ $book['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        @foreach($elements as $category => $categoryItems)
                            <div class="space-y-1" x-data="{ expanded: false }">
                                <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                                <button
                                    x-on:click="expanded = ! expanded"
                                    type="button"
                                    class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    aria-controls="sub-menu-{{ $category }}"
                                    :aria-expanded="expanded"
                                >
                                    <span class="flex-1">{{ $category }}</span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        :class="[expanded ? 'text-gray-400 rotate-90' : 'text-gray-300']"
                                        class="ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                                <div
                                    x-show="expanded"
                                    x-cloak
                                    class="space-y-1"
                                    id="sub-menu-{{ $category }}"
                                >
                                    @foreach($categoryItems['items'] as $categoryItem)
                                        <a href="{{ $categoryItem['route'] }}" class="group w-full flex items-center pl-11 pr-2 py-2 text-sm text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            {{ $categoryItem['name'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

