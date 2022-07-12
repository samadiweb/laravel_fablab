<?php

namespace App\Http\Livewire\Backend\Formations;

use App\Models\Inscription;
use App\Models\Formation;
use Livewire\Component;
use Livewire\WithPagination;

class ListInscriptions extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    //public $listInscriptions;
    public $search_word;

    public $id_formation = 0;

    public function render()
    {
        if ($this->id_formation == 0)
            $listInscriptions = Inscription::orderBy('date_inscription', 'desc')->paginate(10);
        else
            $listInscriptions = Inscription::where('formation_id', '=', $this->id_formation)->orderBy('date_inscription', 'desc')->paginate(10);


        $formations = Formation::all();

        return view('livewire.backend.formations.list-inscriptions', ['listInscriptions' => $listInscriptions, 'formations' => $formations])->layout('layouts.backend.admin');
    }

    public function annulerInscription($id)
    {
        Inscription::where('id', $id)
            ->update(['statut' => 'annule']);
    }
    public function validerInscription($id)
    {
        Inscription::where('id', $id)
            ->update(['statut' => 'valide']);
    }
    public function initialiserInscription($id)
    {
        Inscription::where('id', $id)
            ->update(['statut' => 'encours']);
    }

    public function changerFormation($id)
    {
        $this->id_formation = $id;
        $this->render();
    }
    public function afficherTout()
    {
        $this->id_formation = 0;
        $this->render();
    }

    public function search()
    {
        //$items = Inscription::where('nom', 'like', '%' . $this->search_word . '%')->paginate(10);
    }
}
