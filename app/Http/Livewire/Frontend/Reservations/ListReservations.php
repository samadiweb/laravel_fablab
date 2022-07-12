<?php

namespace App\Http\Livewire\Frontend\Reservations;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ListReservations extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $listReservations;
    public $search_word;

    public function render()
    {
        $this->listReservations = Reservation::where('adherent_id', '=', Auth::user()->id)
            //->where('statut', 'like', 'valide')
            ->get();
        // $this->listReservations =$this->listReservations->toArray();

        return view('livewire.frontend.reservations.list-reservations')->layout('layouts.frontend.site');
    }

    public function annulerReservation($id)
    {
        Reservation::where('id', $id)
            ->update(['statut' => 'annule']);
    }

    public function search()
    {
        $items = Reservation::where('nom', 'like', '%' . $this->search_word . '%')->paginate(10);
    }
}
