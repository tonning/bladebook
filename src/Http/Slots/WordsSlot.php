<?php

namespace Tonning\Bladebook\Http\Slots;

class WordsSlot extends Slot
{
    public static function getName() : string
    {
        return 'Words';
    }

    public function render() : string
    {
        return 'Molestie ex augue';
    }

    public function toHtml() : string
    {
        return $this->render();
    }
}
