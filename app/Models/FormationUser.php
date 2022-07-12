<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationUser extends Model
{
    use HasFactory;

    protected $table = "users_formations";

    protected $fillable = ['titre','ecole','date','details','id_user'];

}
