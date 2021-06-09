<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Bladebook Domain
    |--------------------------------------------------------------------------
    |
    | This is the subdomain where Bladebook will be accessible from. If this
    | setting is null, Bladebook will reside under the same domain as the
    | application. Otherwise, this value will serve as the subdomain.
    |
    */

    'domain' => null,

    /*
    |--------------------------------------------------------------------------
    | Bladebook Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Bladebook will be accessible from. Feel free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */

    'path' => 'bladebook',

    /*
    |--------------------------------------------------------------------------
    | Bladebook Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will get attached onto each Bladebook route, giving you
    | a chance to add your own middleware to this list or substitute any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => ['web'],
];
