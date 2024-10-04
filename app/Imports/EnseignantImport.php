<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Enseignant;
use Maatwebsite\Excel\Concerns\ToModel;

class EnseignantImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $Mle= $contact = $commune = $etab = "Pas renseigné";
        if ($row['mle']) {
            $Mle = $row['mle'];
        }
        if ($row['contact']) {
            $contact = $row['contact'];
        }
        if ($row['commune']) {
            $commune = $row['commune'];
        }
        if ($row['etab']) {
            $etab = $row['etab'];
        }
       

        // dd(array_keys($row));
        return new Enseignant([
            'Nom' => $row['nom'],
            'Prénom' => $row['prenom'],
            'Sexe' => $row['sexe'],
            'Mle' =>  $Mle,
            'Emploi' => $row['emploi'],
            'Discipline' => $row['discipline'],
            'Categorie' => $row['categorie'],
            'Fonction' => $row['fonction'],
            'Commune' => $commune,
            'Etab' => $etab,
            'Contact' => $contact,
            'Highest_academic_degree' => "Pas renseigné",
            'Pre_service_training' => "Pas renseigné",
            'Professional_qualification' => "Pas renseigné",
            'Teaching_experience' => "Pas renseigné",
            'In_service_training' => "Pas renseigné",
            'Number_previous_visits' => "Pas renseigné",

        ]);

    }
}
