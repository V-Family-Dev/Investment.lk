<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContentOne extends Component
{
    /**
     * Create a new component instance.
     */
    public $bgimage;
    public $bigimage;
    public $smallimage;
    public function __construct($bgimage,$bigimage,$smallimage)
    {
        $this->bgimage = $bgimage;
        $this->bigimage = $bigimage;
        $this->smallimage = $smallimage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.content-one');
    }
}
