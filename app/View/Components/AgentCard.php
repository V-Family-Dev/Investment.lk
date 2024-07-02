<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AgentCard extends Component
{
    /**
     * Create a new component instance.
     */

    public $image;
    public $name;
    public $type;
     public function __construct($image,$name,$type)
    {
        $this->image=$image;
        $this->name=$name;
        $this->type=$type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.agent-card');
    }
}
