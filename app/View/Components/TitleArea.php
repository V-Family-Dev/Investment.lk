<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TitleArea extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $subtitle;
    public $image;
    public function __construct($title,$subtitle,$image)
    {
        $this->title=$title;
        $this->subtitle=$subtitle;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.title-area');
    }
}
