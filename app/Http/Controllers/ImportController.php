<?php

namespace App\Http\Controllers;
use App\Imports\DirectionImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EnseignantImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImportController extends Controller
{
  public function ImportationForm($val)
  {
    $titre = "directions";
    if ($val == 2) {
      $titre = "enseignants";
    }
    return view('ChoixImport', compact('val', 'titre'));
  }

  public function ImportationDonnees(Request $request)
  {

    $request->validate([
      'excelFile' => 'required|mimes:xlsx,csv',
      'source' => 'required',

    ]);
    $source = $request->source;
    if ($source == 1) {
      Excel::import(new DirectionImport, $request->file('excelFile'));
      return 'DirectionImport success';
    } else {
      Excel::import(new EnseignantImport, $request->file('excelFile'));
      return 'EnseignantImport success';
    }

  }

}
