<?php

namespace App\Http\Livewire\Backend\Adherents;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class EditAdherent extends Component
{


    use WithFileUploads;

    public $id_adherent;
    public $numero_adherent;
    public $nom;
    public $prenom;
    public $telephone;
    public $photo;
    public $statut_actuel;
    public $metier;
    public $benevole;
    public $portfolio_public;
    public $email;
    public $password;
    public $password_confirmation;


    public $new_photo;

    protected $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'telephone' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'password_confirmation' => 'same:password',
    ];

    protected $messages = [
        'nom.required' => 'Le nom est Obligatoire.',
        'prenom.required' => "Le prenom est Obligatoire.",
        'email.required' => "L'email est Obligatoire.",
        'email.email' => "Email non valide .",
        'password.required' => "Le password est Obligatoire.",
        'password.min' => "Le password doit etre composé de  >= 8 caractères.",
        'password_confirmation.same' => "Le password et la confirmation doivent etre les memes",

    ];

    public function render()
    {
        return view('livewire.backend.adherents.add-adherent')->layout('layouts.backend.admin');
    }

    public function mount($id_adherent)
    {
        $adherent = User::where('id',  $id_adherent)->first();

        $this->id_adherent = $adherent->id;
        $this->numero_adherent = $adherent->numero_adherent;
        $this->nom  = $adherent->nom;
        $this->prenom = $adherent->prenom;
        $this->telephone = $adherent->telephone;
        $this->photo = $adherent->photo;
        $this->statut_actuel = $adherent->statut_actuel;
        $this->metier = $adherent->metier;
        $this->benevole = $adherent->benevole;
        $this->portfolio_public = $adherent->portfolio_public;
        $this->email = $adherent->email;
    }


    public function store()
    {
        $this->validate();

        $adherent = User::where('id',  $this->id_adherent)->first();

        $adherent->numero_adherent = $this->numero_adherent;
        $adherent->nom = $this->nom;
        $adherent->prenom = $this->prenom;
        $adherent->telephone = $this->telephone;
        $adherent->statut_actuel = $this->statut_actuel;
        $adherent->metier = $this->metier;
        $adherent->benevole = $this->benevole;
        $adherent->portfolio_public = $this->portfolio_public;
        $adherent->email = $this->email;


        if ($this->new_photo) {


            $imageName = Carbon::now()->timestamp . "." . $this->new_photo->extension();
            $this->new_photo->storeAs('users', $imageName);

            $adherent->photo = $imageName;
        }
        $adherent->update();

        session()->flash('message', "L'adherent a été modifié avec succès");

        return redirect()->to('/backend/adherents');
    }
}
