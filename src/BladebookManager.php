<?php

namespace Tonning\Bladebook;

class BladebookManager
{
    public function isOnVapor() : bool
    {
        return ($_ENV['SERVER_SOFTWARE'] ?? null) === 'vapor';
    }
}
