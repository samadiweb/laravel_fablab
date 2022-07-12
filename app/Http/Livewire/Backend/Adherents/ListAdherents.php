<?php

namespace App\Http\Livewire\Backend\Adherents;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListAdherents extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';



    public $search;
    public $statut = 0;

    public function render()
    {
        if ($this->statut == 0)
            $items = User::where('user_type', 'user')->paginate(10);
        else
            $items = User::where('user_type', 'user')->where('compte_statut', $this->statut)->paginate(10);




        return view('livewire.backend.adherents.list-adherents', ["items" => $items])->layout('layouts.backend.admin');
    }

    public function filtrerParSatut($statut)
    {
        $this->statut = $statut;
        $this->render();
    }

    public function deleteAdherent($id)
    {

        $adherent = User::find($id);

        $adherent->delete();
        session()->flash('message', "L'adherent a été supprimer avec succès");
    }
}
