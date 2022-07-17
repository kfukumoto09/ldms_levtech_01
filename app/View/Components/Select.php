<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    // register画面にuser_categoryのselect boxを表示させるための変数
    public $userCategories;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userCategories)
    {
        $this->userCategories = $userCategories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select');
    }
}
