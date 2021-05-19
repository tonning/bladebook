<?php

namespace Tonning\Bladebook\Http\Slots;

class SelectOptionSlot extends Slot
{
    public static function getName() : string
    {
        return 'Standard select options';
    }

    public function toHtml() : string
    {
        return <<<HTML
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            HTML;
    }
}
