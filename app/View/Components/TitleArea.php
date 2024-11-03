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
    public $showform;
    public function __construct($title, $subtitle, $image, $showform='0')
    {
        $this->title=$title;
        $this->subtitle=$subtitle;
        $this->image = $image;
        $this->showform = $showform;;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.title-area');
    }
}
