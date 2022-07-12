<?php

namespace App\Http\Livewire\Backend\Pages;

use App\Models\Attribut;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Presentation extends Component
{


    use WithFileUploads;

    public $titre ;
    public $presentation;
    public $image;
    public $newImage;

    protected $rules = [
        'titre' => 'required',
        'image' => 'required',
        'presentation' => 'required',
     
    ];

    protected $messages = [
        'titre.required' => 'Le titre est Obligatoire.',
        'image.required' => "L'image est Obligatoire.",
        'presentation.required' => "La présentation est Obligatoire.",
    ];

    public function render()
    {

 
        return view('livewire.backend.pages.presentation')->layout('layouts.backend.admin');
    }

    public function mount()
    {

        $attributs = Attribut::where("id_page",1)->get();

        $this->titre = $attributs[0]->value.'--'.$attributs[0]->id;
        $this->presentation =$attributs[1]->value;
        $this->image =$attributs[2]->value;

    }
    public function store()
    {
       $this->validate();

       $attributs = Attribut::where("id_page",1)->get();

       
       $attributs[0]->value = $this->titre ;
       $attributs[0]->save();

       /*$this->presentation =$attributs[1]->value;
       $this->image =$attributs[2]->value;


        $presentation->titre = $this->titre;
        $presentation->id_page = 1;
        $presentation->save();

        $presentation->titre = $this->titre;

        $presentation->presentation = $this->description;
        
     

        if ($this->newImage) {

            $imageName = Carbon::now()->timestamp . "." . $this->newImage->extension();
            $this->newImage->storeAs('projects', $imageName);
            $project->image = $imageName;
        }

        $presentation->save();*/


        session()->flash('message', 'La présentation a été mis à jour avec succès');
 
        //return redirect()->to('/backend');
    }
}
