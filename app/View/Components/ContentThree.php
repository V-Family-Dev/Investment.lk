<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContentThree extends Component
{
    /**
     * Create a new component instance.
     */
    public $bgimage;
    public function __construct($bgimage)
    {
        $this->bgimage = $bgimage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.content-three');
    }
}
