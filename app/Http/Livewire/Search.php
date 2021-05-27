<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Artist;

class Search extends Component
{

    public $searchTerm = "";
    //public $results;

    public function render()
    {
       
        $searchTerm = $this->searchTerm;
        $results = Artist::where('name', 'like', '%'.$searchTerm.'%')->get();
        return view('livewire.search', ['results' => $results]);
       
    }
}
