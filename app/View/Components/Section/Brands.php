<?php

namespace App\View\Components\Section;

use Illuminate\View\Component;

class Brands extends Component
{
    public $title = '';
    public $banner = '';
    public $class = '';
    public $items = [];
    public $slug ='';
    public $products = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items,$products, $title,$banner=false, $class=false )
    {
        $this->items = is_array($items)?$items:[];
        $this->title = $title;
        $this->products = is_array($products)?$products:[];
        $this->banner = $banner;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.section.brands');
    }
}
