<?php

namespace App\Http\Livewire\Frontend\Machines;

use App\Models\Reservation;
use App\Models\Machine;
use App\Models\User;
use Livewire\Component;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Auth;

class ReservationMachine extends Component
{



    public $id_machine;
    public $nom;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;

    public $project;
    public $notes_reservation;

    public $week1;
    public $week2;

    public $selectedDate;
    public $selectedTime;

    public $table_reservations = [];

    public $showModal;

    protected $rules = [
        'project' => '',
        'notes' => '',
    ];

    protected $messages = [
        'project.required' => 'Le projet est Obligatoire.',

    ];

    public function render()
    {

        $machines = Machine::all();


        return view('livewire.frontend.machines.reservation-machine', ['machines' => $machines])->layout('layouts.frontend.site');
    }

    
    public function mount($id_machine)
    {
        $this->showModal = false;

        $machine = Machine::where('id',  $id_machine)->first();


        $this->id_machine = $machine->id;
        $this->nom = $machine->nom;
        $this->image = $machine->image;
        $this->description = $machine->description;
        $this->lien_wiki = $machine->lien_wiki;
        $this->notes = $machine->notes;


        $this->chargerTableReservation();
    }


    public function selectSeance($d, $t)
    {
        $this->selectedDate = $d;
        $this->selectedTime = $t;
    }

    public function reserverSeance()
    {
        $this->validate();

        $reservation = new Reservation();


        $reservation->project = $this->project;
        $reservation->machine_id = $this->id_machine;
        $reservation->project_id = 0;
        $reservation->adherent_id = Auth::user()->id;
        $reservation->date_seance = $this->selectedDate;
        $reservation->numero_seance = $this->selectedTime;
        $reservation->notes = $this->notes;
        $reservation->date_reservation =  new DateTime('now', new DateTimeZone('Europe/Paris'));;



        $reservation->save();

        $this->showModal = true;

        $this->chargerTableReservation();

        session()->flash('message', 'Votre réservation a été bien enregistré.');

        //return redirect()->to('/frontend/machines');

    }


    function getBetweenDates($startDate, $endDate)
    {
        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        $rangArray = [];

        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        for (
            $currentDate = $startDate;
            $currentDate <= $endDate;
            $currentDate += (86400)
        ) {

            $date = date('Y-m-d', $currentDate);
            $day_name = date_format(datetime::createfromformat("Y-m-d", 
            $date,new DateTimeZone('Europe/Paris')),"l");
            $full_date =[];
            $full_date['date'] =$date;
            $full_date['day_name'] =$day_name;
            $rangArray[] = $full_date;
        }

        return $rangArray;
    }

    public function test($date, $time)
    {
        $this->notes_reservation = $date . ' - ' . $time;
    }
    public function chargerTableReservation()
    {
        $this->table_reservations = [];

        $today = new DateTime('now', new DateTimeZone('UTC'));
        $day_of_week = $today->format('w');
        $today->modify('- ' . (($day_of_week - 1 + 7) % 7) . 'days');
        $sunday = clone $today;
        $sunday->modify('+ 6 days');

        $this->week1 = $this->getBetweenDates($today->format('Y-m-d'), $sunday->format('Y-m-d'));

        $reservations = Reservation::whereBetween('date_seance', [$today, $sunday])
            ->where('machine_id', '=', $this->id_machine)
            //->where('statut', 'like', 'valide')
            ->get();
        $times = [10, 11, 12, 13, 14, 15, 16, 17];
        
        array_pop($this->week1);// remove samedi
        array_pop($this->week1);// remove dimanche

        $times_day = [];
        $cell_obj = [];
        foreach ($times as $time ) {
            $times_day['time'] = $time;
            $times_obj = [];
            foreach ($this->week1 as $day) {

                $cell_obj = [];
                $cell_obj['disponible'] = true;
                $cell_obj['color'] = 'green';
                $cell_obj['time'] = $time;
                $cell_obj['date'] = $day['date'];
                //$cell_obj['jour'] = date_format($day,"D");

                foreach ($reservations as $reserv) {
                    if ($reserv->date_seance == $day['date'] && $reserv->numero_seance == $time) {
                        $cell_obj['disponible'] = false;
                        $cell_obj['color'] = 'red';
                        $cell_obj['time'] = $time;
                        $cell_obj['date'] = $day['date'];
                        //$cell_obj['jour'] = date_format($day,"D");
                        $cell_obj['project'] = $reserv->project;
                        $cell_obj['user'] =  User::where('id',   $reserv->adherent_id)->first()->nom;
                    }
                }

                array_push($times_obj, $cell_obj);
            }
            $times_day['seances'] = $times_obj;
            array_push($this->table_reservations, $times_day);
            $times_day = [];
        }
    } 
   
    public function closeModal()
    {
        $this->showModal = false;
        $this->render();
    }
    public function changerMachine($id)
    {
        $machine = Machine::where('id',  $id)->first();


        $this->id_machine = $machine->id;
        $this->nom = $machine->nom;
        $this->image = $machine->image;
        $this->description = $machine->description;
        $this->lien_wiki = $machine->lien_wiki;
        $this->notes = $machine->notes;

        $this->chargerTableReservation();
    }
    public function chargerTableReservation1()
    {
        $this->table_reservations = [];

        $today = new DateTime('now', new DateTimeZone('UTC'));
        $day_of_week = $today->format('w');
        $today->modify('- ' . (($day_of_week - 1 + 7) % 7) . 'days');
        $sunday = clone $today;
        $sunday->modify('+ 6 days');

        $this->week1 = $this->getBetweenDates($today->format('Y-m-d'), $sunday->format('Y-m-d'));

        $reservations = Reservation::whereBetween('date_seance', [$today, $sunday])
            ->where('machine_id', '=', $this->id_machine)
            ->where('statut', 'like', 'valide')
            ->get();
        $times = [10, 11, 12, 13, 14, 15, 16, 17];

        $times_day = [];
        $cell_obj = [];
        foreach ($this->week1 as $day) {
            $times_day['date'] = $day;
            $times_obj = [];
            foreach ($times as $time) {

                $cell_obj = [];
                $cell_obj['disponible'] = true;
                $cell_obj['color'] = 'green';
                $cell_obj['time'] = $time;
                $cell_obj['date'] = $day;

                foreach ($reservations as $reserv) {
                    if ($reserv->date_seance == $day && $reserv->numero_seance == $time) {
                        $cell_obj['disponible'] = false;
                        $cell_obj['color'] = 'red';
                        $cell_obj['time'] = $time;
                        $cell_obj['date'] = $day;
                        $cell_obj['project'] = $reserv->project;
                        $cell_obj['user'] =  User::where('id',   $reserv->adherent_id)->first()->nom;
                    }
                }

                array_push($times_obj, $cell_obj);
            }
            $times_day['seances'] = $times_obj;
            array_push($this->table_reservations, $times_day);
            $times_day = [];
        }
    }
}
class Seance
{
    public $disponible;
    public  $color;
    public   $time;
    public $date;
}
class SeancesDuJour
{
    public $date;
    public  $seances;
}
