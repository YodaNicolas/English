<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nom',
        'Prénom',
        'Sexe',
        'Mle',
        'Emploi',
        'Discipline',
        'Categorie',
        'Fonction',
        'Commune',
        'Etab',
        'Contact',
        'Highest_academic_degree',
        'Pre_service_training',
        'Professional_qualification',
        'Teaching_experience',
        'In_service_training',
        'Number_previous_visits',
    ];
   
    public function rapport()
    {
        return $this->hasMany(Rapport::class);
    }

}
