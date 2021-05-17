<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bladebook</title>

    <link href="{{ asset(mix('fabrick.css', 'vendor/fabrick')) }}" rel="stylesheet">
    @livewireStyles
    <script src="{{ asset(mix('fabrick.js', 'vendor/fabrick')) }}" defer></script>
</head>
<body>

@inject('items', 'Tonning\Bladebook\Services\SidebarNavService')

<div
    x-data="{ show: false }"
    class="h-screen flex overflow-hidden bg-gray-100"
>
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
                    @foreach($items->group() as $category => $categoryItems)
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
    <div class="hidden lg:flex lg:flex-shrink-0">
        <div class="flex flex-col w-64">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <!-- This example requires Tailwind CSS v2.0+ -->
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
{{--                    <svg--}}
{{--                        class="h-10 w-10 mr-4"--}}
{{--                        xmlns="http://www.w3.org/2000/svg"--}}
{{--                        viewBox="0 0 64 64"--}}
{{--                    >--}}
{{--                        <g>--}}
{{--                            <path d="M56.066,34.459L40.511,50.015c0,0-1.132,1.132-2.829,2.829l-9.899,9.898c-2.829,2.829-5.657,0-5.657,0   L2.327,42.943c-2.829-2.828,0-5.656,0-5.656L30.611,9.002c0,0,2.829-2.828,5.657,0l19.799,19.799   C56.066,28.801,58.896,31.63,56.066,34.459z" fill="#AEAEAE"></path>--}}
{{--                        </g>--}}
{{--                        <g>--}}
{{--                            <path d="M39.803,18.195c0,0,0.707-0.707,1.414,0l5.658,5.656c0,0,0.707,0.707,0,1.414S36.268,35.873,36.268,35.873   s-0.707,0.707-1.414,0l-5.657-5.658c0,0-0.707-0.707,0-1.414L39.803,18.195z" fill="#707070"></path>--}}
{{--                        </g>--}}
{{--                        <g>--}}
{{--                            <path d="M47.582,25.973c0,0,0.707-0.707,1.414,0l4.949,4.95c0,0,0.707,0.707,0,1.414S43.339,42.943,43.339,42.943   s-0.707,0.707-1.414,0l-4.95-4.949c0,0-0.707-0.707,0-1.414L47.582,25.973z" fill="#707070"></path>--}}
{{--                        </g>--}}
{{--                        <g>--}}
{{--                            <path d="M32.732,11.124c0,0,0.707-0.707,1.414,0l4.949,4.95c0,0,0.707,0.707,0,1.414S28.49,28.094,28.49,28.094   s-0.707,0.707-1.414,0l-4.95-4.949c0,0-0.707-0.707,0-1.414L32.732,11.124z" fill="#707070"></path>--}}
{{--                        </g>--}}
{{--                        <g>--}}
{{--                            <path d="M40.51,17.488L40.51,17.488l5.657,5.657L35.581,33.732c-0.007,0.005-0.015,0.011-0.022,0.017l-5.635-5.635   c-0.005-0.006-0.011-0.015-0.017-0.023L40.51,17.488 M40.536,16.467c-0.419,0-0.733,0.314-0.733,0.314L29.197,27.387   c-0.707,0.707,0,1.414,0,1.414l5.657,5.657c0.236,0.236,0.472,0.314,0.682,0.314c0.418,0,0.732-0.313,0.732-0.313   s9.9-9.9,10.607-10.607s-0.001-1.414-0.001-1.414l-5.657-5.656C40.981,16.545,40.745,16.467,40.536,16.467L40.536,16.467z" fill="#3D3C3E"></path>--}}
{{--                        </g>--}}
{{--                        <g>--}}
{{--                            <path d="M48.289,25.266L48.289,25.266l4.93,4.93c0.005,0.006,0.012,0.014,0.017,0.023L42.652,40.803   c-0.007,0.006-0.015,0.012-0.022,0.018l-4.929-4.927c-0.005-0.007-0.012-0.015-0.017-0.022L48.289,25.266 M48.315,24.244   c-0.419,0-0.733,0.314-0.733,0.314L36.975,35.166c-0.707,0.707,0,1.414,0,1.414l4.95,4.949c0.235,0.235,0.472,0.314,0.681,0.314   c0.419,0,0.733-0.314,0.733-0.314s9.899-9.899,10.606-10.606s0-1.414,0-1.414l-4.949-4.95   C48.761,24.323,48.524,24.244,48.315,24.244L48.315,24.244z" fill="#3D3C3E"></path>--}}
{{--                        </g>--}}
{{--                        <g>--}}
{{--                            <path d="M33.439,10.417L33.439,10.417l4.93,4.93c0.005,0.006,0.012,0.014,0.017,0.023L27.803,25.953   c-0.006,0.005-0.015,0.012-0.022,0.017l-4.928-4.926c-0.005-0.006-0.011-0.014-0.017-0.023L33.439,10.417 M33.466,9.396   c-0.419,0-0.733,0.314-0.733,0.314L22.126,20.316c-0.707,0.707,0,1.414,0,1.414l4.95,4.949c0.236,0.236,0.471,0.314,0.681,0.314   c0.419,0,0.733-0.314,0.733-0.314s9.899-9.898,10.606-10.605s0-1.414,0-1.414l-4.949-4.95C33.91,9.474,33.676,9.396,33.466,9.396   L33.466,9.396z" fill="#3D3C3E"></path>--}}
{{--                        </g>--}}
{{--                        <path d="M39.097,21.73c0,0,1.414-1.414,2.828,0s0,2.828,0,2.828l-4.95,4.95c0,0-1.414,1.414-2.828,0s0-2.828,0-2.828  L39.097,21.73z" fill="#3D3C3E"></path>--}}
{{--                        <g>--}}
{{--                            <polygon fill="#707070" points="41.924,16.074 48.996,23.145 51.117,21.023 53.945,13.952 50.41,10.417 44.753,13.245  "></polygon>--}}
{{--                        </g>--}}
{{--                        <g>--}}
{{--                            <polygon fill="#707070" points="63,5.242 60.172,2.414 50.41,11.831 53.238,14.659  "></polygon>--}}
{{--                        </g>--}}
{{--                        <path d="M46.521,15.721c0.195-0.195,0.195-0.512,0-0.707l-2.122-2.122c-0.195-0.195-0.512-0.195-0.707,0l0,0  c-0.195,0.195-0.195,0.512,0,0.707l2.122,2.122C46.01,15.916,46.326,15.916,46.521,15.721L46.521,15.721z" fill="#3D3C3E"></path>--}}
{{--                        <path d="M50.764,19.963c0.195-0.195,0.195-0.512,0-0.707l-2.121-2.121c-0.195-0.195-0.512-0.195-0.707,0l0,0  c-0.195,0.195-0.195,0.512,0,0.707l2.121,2.121C50.252,20.158,50.568,20.158,50.764,19.963L50.764,19.963z" fill="#3D3C3E"></path>--}}
{{--                        <path d="M51.471,17.842c0.195-0.196,0.195-0.512,0-0.707l-1.414-1.414c-0.195-0.195-0.512-0.196-0.707,0l0,0  c-0.195,0.195-0.195,0.512,0,0.707l1.414,1.414C50.959,18.037,51.275,18.037,51.471,17.842L51.471,17.842z" fill="#3D3C3E"></path>--}}
{{--                        <path d="M52.178,15.72c0.195-0.195,0.195-0.512,0-0.707l-0.707-0.707c-0.195-0.195-0.512-0.195-0.707,0l0,0  c-0.195,0.196-0.195,0.512,0,0.707l0.707,0.707C51.666,15.915,51.982,15.916,52.178,15.72L52.178,15.72z" fill="#3D3C3E"></path>--}}
{{--                        <path d="M47.936,14.307c0.195-0.196,0.195-0.512,0-0.707l-1.415-1.415c-0.195-0.195-0.511-0.196-0.707,0l0,0  c-0.195,0.195-0.195,0.512,0,0.707l1.415,1.415C47.424,14.502,47.74,14.502,47.936,14.307L47.936,14.307z" fill="#3D3C3E"></path>--}}
{{--                        <path d="M49.35,12.892c0.195-0.195,0.195-0.512,0-0.707l-0.707-0.708c-0.195-0.195-0.512-0.195-0.707,0l0,0  c-0.196,0.196-0.195,0.512,0,0.707l0.707,0.708C48.838,13.087,49.154,13.088,49.35,12.892L49.35,12.892z" fill="#3D3C3E"></path>--}}
{{--                        <g>--}}
{{--                            <path d="M33.545,7.331L33.545,7.331c0.707,0,1.367,0.315,2.016,0.964l19.799,19.799   c0.217,0.217,2.063,2.182,0,4.244L39.804,47.894l-2.829,2.829l-9.899,9.898c-0.649,0.649-1.309,0.965-2.017,0.965   c-1.226,0-2.22-0.959-2.227-0.965L3.034,40.822c-1.996-1.996-0.347-3.887,0-4.242L31.318,8.295   C31.328,8.286,32.316,7.331,33.545,7.331 M33.544,6.331c-1.676,0-2.933,1.257-2.933,1.257L2.327,35.873c0,0-2.829,2.828,0,5.656   l19.799,19.799c0,0,1.257,1.258,2.934,1.258c0.838,0,1.781-0.314,2.724-1.258l9.899-9.898c1.697-1.697,2.829-2.829,2.829-2.829   l15.556-15.556c2.829-2.829,0-5.658,0-5.658L36.268,7.588C35.325,6.645,34.383,6.331,33.544,6.331L33.544,6.331z" fill="#3D3C3E"></path>--}}
{{--                        </g>--}}
{{--                        <g>--}}
{{--                            <path d="M50.876,10.883l1.896,1.896l-2.507,6.269l-1.269,1.269l-5.657-5.657l1.269-1.269L50.876,10.883    M51.117,9.71l-7.071,2.828l-2.121,2.121l7.071,7.071l2.121-2.121l2.828-7.071L51.117,9.71L51.117,9.71z" fill="#3D3C3E"></path>--}}
{{--                        </g>--}}
{{--                        <g>--}}
{{--                            <path d="M60.159,2.402l1.414,1.414l-8.322,8.028l-1.414-1.414L60.159,2.402 M60.172,1l-9.762,9.417l2.828,2.828   L63,3.828L60.172,1L60.172,1z" fill="#3D3C3E"></path>--}}
{{--                        </g></svg>--}}
                    Bladebook
                </div>
                <div class="mt-5 flex-grow flex flex-col">
                    <nav class="flex-1 px-2 space-y-1 bg-white" aria-label="Sidebar">
                        @foreach($items->group() as $category => $categoryItems)
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
                                        <a href="{{ $categoryItem['route'] }}" class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
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
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
            <button
                x-on:click="show = true"
                class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 lg:hidden"
            >
                <span class="sr-only">Open sidebar</span>
                <!-- Heroicon name: outline/menu-alt-2 -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>
            <div class="flex-1 px-4 flex justify-between">
                <div class="flex-1 flex">
                    <form class="w-full flex lg:ml-0" action="#" method="GET">
                        <label for="search_field" class="sr-only">Search</label>
                        <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/search -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="search_field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Search" type="search" name="search">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <main class="flex-1 relative overflow-y-auto focus:outline-none">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ $title ?? '' }}</h1>
                </div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</div>

@livewireScripts
</body>
</html>
