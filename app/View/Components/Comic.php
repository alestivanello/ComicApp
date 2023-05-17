<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Comic extends Component
{
    public $comic;

    public function __construct($comic)
    {
        $this->comic = $comic;
    }

    public function render()
    {
        return view('components.comic');
    }
}
