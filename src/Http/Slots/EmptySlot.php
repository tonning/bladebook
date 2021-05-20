<?php

namespace Tonning\Bladebook\Http\Slots;

class EmptySlot extends Slot
{
    public static function getName() : string
    {
        return 'Empty';
    }

    public function render() : string
    {
        return '';
    }
}
