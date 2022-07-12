<?php

namespace App\Http\Livewire\Frontend\Formations;

use App\Models\Formation;
use App\Models\Inscription;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class InscriptionFormation extends Component
{


    use WithFileUploads;

    public $id_formation;
    public $titre;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;
    public $notes_inscription;

    public $showModal;


    public function render()
    {
        return view('livewire.frontend.formations.inscription-formation')->layout('layouts.frontend.site');
    }

    public function mount($id_formation)
    {
        $this->showModal = false;

        $formation = Formation::where('id',  $id_formation)->first();


        $this->id_formation = $formation->id;
        $this->titre = $formation->titre;
        $this->image = $formation->image;
        $this->description = $formation->description;
        $this->lien_wiki = $formation->lien_wiki;
        $this->notes = $formation->notes;

      
    }

    public function inscrir()
    {
        $inscription = new Inscription();


        $inscription->formation_id = $this->id_formation;
        $inscription->adherent_id = Auth::user()->id;
        $inscription->notes = $this->notes_inscription;
        $inscription->date_inscription =  now('Europe/Paris')->toDateTimeString();;

        $inscription->save();

        $this->showModal = true;


        session()->flash('message', 'Votre inscription a été bien enregistré.');

        
        
    }
    public function closeModal()
    {
        $this->showModal = false;

        return redirect()->to('/formations');
    }
   
  
}
