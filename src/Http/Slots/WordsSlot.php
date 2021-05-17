<?php

namespace Tonning\Bladebook\Http\Slots;

class WordsSlot extends Slot
{
    public static function getName() : string
    {
        return 'Words';
    }

    public function toHtml() : string
    {
        return 'Molestie ex augue';
    }
}
