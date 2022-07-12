<?php

namespace App\Http\Livewire\Backend\Adherents;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ShowAdherent extends Component
{


    use WithFileUploads;

    public $adherent ;
    


    public function render()
    {
        return view('livewire.backend.adherents.show-adherent')->layout('layouts.backend.admin');
    }

    public function mount($id_adherent)
    {

        $this->adherent = User::where('id',  $id_adherent)->first();


      

    }

    public function validerInscription($id_adherent)
    {
        $adherent = User::where('id',  $id_adherent)->first();

        $adherent->compte_statut = 'ok';
        $adherent->update();

        session()->flash('message', 'La adherent a été modifé avec succès');
    }

   
}
