<?php

namespace App\View\Components;

use App\Models\BlogCategory;
use Illuminate\View\Component;

class categories extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $result = BlogCategory::all();
        return view('components.categories', ['result'=>$result]);
    }
}
