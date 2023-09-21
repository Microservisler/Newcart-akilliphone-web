<?php

namespace App\View\Components\Section;

use Illuminate\View\Component;

class Category extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $items = [];

    public function __construct($items)
    {
        $this->items = is_array($items)?$items:[];

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.section.category');
    }
}
