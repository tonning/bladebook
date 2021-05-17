<div
    x-data="component()"
>
    <x-book::page :title="$name" :breadcrumbs="$breadcrumbs">
        <header class="flex items-center pt-4 mb-3 whitespace-nowrap">
            <div class="flex-none flex items-center ml-auto pl-4 sm:pl-6">
                <div class="group p-0.5 rounded-lg flex bg-gray-200 hover:bg-gray-300">

                    <button
                        x-ref="preview"
                        class="flex focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2 rounded-md focus:outline-none focus-visible:ring-offset-gray-100"
                        @click="activeTab = 'preview'"
                        :tabindex="activeTab === 'preview' ? '0' : '-1'"
                        @keydown.arrow-left="activeTab = 'code'"
                        @keydown.arrow-right="activeTab = 'code'"
                        tabindex="0"
                    >
                        <span class="p-1.5 lg:pl-2.5 lg:pr-3.5 rounded-md flex items-center text-sm font-medium" :class="activeTab === 'preview' ? 'bg-white shadow-sm ring-1 ring-black ring-opacity-5' : ''">
                            <svg width="20" height="20" fill="none" class="lg:mr-2 text-gray-500 group-hover:text-gray-900" :class="activeTab === 'preview' ? 'text-teal-500' : 'text-gray-500 group-hover:text-gray-900'">
                                <path d="M17.25 10c0 1-1.75 6.25-7.25 6.25S2.75 11 2.75 10 4.5 3.75 10 3.75 17.25 9 17.25 10z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <circle cx="10" cy="10" r="2.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg>
                            <span class="sr-only lg:not-sr-only text-gray-600 group-hover:text-gray-900" :class="activeTab === 'preview' ? 'text-gray-900' : 'text-gray-600 group-hover:text-gray-900'">Preview</span>
                        </span>
                    </button>

                    <button
                        class="ml-0.5 p-1.5 lg:pl-2.5 lg:pr-3.5 rounded-md flex items-center text-sm text-gray-600 font-medium focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2 focus:outline-none focus-visible:ring-offset-gray-100"
                        :class="activeTab === 'code' ? 'bg-white shadow-sm ring-1 ring-black ring-opacity-5' : ''"
                        @click="activeTab = 'code'"
                        tabindex="-1"
                        :tabindex="activeTab === 'code' ? '0' : '-1'"
                        @keydown.arrow-left="activeTab = 'preview'"
                        @keydown.arrow-right="activeTab = 'preview'"
                    >
                        <svg width="20" height="20" fill="none" class="lg:mr-2 text-gray-500 group-hover:text-gray-900" :class="activeTab === 'code' ? 'text-teal-500' : 'text-gray-500 group-hover:text-gray-900'">
                            <path d="M13.75 6.75l3.5 3.25-3.5 3.25M6.25 13.25L2.75 10l3.5-3.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="sr-only lg:not-sr-only text-gray-600 group-hover:text-gray-900" :class="activeTab === 'code' ? 'text-gray-900' : 'text-gray-600 group-hover:text-gray-900'">Code</span>
                    </button>
                </div>

                <div class="hidden sm:block w-px h-6 bg-gray-200 ml-6"></div>

                <button
                    class="hidden sm:flex sm:items-center sm:justify-center relative w-9 h-9 rounded-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 text-gray-400 hover:text-gray-600 group ml-2.5"
                    :style="copied ? 'color:#06B6D4' : ''"
                    @click="navigator.clipboard.writeText($refs.snippet.innerText).then(()=>{copied=true;clearTimeout(copyTimeout);copyTimeout=setTimeout(()=>{copied=false},1500)})"
                >
                    <span class="sr-only">Copy code</span>
                    <span x-show="copied" style="display:none" class="absolute inset-x-0 bottom-full mb-1 flex justify-center" x-transition:enter="transform ease-out duration-200 transition origin-bottom" x-transition:enter-start="scale-95 translate-y-0.5 opacity-0" x-transition:enter-end="scale-100 translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span class="bg-gray-900 text-white rounded-md text-xs leading-4 tracking-wide font-semibold py-1 px-3 filter drop-shadow-md">
                            <svg width="16" height="6" viewBox="0 0 16 6" class="text-gray-900 absolute top-full left-1/2 -mt-px -ml-2">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 0H1V1.00366V1.00366V1.00371H1.01672C2.72058 1.0147 4.24225 2.74704 5.42685 4.72928C6.42941 6.40691 9.57154 6.4069 10.5741 4.72926C11.7587 2.74703 13.2803 1.0147 14.9841 1.00371H15V0Z" fill="currentColor"></path>
                            </svg>
                            Copied
                        </span>
                    </span>
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                        class="stroke-current transform group-hover:rotate-[4deg] transition"
                        :style="copied ? '--tw-rotate:8deg;' : ''"
                    >
                        <path d="M12.9975 10.7499L11.7475 10.7499C10.6429 10.7499 9.74747 11.6453 9.74747 12.7499L9.74747 21.2499C9.74747 22.3544 10.6429 23.2499 11.7475 23.2499L20.2475 23.2499C21.352 23.2499 22.2475 22.3544 22.2475 21.2499L22.2475 12.7499C22.2475 11.6453 21.352 10.7499 20.2475 10.7499L18.9975 10.7499" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M17.9975 12.2499L13.9975 12.2499C13.4452 12.2499 12.9975 11.8022 12.9975 11.2499L12.9975 9.74988C12.9975 9.19759 13.4452 8.74988 13.9975 8.74988L17.9975 8.74988C18.5498 8.74988 18.9975 9.19759 18.9975 9.74988L18.9975 11.2499C18.9975 11.8022 18.5498 12.2499 17.9975 12.2499Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13.7475 16.2499L18.2475 16.2499" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13.7475 19.2499L18.2475 19.2499" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <g :class="[copied ? '' : 'opacity-0', initialized ? 'transition-opacity' : '']" class="opacity-0 transition-opacity">
                            <path d="M15.9975 5.99988L15.9975 3.99988" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M19.9975 5.99988L20.9975 4.99988" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.9975 5.99988L10.9975 4.99988" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </button>
            </div>
        </header>

        <ul class="space-y-3">
            <li
                x-show="activeTab == 'preview'"
                class="bg-white shadow overflow-hidden px-4 py-4 sm:px-6 rounded-md"
            >
                <div {{ $attributes->merge(['x-data']) }}>
                    {{ $slot }}
                </div>
            </li>

            <li
                x-ref="snippet"
                x-cloak
                wire:ignore
                x-show="activeTab == 'code'"
                class="bg-white shadow overflow-hidden rounded-md"
            >
                <pre><code x-html="highlight()" class="language-html"></code></pre>
            </li>

            <li class="bg-white shadow overflow-hidden px-4 py-4 sm:px-6 rounded-md">
                <ul class="divide-y divide-gray-200">
                    @foreach($options as $key => $option)
                        <li class="px-4 py-4 sm:px-0">
                            @switch($option['type'])
                                @case('array')
                                <x-fab::forms.select
                                    wire:model="{{ $key }}"
                                    label="{{ $option['label'] }}"
                                    help="{!! isset($option['help']) ? $option['help'] : '' !!}"
                                >
                                    @foreach($option['options'] as $selectValue => $selectName)
                                        <option value="{{ $selectValue }}">{{ $selectName }}</option>
                                    @endforeach
                                </x-fab::forms.select>
                                @break

                                @case('bool')
                                <x-fab::forms.checkbox
                                    wire:model="{{ $key }}"
                                    label="{{ $option['label'] }}"
                                    id="{{ $key }}"
                                    help="{{ $option['help'] ?? '' }}"
                                ></x-fab::forms.checkbox>
                                @break

                                @case('string')
                                <x-fab::forms.input
                                    wire:model="{{ $key }}"
                                    label="{{ $option['label'] }}"
                                    name="{{ $key }}"
                                    help="{{ $option['help'] ?? '' }}"
                                ></x-fab::forms.input>
                                @break
                            @endswitch
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>

        @unless(empty($slots))
            <x-fab::layouts.panel title="Slots" class="mt-4">
                <ul class="space-y-3">
                    @foreach($slots as $key => $slot)
                        <li class="px-4 py-4 sm:px-0">
                            <x-fab::forms.select
                                wire:model="__slotValues.{{ $key }}"
                                label="{{ $slot['label'] }}"
                                help="These are examples of what could be use in the slot. You are free to put in whatever you like."
                            >
                                @foreach($slot['examples'] as $name => $example)
                                    <option value="{{ $name }}">{{ $example }}</option>
                                @endforeach
                            </x-fab::forms.select>

                            @if($_instance->__slotValues[$key] == Tonning\Bladebook\Http\Slots\CustomSlot::class)
                                <x-fab::forms.input
                                    class="mt-4"
                                    wire:model="__slotCustomValues.{{ $key }}"
                                    label="Custom slot"
                                    help="Run wild."
                                ></x-fab::forms.input>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </x-fab::layouts.panel>
        @endunless
    </x-book::page>
</div>

<script>
    function component() {
        return {
            activeTab: @entangle('__activeTab'),
            copied: false,
            initialized: true,
            copyTimeout: 750,
            __code: @entangle('__code'),
            highlight() {
                return Prism.highlight(this.__code, Prism.languages.html, 'html')
            }
        }
    }
</script>
