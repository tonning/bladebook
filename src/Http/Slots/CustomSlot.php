<?php

namespace Tonning\Bladebook\Http\Slots;

class CustomSlot extends Slot
{
    public static function getName() : string
    {
        return 'Custom';
    }

    public function toHtml() : string
    {
        return '';
    }
}
