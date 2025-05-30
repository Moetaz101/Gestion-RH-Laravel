<?php

// app/Models/ResponsableRH.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponsableRH extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'login', 'mot_de_passe'
    ];
}
