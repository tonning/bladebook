<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bladebook</title>

    <link href="{{ asset(mix('bladebook.css', 'vendor/bladebook')) }}" rel="stylesheet">
    @foreach(Bladebook::getCurrentVendorStylePaths() as $stylePath)
        <link href="{{ $stylePath }}" rel="stylesheet">
    @endforeach
    @livewireStyles

    <script src="{{ asset(mix('bladebook.js', 'vendor/bladebook')) }}" defer></script>
    <script src="{{ asset(mix('renderjson.js', 'vendor/bladebook')) }}" defer></script>
    @foreach(Bladebook::getCurrentVendorScriptPaths() as $scriptPath)
        <script src="{{ $scriptPath }}" defer></script>
    @endforeach
</head>
<body>

<div
    x-data="{ show: false, book: '' }"
    class="h-screen flex overflow-hidden bg-gray-100"
>

    <livewire:tonning.bladebook.http.livewire.sidebar />

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
{{--            <div class="flex-1 px-4 flex justify-between">--}}
{{--                <div class="flex-1 flex">--}}
{{--                    <form class="w-full flex lg:ml-0" action="#" method="GET">--}}
{{--                        <label for="search_field" class="sr-only">Search</label>--}}
{{--                        <div class="relative w-full text-gray-400 focus-within:text-gray-600">--}}
{{--                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">--}}
{{--                                <!-- Heroicon name: solid/search -->--}}
{{--                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                            <input id="search_field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Search" type="search" name="search">--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
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
