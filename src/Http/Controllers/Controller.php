<?php

namespace Tonning\Bladebook\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Tonning\Bladebook\Http\Middleware\Authenticate;

class Controller extends BaseController
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }
}
