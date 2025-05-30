<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

protected $fillable = [
    'nom_employe',
    'type_conge',
    'date_debut',
    'date_fin',
    'statut',
];

}
