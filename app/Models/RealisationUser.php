<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisationUser extends Model
{
    use HasFactory;

    protected $table = "users_realisations";

    protected $fillable = ['titre','description','image','lien','id_user'];

}
