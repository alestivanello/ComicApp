<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    public $pagination;

    public function __construct($pagination)
    {
        $this->pagination = $pagination;
    }

    public function render()
    {
        return view('components.pagination');
    }
}
