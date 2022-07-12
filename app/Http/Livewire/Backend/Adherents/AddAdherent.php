<?php

namespace App\Http\Livewire\Backend\Adherents;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AddAdherent extends Component
{


    use WithFileUploads;

    public $numero_adherent ;
    public $nom ;
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


    public function store()
    {
       $this->validate();

        $adherent = new User();

        $adherent->numero_adherent = $this->numero_adherent;
        $adherent->nom = $this->nom;
        $adherent->prenom = $this->prenom;
        $adherent->telephone = $this->telephone;
        $adherent->statut_actuel = $this->statut_actuel;
        $adherent->metier = $this->metier;
        $adherent->benevole = $this->benevole;
        $adherent->portfolio_public = $this->portfolio_public;
        $adherent->email = $this->email;

        $adherent->password = Hash::make($this->password);  

        $imageName = Carbon::now()->timestamp .".". $this->photo->extension();
        $this->photo->storeAs('users',$imageName);
        
        $adherent->photo = $imageName;

        $adherent->save();

        session()->flash('message', "L'adherent a été ajouté avec succès");

        return redirect()->to('/backend/adherents');
      

 


    }
}
