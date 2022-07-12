<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $table = "inscriptions";

    protected $fillable = ['formation_id','adherent_id','date_inscription','notes','statut'];

    public function adherent()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function formation()
    {
    	return $this->belongsTo('App\Models\Formation');
    }

    

}
