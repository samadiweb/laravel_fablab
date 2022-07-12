<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribut extends Model
{
    use HasFactory;

    protected $table = "pages_attributs";

    protected $fillable = ['key','value','id_page'];

}
