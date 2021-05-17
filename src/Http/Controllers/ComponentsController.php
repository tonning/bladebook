<?php

namespace Tonning\Bladebook\Http\Controllers;

class ComponentsController
{
    /**
     * @TODO
     *
     * @return string
     */
    public function index($category = null)
    {
        return $category ?: 'all';
    }
}
