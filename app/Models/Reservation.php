<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = "reservations";

    protected $fillable = ['machine_id','project_id','adherent_id','project','date_reservation','date_seance','numero_seance','notes','statut'];

    public function adherent()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function projet()
    {
    	return $this->belongsTo('App\Models\Project');
    }

    public function machine()
    {
    	return $this->belongsTo('App\Models\Machine');
    }

}
