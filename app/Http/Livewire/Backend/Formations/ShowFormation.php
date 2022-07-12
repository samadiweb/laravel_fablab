<?php

namespace App\Http\Livewire\Backend\Formations;

use App\Models\Formation;
use App\Models\Inscription;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowFormation extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    use WithFileUploads;

    public $id_formation;
    public $titre;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;


    public function render()
    {

        $listInscriptionsAtt = Inscription::where('statut', 'enregistre')->paginate(10);
        $listInscriptionsValidees = Inscription::where('statut', 'valide')->paginate(10);
        $listInscriptionsNonValidees = Inscription::where('statut', 'annule')->paginate(10);
        return view('livewire.backend.formations.show-formation', [
            'listInscriptionsAtt' => $listInscriptionsAtt,
            'listInscriptionsValidees' => $listInscriptionsValidees,
            'listInscriptionsNonValidees' => $listInscriptionsNonValidees
        ])->layout('layouts.backend.admin');
    }

    public function mount($id_formation)
    {

        $formation = Formation::where('id',  $id_formation)->first();


        $this->id_formation = $formation->id;
        $this->titre = $formation->titre;
        $this->image = $formation->image;
        $this->description = $formation->description;
        $this->lien_wiki = $formation->lien_wiki;
        $this->notes = $formation->notes;
    }
   
    public function validerInscription($id_inscription,$statut)
    {

        $inscription = Inscription::where('id',  $id_inscription)->first();

        $inscription->statut = $statut;

        $inscription->update();

        session()->flash("message_$statut", "Le Satut de l'inscription a été bien modifié.");
    }
    public function supprimerInscription($id_inscription)
    {

        $inscription = Inscription::where('id',  $id_inscription)->first();

        $inscription->delete();

        session()->flash("message_annule", "L'inscription a été bien supprimé.");
    }
}
