<?php

namespace Tonning\Bladebook\Views\Components\Layouts;

use Illuminate\View\Component;

class Page extends Component
{
    public ?array $breadcrumbs = null;
    public ?string $title = null;

    public function __construct(array $breadcrumbs = null, string $title = null)
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->title = $title;
    }

    public function render()
    {
        return view('book::components.page');
    }
}
