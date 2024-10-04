<?php

namespace App\Http\Controllers;
use App\Models\Enseignant;
use App\Models\Campagne;
use App\Models\Str_week;
use App\Models\Rapport;
use App\Models\Regional_direct;
use Illuminate\Http\Request;

class EditController extends Controller
{    public function EditRapport(Request $request, $val)
    {
        $Rapport = Rapport::find($request->Rap_id);
        $Strweek = $Rapport->Str_week;
        if ($val == 1) {
            $Rapport->Aim = $request->aim;
        } elseif ($val == 2) {
            $Rapport->Description = $request->description;
        } elseif ($val == 3) {
            $Strweek->Week_conlusion = $request->conclusion;
            $Strweek->update();
        } elseif ($val == 4) {
            $Strweek->Object1 = $request->ob1;
            $Strweek->Object2 = $request->ob2;
            $Strweek->Object3 = $request->ob3;
            $Strweek->Object4 = $request->ob4;
            $Strweek->Object5 = $request->ob5;
            $Strweek->update();
        } elseif ($val == 5) {
            $Strweek->Week1 = $request->wk1;
            $Strweek->Week2 = $request->wk2;
            $Strweek->Week3 = $request->wk3;
            $Strweek->Week4 = $request->wk4;
            $Strweek->Week5 = $request->wk5;
            $Strweek->Week6 = $request->wk6;
            $Strweek->Week7 = $request->wk7;
            $Strweek->Week8 = $request->wk8;
            $Strweek->Week9 = $request->wk9;
            $Strweek->Week10 = $request->wk10;
            $Strweek->update();
        } elseif ($val == 6) {
            $Strweek->Str1 = $request->str1;
            $Strweek->Str2 = $request->str2;
            $Strweek->Str3 = $request->str3;
            $Strweek->Str4 = $request->str4;
            $Strweek->Str5 = $request->str5;
            $Strweek->Str6 = $request->str6;
            $Strweek->Str7 = $request->str7;
            $Strweek->Str8 = $request->str8;
            $Strweek->Str9 = $request->str9;
            $Strweek->Str10 = $request->str10;
            $Strweek->update();
        }elseif ($val == 7){
            $Rapport->date_visite = $request->date;
            $Rapport->boys = $request->boys;
            $Rapport->girls = $request->girls;
            $Rapport->lesson_nature = $request->lesson_nature;
            $Rapport->lesson = $request->title_lesson;
            $Rapport->Level_Class = $request->level;
        }elseif ($val == 8){
            $Regional_direct = Regional_direct::find($Rapport->Regional_direct->id);
            $Regional_direct->entet_reg = $request->entet_reg;
            $Regional_direct->entet_dir = $request->entet_dir;
            $Regional_direct->update();
        }elseif ($val == 9){
            $Rapport->Observation = $request->observation;
        }
        $Rapport->update();
        return redirect()->route("ouvertureRapport", ['id' => $Rapport->id]);
    }
    public function editCampagne(Request $request, $Capm_id)
    {
        $Campagne = Campagne::find($Capm_id);
        $Campagne->nom = $request->nom;
        $Campagne->update();
        return back();
    }
    public function EditEns(Request $request, $En_id)
    {
        $Enseignant = Enseignant::find($En_id);
        $Enseignant->Nom = $request->nom;
        $Enseignant->prénom = $request->prenom;
        $Enseignant->Categorie = $request->cate;
        $Enseignant->Commune = $request->commune;
        $Enseignant->Mle = $request->mtle;
        $Enseignant->Highest_academic_degree = $request->acadeg;
        $Enseignant->Pre_service_training = $request->preserv;
        $Enseignant->Professional_qualification = $request->procalif;
        $Enseignant->Teaching_experience = $request->experi;
        $Enseignant->In_service_training = $request->Inserv;
        $Enseignant->Number_previous_visits = $request->numVis;
        $Enseignant->Contact = $request->contact;
        $Enseignant->update();
        return back();
    }
}