<?php

namespace App\View\Components;

use Illuminate\View\Component;


class Card extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    public $album;

    public function __construct($album)
    {
        $this->album = $album;
        
    }


    public function render()
    {
        return view('components.card-album');
        
    }
}
