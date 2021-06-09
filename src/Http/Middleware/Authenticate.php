<?php

namespace Tonning\Bladebook\Http\Middleware;

use Tonning\Bladebook\Bladebook;

class Authenticate
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|null
     */
    public function handle($request, $next)
    {
        return Bladebook::check($request) ? $next($request) : abort(403);
    }
}
