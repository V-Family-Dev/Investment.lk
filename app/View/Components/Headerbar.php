<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Headerbar extends Component
{

    public $pageName;
    /**
     * Create a new component instance.
     */
    public function __construct($pageName="")
    {
        $this->pageName = $pageName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.headerbar');
    }
}
