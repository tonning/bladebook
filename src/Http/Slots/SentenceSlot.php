<?php

namespace Tonning\Bladebook\Http\Slots;

class SentenceSlot extends Slot
{
    public static function getName() : string
    {
        return 'Sentence';
    }

    public function toHtml() : string
    {
        return 'Taciti auctor tellus eleifend turpis condimentum accumsan mauris ac, dui blandit montes malesuada est hendrerit lacus faucibus, magnis diam nibh libero elit commodo pulvinar.';
    }
}
