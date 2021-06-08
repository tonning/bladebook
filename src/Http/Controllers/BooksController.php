<?php

namespace Tonning\Bladebook\Http\Controllers;

use Illuminate\Routing\Controller;

class BooksController extends Controller
{
    public function index()
    {
        return view('book::books.index');
    }
}
