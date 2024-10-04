<?php

namespace App\Imports;

use App\Models\Regional_direct;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Regional_Dir;
use Maatwebsite\Excel\Concerns\ToModel;

class DirectionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd(array_keys($row));
        return new Regional_direct([
           'nom'     => $row['nomstructure'],
           'acronyme'     => $row['acronymestructure'],
           'commune'     => $row['nom_commune'],
           'province'     => $row['nom_province'],
           'region'     => $row['nom_region'],
           'entet_reg'     =>"?? ". $row['nom_region'],
           'entet_dir'     =>"?? ". $row['acronymestructure'],

        ]);
    }
}
