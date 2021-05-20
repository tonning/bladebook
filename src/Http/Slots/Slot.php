<?php

namespace Tonning\Bladebook\Http\Slots;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\File;

abstract class Slot implements Renderable
{
    const MAIN_SLOT = 'main';
    const ACTIONS_SLOT = 'actions';
    const FOOTER_SLOT = 'footer';

    abstract public static function getName() : string;

    public function codeSnippet() : string
    {
        $view = $this->render();

        if ($view instanceof Illuminate\Contracts\View\View) {
            return File::get($this->render()->getPath());
        }

        if (is_string($view)) {
            return $view;
        }

        throw new \Exception('Unable to render code snippet for ' . $this::class);
    }
}
