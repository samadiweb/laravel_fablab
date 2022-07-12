<?php

namespace App\Http\Livewire\Frontend\Portfolios;

use App\Models\User;
use App\Models\FormationUser;
use App\Models\RealisationUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class EditPortfolios extends Component
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
    //public $password;
    //public $password_confirmation;

    public $new_photo;

    // formation

    public $titreFormulaireFormation;
    public $formation;
    public $formations;

    // formation

    public $titreFormulaireRealisation;
    public $realisation;
    public $realisations;
    public $realisation_edit_photo;


    protected $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'telephone' => 'required',
        'email' => 'required|email',
       // 'password' => 'required|min:8',
       // 'password_confirmation' => 'same:password',

        //formation

        'formation.titre' => 'required',
        'formation.ecole' => 'required',
        'formation.date' => 'required',
        'formation.details' => 'required',


        //realisation

        'realisation.titre' => 'required',
        'realisation.description' => 'required',
        'realisation.image' => 'required',
        'realisation.lien' => 'required',
    ];

    protected $messages = [
        'nom.required' => 'Le nom est Obligatoire.',
        'prenom.required' => "Le prenom est Obligatoire.",
        'email.required' => "L'email est Obligatoire.",
        'email.email' => "Email non valide .",
       // 'password.required' => "Le password est Obligatoire.",
       // 'password.min' => "Le password doit etre composé de  >= 8 caractères.",
       // 'password_confirmation.same' => "Le mot de passe et la confirmation du mot de passe doivent être identiques.",

    ];

    public function render()
    {
        $this->formations = FormationUser::where("id_user", Auth::user()->id)->get();

        $this->realisations = RealisationUser::where("id_user", Auth::user()->id)->get();

        return view('livewire.frontend.portfolios.edit-portfolios', ['formations' => $this->formations])->layout('layouts.frontend.site');
    }



    public function mount()
    {
        $adherent = User::where('id',  Auth::user()->id)->first();

        $this->id_adherent = $adherent->id;
        $this->numero_adherent = $adherent->numero_adherent;
        $this->nom  = $adherent->nom;
        $this->prenom = $adherent->prenom;
        $this->telephone = $adherent->telephone;
        $this->photo = $adherent->photo;
        $this->statut_actuel = $adherent->statut_actuel;
        $this->metier = $adherent->metier;
        $this->benevole = $adherent->benevole?1:0;
        $this->portfolio_public = $adherent->portfolio_public?1:0;
        $this->email = $adherent->email;


        $this->formation = new FormationUser();
        $this->titreFormulaireFormation = "Nouvelle Formation";

       

        $this->nouvelleRealisation();
    }


    public function modifierUser()
    {
        $this->validate();

        $adherent = User::where('id',  Auth::user()->id)->first();

        //$adherent->numero_adherent = $this->numero_adherent;
        $adherent->nom = $this->nom;
        $adherent->prenom = $this->prenom;
        $adherent->telephone = $this->telephone;
        $adherent->statut_actuel = $this->statut_actuel;
        $adherent->metier = $this->metier;
        $adherent->benevole = $this->benevole;
        $adherent->portfolio_public = $this->portfolio_public;
        //$adherent->email = $this->email;



      /*  if ($this->new_photo) {

            $imageName = Carbon::now()->timestamp . "." . $this->new_photo->extension();
            $this->new_photo->storeAs('users/images_profils', $imageName);

            $adherent->photo = $imageName;
        }*/




        $adherent->update();

        session()->flash('message', "Profil a été modifié avec succès");

        //return redirect()->to('/frontend/portfolios/show');
    }
    public function enregistrerFormation()
    {
        $validatedData = $this->validate([
            'formation.titre' => 'required',
            'formation.ecole' => 'required',
            'formation.date' => 'required',
            'formation.details' => 'required',
        ]);

        if ($this->titreFormulaireFormation == "Nouvelle Formation") {

            $formation = new FormationUser();

            $formation->titre = $this->formation->titre;
            $formation->ecole = $this->formation->ecole;
            $formation->date = $this->formation->date;
            $formation->details = $this->formation->details;
            $formation->id_user = Auth::user()->id;

            $formation->save();

            session()->flash('message', "Formation a été ajouté avec succès");

        } else {
            
            $this->formation->update();

            session()->flash('message', "Formation a été modifié avec succès");
        }


        $this->formations = FormationUser::where("id_user", Auth::user()->id)->get();
        $this->nouvelleFormation();


    }
    public function nouvelleFormation()
    {
        $this->formation = new FormationUser();
        $this->titreFormulaireFormation = "Nouvelle Formation";
    }
    public function modifierFormation($id_formation)
    {

        $this->formation =  FormationUser::where("id", $id_formation)->first();

        $this->titreFormulaireFormation = "Modifier Formation " . $this->formation->titre;
    }
    public function supprimerFormation($id_formation)
    {

        $this->formation =  FormationUser::where("id", $id_formation)->first();

        $this->formation->delete();

        session()->flash('message', "Formation a été supprimé avec succès");

        $this->nouvelleFormation();

    }


    // Realisation

    public function enregistrerRealisation()
    {
        $validatedData = $this->validate([
            'realisation.titre' => 'required',
            'realisation.description' => 'required',
            'realisation.image' => 'required',
            'realisation.lien' => 'required',
        ]);

        if ($this->titreFormulaireRealisation == "Nouvelle Réalisation") {

            $realisation = new RealisationUser();

            $realisation->titre = $this->realisation->titre;
            $realisation->description = $this->realisation->description;
            $realisation->lien = $this->realisation->lien;
            $realisation->id_user = Auth::user()->id;

            if ($this->realisation_edit_photo) {

                $imageName = Carbon::now()->timestamp . "." . $this->realisation_edit_photo->extension();
                $this->realisation_edit_photo->storeAs('users/realisations', $imageName);
    
                $realisation->image = $imageName;
            }

            $realisation->save();

            session()->flash('message', "la Réalisation a été ajouté avec succès");

        } else {
            
            $this->realisation->update();

            session()->flash('message', "Realisation a été modifié avec succès");
        }


        $this->realisations = RealisationUser::where("id_user", Auth::user()->id)->get();
        $this->nouvelleRealisation();


    }
    public function nouvelleRealisation()
    {
        $this->realisation = new RealisationUser();
        $this->titreFormulaireRealisation = "Nouvelle Réalisation";
        $this->realisation_edit_photo = null;
        $this->realisation->image = "default.jpg";
    }
    public function modifierRealisation($id_realisation)
    {

        $this->realisation =  RealisationUser::where("id", $id_realisation)->first();

        $this->titreFormulaireRealisation = "Modifier Réalisation " . $this->realisation->titre;
    }
    public function supprimerRealisation($id_realisation)
    {

        $this->realisation =  RealisationUser::where("id", $id_realisation)->first();

        $this->realisation->delete();

        session()->flash('message', "Realisation a été supprimé avec succès");

        $this->nouvelleRealisation();

    }
}
