<?php

namespace App\Http\Livewire\Frontend\Presentation;

use App\Models\Attribut;
use Livewire\Component;
use Livewire\WithPagination;

class Presentation extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search_word;

    public $titre ;
    public $presentation;
    public $image;

    public function render()
    {
        

        return view('livewire.frontend.presentation.presentation')->layout('layouts.frontend.site');
    } 

    public function mount()
    {

        $attributs = Attribut::where("id_page",1)->get();

        $this->titre = $attributs[0]->value;
        $this->presentation =$attributs[1]->value;
        $this->image =$attributs[2]->value;

    }

}
