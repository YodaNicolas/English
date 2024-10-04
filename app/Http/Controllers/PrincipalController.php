<?php

namespace App\Http\Controllers;

use App\Models\Campagne;
use App\Models\Enseignant;
use App\Models\Str_week;
use App\Models\Rapport;
use App\Models\Regional_direct;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function home()
    {
        return view("DashAdminHome");
    }
    public function inspecthome($Camp_id)
    {
        $Campagne = Campagne::find($Camp_id);
        $Enseignants = Enseignant::all();
        $Rap_id = 0;
        $Regional_dirs = Regional_direct::all();
        $modalId = " ";
        return view("DashInspectHome", compact("Enseignants", "Rap_id", "Regional_dirs", "modalId", "Campagne"));
    }
    public function ajoutCampagne(Request $request)
    {
        $Campagne = new Campagne();
        $Campagne->nom = $request->nom;
        $Campagne->save();
        return back();
    }

    public function campListe()
    {
        $Campagnes = Campagne::latest()->get();
        return view("listeCampagne", compact("Campagnes", ));
    }
    public function ouvertureCampagne($Capm_id)
    {
        $Campagne = Campagne::find($Capm_id);
        $Rapports = Rapport::where("campagne_id", $Capm_id)->get();
        return view("listeRapport", compact("Rapports", "Campagne", "Capm_id"));
    }
    public function RapportListe()
    {
        $Campagne = [];
        $Capm_id = 0;
        $Rapports = Rapport::all();
        return view("listeRapport", compact("Rapports", "Campagne", "Capm_id"));
    }

    public function ouvertureRapport($id)
    {
        $Rapport = Rapport::find($id);
        $Objectifs = [];
        for ($i = 1; $i < 11; $i++) {
            $str = "Str" . $i;
            $week = "Week" . $i;

            if ($i < 6) {
                $obj = "Object" . $i;
                $Objectifs[] = $Rapport->Str_week->$obj;
            }
            $Strenghts[] = $Rapport->Str_week->$str;
            $Weeks[] = $Rapport->Str_week->$week;
        }
        return view("rapport", compact("Rapport"), compact("Objectifs", "Strenghts", "Weeks"));
    }

    public function RapportRed(Request $request, Rapport $Rapport)
    {
        $Rapport->campagne_id = $request->Camp_id;
        $Rapport->enseignant_id = $request->Ens_id;
        if ($Rapport->Enseignant->Sexe == "M") {
            $cvlt = "Mr. ";
        } else {
            $cvlt = "Ms. ";
        }

        $StrWek = new Str_week();
        $StrWek->Object1 = "predict four words which are: likely to appear in the text";
        $StrWek->Object2 = "Say whether four statements related to the text are true or false and justify";
        $StrWek->Object3 = "Answer three content-based questions according to the text";
        $StrWek->Object4 = "Find three ideas or arguments showing the negative effects of cellphones on pupils";

        $StrWek->Str1 = "The teacher has a clear and audible voice";
        $StrWek->Str2 = "The handwriting was legible";
        $StrWek->Str3 = "The board was quite well-managed";
        $StrWek->Str4 = "The objectives were well-stated and congruent with the activities";
        $StrWek->Str5 = "The content of the lesson was rich";
        $StrWek->Str6 = "Varied the activities";
        $StrWek->Str7 = "The teacher has a clear and audible voice";


        $StrWek->Week1 = "No Scanning and Skimming Activities:
The lesson did not include any activities for students to practice scanning or skimming the text, 
which are essential reading skills. These activities could have helped students quickly locate specific 
information or get an overview of the text before in-depth reading";

        $StrWek->Week2 = "Poor Floor Distribution and Error Correction Techniques:
The teacher's floor distribution was not optimal, as they tended to call on the same students 
repeatedly. Additionally, the error correction techniques used were not always effective, as some 
language errors were left uncorrected";

        $StrWek->Week3 = "Improper Post-Reading Task:
The post-reading task assigned to students was not well-designed to allow students to complete it 
successfully as time allotted was not sufficient";

        $StrWek->Week4 = "Few Language Errors:
There were a few minor language errors made by the teacher during the lesson, which could have 
been addressed to model correct usage for the students";
        $StrWek->Week_conlusion = "In conclusion, to improve " . $cvlt . $Rapport->Enseignant->Nom . "’s performance,";

        $StrWek->save();
        $Rapport->regional_direct_id = $request->Reg_dir_id;
        $Rapport->str_week_id = $StrWek->id;

        $Rapport->Aim = $cvlt . $Rapport->Enseignant->Nom . " presented a reading lesson on religious tolerance in Form IV (3e). His aim was “to raise students’ awareness on women’s rights” and his objectives were formulated as follow: by the end of the lesson the students will be able to";

        $Rapport->Description = "After greeting and  \n warming up his students, " . $cvlt . $Rapport->Enseignant->Nom . " introduced the topic, provided some background information and asked his students to predict words likely to appear on the text. Then he distributed the reading text for students to read it individually for seven minutes. After the silent reading, the teacher checked student’s he predictions and moved to an oral True/False activity. After completion," . $cvlt . $Rapport->Enseignant->Nom . " conducted a written activity consisting in answering comprehension questions. The lesson concluded with a post-reading activity, which consisted in a whole-class discussion, where the students were asked to list three advantages of religious tolerance. Before closing the lesson, he provided his class with a follow-up activity, checked the attendance and filled the record book.";
        $Rapport->Observation = "RAS";
        $Rapport->Statut = "0%";
        $Rapport->save();

        return redirect()->route("ouvertureRapport", ['id' => $Rapport->id]);
    }

    public function Bilan($Camp_id)
    {
        $Campagne = Campagne::find($Camp_id);
        $Rapports = Rapport::where("campagne_id", $Camp_id)->get();
        $Tableau = [[[]]];

        foreach ($Rapports as $Rapport) {
            $Tab = [
                "Objectifs" => [],
                "Strenghts" => [],
                "Weeks" => []
            ];

            for ($i = 1; $i < 11; $i++) {
                $str = "Str" . $i;
                $week = "Week" . $i;

                if ($i < 6) {
                    $obj = "Object" . $i;
                    $Tab["Objectifs"][] = $Rapport->Str_week->$obj;
                }
                $Tab["Strenghts"][] = $Rapport->Str_week->$str;
                $Tab["Weeks"][] = $Rapport->Str_week->$week;
            }
            $Tableau[] = $Tab;

        }
        //dd( $Tableau[1]["Weeks"]);
        return view("Bilan", compact("Rapports", "Campagne", "Tableau"));
    }
}
