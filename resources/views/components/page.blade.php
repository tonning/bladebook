<main class="flex-1 relative pb-8 z-0 overflow-y-auto">
    <div class="mt-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-4" role="list">
                            @foreach($breadcrumbs ?? [] as $crumb)
                                @if($loop->first)
                                    <li>
                                        <div>
                                            <a href="{{ $crumb['url'] ?? '#' }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ $crumb['title'] }}</a>
                                        </div>
                                    </li>
                                @else
                                    <li>
                                        <div class="flex items-center">
                                            <!-- Heroicon name: solid/chevron-right -->
                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <a href="{{ $crumb['url'] ?? '#' }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ $crumb['title'] }}</a>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                    @isset($title)
                        <h2 class="mt-2 text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                            {{ $title }}
                        </h2>
                    @endisset
                </div>
            </div>

            {{ $slot }}
        </div>
    </div>
</main>
