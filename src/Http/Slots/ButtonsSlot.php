<?php

namespace Tonning\Bladebook\Http\Slots;

class ButtonsSlot extends Slot
{
    public static function getName() : string
    {
        return 'Buttons';
    }

    public function toHtml() : string
    {
        return <<<Blade
            <div x-data="{ submitClicked: false, cancelClicked: false }">
                <span x-cloak x-show="submitClicked" class="ml-4 inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-indigo-100 text-indigo-800">Submit button clicked</span>
                <span x-cloak x-show="cancelClicked" class="ml-4 inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-gray-100 text-gray-800">Cancel button clicked</span>
                <button
                    @click="cancelClicked = true; setTimeout(() => cancelClicked = false, 750)"
                    type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </button>

                <button
                    @click="submitClicked = true; setTimeout(() => submitClicked = false, 750)"
                    type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit
                </button>
            </div>
            Blade;
    }
}
