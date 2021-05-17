<?php

namespace Tonning\Bladebook\Http\Slots;

use Illuminate\Contracts\Support\Htmlable;

abstract class Slot implements Htmlable
{
    const MAIN_SLOT = 'main';

    abstract public static function getName() : string;

    abstract public function toHtml() : string;
}
