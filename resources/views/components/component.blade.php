<div
    x-data="component()"
    @event="recordEvent($event.detail); highlightEvent($event.detail)"
>
    <x-book::page :title="$name" :breadcrumbs="$breadcrumbs">
        <header class="flex items-center pt-4 mb-3 whitespace-nowrap">
            <div class="flex-none flex items-center ml-auto pl-4 sm:pl-6">
                <div class="group p-0.5 rounded-lg flex bg-gray-200 hover:bg-gray-300">

                    <button
                        x-ref="preview"
                        class="flex focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2 rounded-md focus:outline-none focus-visible:ring-offset-gray-100"
                        @click="activeComponentTab = 'preview'"
                        :tabindex="activeComponentTab === 'preview' ? '0' : '-1'"
                        @keydown.arrow-left="activeComponentTab = 'code'"
                        @keydown.arrow-right="activeComponentTab = 'code'"
                        tabindex="0"
                    >
                        <span class="p-1.5 lg:pl-2.5 lg:pr-3.5 rounded-md flex items-center text-sm font-medium" :class="activeComponentTab === 'preview' ? 'bg-white shadow-sm ring-1 ring-black ring-opacity-5' : ''">
                            <svg width="20" height="20" fill="none" class="lg:mr-2 text-gray-500 group-hover:text-gray-900" :class="activeComponentTab === 'preview' ? 'text-teal-500' : 'text-gray-500 group-hover:text-gray-900'">
                                <path d="M17.25 10c0 1-1.75 6.25-7.25 6.25S2.75 11 2.75 10 4.5 3.75 10 3.75 17.25 9 17.25 10z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <circle cx="10" cy="10" r="2.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg>
                            <span class="sr-only lg:not-sr-only text-gray-600 group-hover:text-gray-900" :class="activeComponentTab === 'preview' ? 'text-gray-900' : 'text-gray-600 group-hover:text-gray-900'">Preview</span>
                        </span>
                    </button>

                    <button
                        class="ml-0.5 p-1.5 lg:pl-2.5 lg:pr-3.5 rounded-md flex items-center text-sm text-gray-600 font-medium focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2 focus:outline-none focus-visible:ring-offset-gray-100"
                        :class="activeComponentTab === 'code' ? 'bg-white shadow-sm ring-1 ring-black ring-opacity-5' : ''"
                        @click="activeComponentTab = 'code'"
                        tabindex="-1"
                        :tabindex="activeComponentTab === 'code' ? '0' : '-1'"
                        @keydown.arrow-left="activeComponentTab = 'preview'"
                        @keydown.arrow-right="activeComponentTab = 'preview'"
                    >
                        <svg width="20" height="20" fill="none" class="lg:mr-2 text-gray-500 group-hover:text-gray-900" :class="activeComponentTab === 'code' ? 'text-teal-500' : 'text-gray-500 group-hover:text-gray-900'">
                            <path d="M13.75 6.75l3.5 3.25-3.5 3.25M6.25 13.25L2.75 10l3.5-3.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="sr-only lg:not-sr-only text-gray-600 group-hover:text-gray-900" :class="activeComponentTab === 'code' ? 'text-gray-900' : 'text-gray-600 group-hover:text-gray-900'">Code</span>
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
                {{ $attributes->merge(['x-data', 'class' => 'bg-white shadow overflow-hidden px-4 py-4 sm:px-6 rounded-md']) }}
                x-show="activeComponentTab == 'preview'"
            >
                <div>
                    {{ $slot }}
                </div>
            </li>

            <li
                x-ref="snippet"
                x-cloak
                wire:ignore
                x-show="activeComponentTab == 'code'"
                class="bg-white shadow overflow-hidden rounded-md"
            >
                <pre><code x-html="highlight()" class="language-html"></code></pre>
            </li>

            <li class="bg-white shadow overflow-hidden rounded-md">
                <div>
                    <div class="sm:hidden">
                        <label for="information-tabs" class="sr-only">Select a tab</label>
                        <select id="information-tabs" name="information-tabs" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                            <option selected>Controls</option>
                            <option>Events</option>
                            <option>Event Log</option>
                            <option>Docs</option>
                        </select>
                    </div>
                    <div class="hidden sm:block">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex" aria-label="Tabs">
                                <a
                                    @click="activeInformationTab = 'controls'"
                                    href="#controls"
                                    class="w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm flex justify-center items-center"
                                    :class="[activeInformationTab == 'controls' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300']"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z" />
                                    </svg>
                                    Controls
                                </a>

                                <a
                                    @click="activeInformationTab = 'events'"
                                    href="#events"
                                    class="w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm flex justify-center items-center"
                                    :class="[activeInformationTab == 'events' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300']"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd" />
                                    </svg>
                                    Events
                                </a>

                                <a
                                    @click="activeInformationTab = 'event-log'"
                                    href="#events"
                                    class="w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm flex justify-center items-center"
                                    :class="[activeInformationTab == 'event-log' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300']"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M5 3a1 1 0 000 2c5.523 0 10 4.477 10 10a1 1 0 102 0C17 8.373 11.627 3 5 3z" />
                                        <path d="M4 9a1 1 0 011-1 7 7 0 017 7 1 1 0 11-2 0 5 5 0 00-5-5 1 1 0 01-1-1zM3 15a2 2 0 114 0 2 2 0 01-4 0z" />
                                    </svg>
                                    Event Log
                                </a>

                                <a
                                    @if($docs)
                                        @click="activeInformationTab = 'docs'"
                                        href="#docs"
                                    @endif
                                    class="w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm flex justify-center items-center {{ $docs ? '' : 'pointer-events-none' }}"
                                    :class="[activeInformationTab == 'docs' ? 'border-indigo-500 text-indigo-600' : 'border-transparent {{ $docs ? 'text-gray-500 hover:text-gray-700 hover:border-gray-300' : 'text-gray-400' }} ']"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                    </svg>
                                    Docs
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>

                <ul
                    x-show="activeInformationTab == 'controls'"
                    class="divide-y divide-gray-200 px-4 py-4 sm:px-6"
                >
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

                    @unless(empty($slots))
                        <li>
                            <div class="pb-2 border-b border-gray-200 mt-10">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Slots
                                </h3>
                            </div>

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
                        </li>
                    @endunless
                </ul>

                <ul
                    x-cloak
                    wire:ignore
                    x-show="activeInformationTab == 'events'"
                >
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Description
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Value
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Odd row -->
                                        @foreach($events as $event)
                                            <tr
                                                id="{{ $event['name'] }}"
                                                class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} transition-colors"
                                            >
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $event['name'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $event['description'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $event['value'] }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </ul>

                <ul
                    x-cloak
                    wire:ignore
                    x-show="activeInformationTab == 'event-log'"
                    class="bg-gray-800 border-b border-pink-400 text-gray-200"
                >
                    <li class="border-b p-4 flex justify-between items-center">
                        <pre>Listening for events...</pre>
                        <button
                            x-on:click="clearEventLog"
                            type="button"
                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
                        >
                            Clear
                        </button>
                    </li>
                    <ul
                        class="divide-y divide-pink-400 px-4 py-4 sm:px-6 bg-gray-800 text-gray-200"
                        id="event-log"
                    ></ul>
                </ul>

                <div
                    class="px-4 py-4 sm:px-6 prose prose-pink"
                    x-show="activeInformationTab == 'docs'"
                    x-cloak
                >
                    {{ $docs ? view($docs) : '' }}
                </div>
            </li>
        </ul>
    </x-book::page>
</div>

<script>
    function component() {
        return {
            activeComponentTab: @entangle('__activeComponentTab'),
            activeInformationTab: @entangle('__activeInformationTab'),
            copied: false,
            initialized: true,
            copyTimeout: 750,
            __code: @entangle('__code'),

            highlight() {
                return Prism.highlight(this.__code, Prism.languages.html, 'html')
            },

            recordEvent(payload) {
                let node = document.createElement("li");
                node.classList.add('px-4', 'py-4', 'sm:px-0', 'flex', 'justify-between', 'items-start')

                const infoNode = document.createElement('div')
                infoNode.classList.add('flex', 'items-center')

                const timestamp = document.createElement('span')
                timestamp.innerText = new Date().toLocaleTimeString()
                timestamp.classList.add('text-gray-300', 'mr-2', 'text-sm')

                const badge = document.createElement('span')
                badge.classList.add('inline-flex', 'items-center', 'px-2', 'py-0.5', 'h-6', 'rounded', 'text-xs', 'font-medium', 'bg-pink-100', 'text-pink-800', 'mr-4');
                badge.innerText = payload.name

                infoNode.appendChild(timestamp)
                infoNode.appendChild(badge)

                let renderedJson = renderjson.set_icons('+ ', '- ')(payload.details)
                const events = document.getElementById('event-log');
                let li = events.insertBefore(node, events.firstChild);
                li.appendChild(renderedJson);
                li.appendChild(infoNode);
            },

            highlightEvent(payload) {
                const eventNode = document.getElementById(payload.name);

                if (! eventNode) {
                    return
                }

                eventNode.classList.add('bg-indigo-50')

                setTimeout(() => {
                    eventNode.classList.remove('bg-indigo-50')
                }, 200)
            },

            hasEvents() {
                return document.getElementById('event-log').hasChildNodes();
            },

            clearEventLog() {
                const node = document.getElementById('event-log');

                while (node.hasChildNodes()) {
                    node.removeChild(node.lastChild);
                }
            }
        }
    }
</script>
