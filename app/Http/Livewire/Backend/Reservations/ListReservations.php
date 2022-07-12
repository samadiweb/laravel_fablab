<?php

namespace App\Http\Livewire\Backend\Reservations;

use App\Models\Reservation;
use App\Models\Machine;
use Livewire\Component;
use Livewire\WithPagination;

class ListReservations extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    //public $listReservations;
    public $search_word;

    public $id_machine = 0;

    public function render()
    {
        if ($this->id_machine == 0)
            $listReservations = Reservation::orderBy('date_seance', 'desc')->paginate(10);
        else
            $listReservations = Reservation::where('machine_id', '=', $this->id_machine)->orderBy('date_seance', 'desc')->paginate(10);


        $machines = Machine::all();

        return view('livewire.backend.reservations.list-reservations', ['listReservations' => $listReservations, 'machines' => $machines])->layout('layouts.backend.admin');
    }

    public function annulerReservation($id)
    {
        Reservation::where('id', $id)
            ->update(['statut' => 'annule']);
    }
    public function initialiserReservation($id)
    {
        Reservation::where('id', $id)
            ->update(['statut' => 'attente']);
    }
    public function validerReservation($id)
    {
        Reservation::where('id', $id)
            ->update(['statut' => 'valide']);
    }

    public function changerMachine($id)
    {
        $this->id_machine = $id;
        $this->render();
    }
    public function afficherTout()
    {
        $this->id_machine = 0;
        $this->render();
    }

    public function search()
    {
        $items = Reservation::where('nom', 'like', '%' . $this->search_word . '%')->paginate(10);
    }
}
