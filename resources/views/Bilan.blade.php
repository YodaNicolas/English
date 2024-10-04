<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Officiel</title>
    <link rel="stylesheet" href="{{ asset('MesStyles/styleRapport.css') }}">
    <link rel="stylesheet" href="{{ asset('MesStyles/styleBilan.css') }}">
    <script src="{{ asset('MesStyles/html2pdf.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script> --}}

    <style>
        @media print {
            @page {
                size: A4 portrait;
                /* Spécifie l'orientation portrait */
                margin: 15mm;
                /* Ajuste les marges si nécessaire */
                /* page-break-after: always; */
            }

            .saut-de-page {
                page-break-before: always;
                page-break-after: auto;
                /* Imposer un saut de page avant cette section */
            }

            /* Cacher le bouton d'impression lors de l'impression */
            #imprimer {
                display: none;
            }

            a {
                display: none;
            }
        }
    </style>
</head>

<body id="Rapportpdf" style="display: flex; flex-direction:column; align-items:center">
    @php
        $i = 1;
    @endphp
    <div class="Conten">
        @foreach ($Rapports as $Rapport)
            <div class="document saut-de-page" id="corpRapport">
                {{-- <a href="#header-modal" class="btn btn-success btn-sm">Edit header</a> --}}
                <header>
                    <div class="header-left">
                        <p class="p_header">Ministère de l’Alphabétisation Nationale et de la
                            Promotion Des Langues Nationales</p>
                        <hr class="trait-tirets" style="width: 5rem">
                        <p class="p_header">Région {{ $Rapport->Regional_direct->entet_reg }} </p>
                        <hr class="trait-tirets" style="width: 5rem">
                        <p class="p_header">Direction Provinciale des Enseignements
                            Post Primaires et Secondaires {{ $Rapport->Regional_direct->entet_dir }}
                        </p>
                        <hr class="trait-tirets" style="width: 5rem">
                        <p class="p_header">Service de l’Encadrement et de la Formation
                            Pédagogique
                        </p>
                        <hr class="trait-tirets" style="width: 5rem">
                        <p class="p_header">Inspection d’anglais
                        </p>
                    </div>
                    <div class="header-right">
                        <p class="p_header">BURKINA FASO
                            <br> Unité - Progrès - Justice
                        </p>
                    </div>
                </header>
                <p style="font-style: italic; font-weight:90 !important">N°2024-____/MENAPLN/RCAS/DPEPS-MENAPLN CAS</p>
                <div class="bod">
                    <h3 class="double-underline" style="text-align: center">Class visit report</h3>
                    <div class="info">
                        {{-- <a href="#info-modal" class="btn btn-success btn-sm">Edit informations</a> --}}

                        <table>
                            <tr>
                                <td><strong>Regional Directorate: {{ $Rapport->Regional_direct->region }}</strong></td>
                                <td><strong>Teacher’s name
                                    </strong>{{ $Rapport->Enseignant->Nom . ' ' . $Rapport->Enseignant->Prénom }}</td>
                            </tr>
                            <tr>
                                <td><strong>School: {{ $Rapport->Enseignant->Etab }}</strong></td>
                                <td><strong> Highest academic degree:
                                    </strong>{{ $Rapport->Enseignant->Highest_academic_degree }}</td>
                            </tr>
                            <tr>
                                <td><strong>Province: {{ $Rapport->Regional_direct->province }}</strong></td>
                                <td><strong> Registration number: </strong> {{ $Rapport->Enseignant->Mle }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <strong> Date of visit: {{ $Rapport->date_visite }}</strong>
                                </td>
                                <td>
                                    <strong> Pre-service training: </strong>
                                    {{ $Rapport->Enseignant->Pre_service_training }}
                                </td>
                            </tr>
                            <tr>
                                <td><strong> Town/City: {{ $Rapport->Enseignant->Commune }}</strong> </td>
                                <td><strong> Professional qualification: </strong>
                                    {{ $Rapport->Enseignant->Professional_qualification }}</td>
                            </tr>
                            <tr>
                                <td><strong> Level of the class: {{ $Rapport->Level_Class }} </strong>
                                </td>
                                <td><strong> Teaching experience: </strong>
                                    {{ $Rapport->Enseignant->Teaching_experience }}
                                </td>
                            </tr>
                            <tr>
                                <td><strong> Size of the
                                        class:{{ $Rapport->boys + $Rapport->girls . ' students  boys:' . $Rapport->boys . '   Girls:' . $Rapport->girls }}
                                    </strong></td>
                                <td><strong> In-service training: </strong>
                                    {{ $Rapport->Enseignant->In_service_training }}
                                </td>
                            </tr>
                            <tr>
                                <td><strong> Nature of the lesson: {{ $Rapport->lesson_nature }} </strong></td>
                                <td><strong> Number of previous visits: </strong>
                                    {{ $Rapport->Enseignant->Number_previous_visits }}</td>
                            </tr>
                            <tr>
                                <td><strong> Title of the lesson: {{ $Rapport->lesson }}</strong>
                                </td>
                                <td><strong> Contact: </strong> {{ $Rapport->Enseignant->Contact }}</td>
                            </tr>
                        </table>

                    </div>

                    <div class="lesson-details" style="padding-bottom: 10px">
                        {{-- <a href="#Aim-modal" class="btn btn-success btn-sm">Edit Aim</a> --}}
                        <p>
                            {!! nl2br(e($Rapport->Aim)) !!}
                        </p>

                        {{-- <a href="#Objectifs-modal" class="btn btn-success btn-sm">Edit Objectives</a> --}}
                        <ol>
                            @foreach ($Tableau[$i]['Objectifs'] as $Objectif)
                                @if ($Objectif !== null)
                                    <li>
                                        {!! nl2br(e($Objectif)) !!}
                                    </li>
                                @endif
                            @endforeach
                        </ol>

                        {{-- <a href="#Descrip-modal" class="btn btn-success btn-sm">Edit Description</a> --}}
                        <p>
                            {!! nl2br(e($Rapport->Description)) !!}
                        </p>

                        {{-- <a href="#Streng-modal" class="btn btn-success btn-sm">Edit Strengths</a> --}}
                        <span class="underline-strong">Strengths of the lesson</span>

                        <ul class="liste-puces-fleches">
                            @foreach ($Tableau[$i]['Strenghts'] as $Strenght)
                                @if ($Strenght !== null)
                                    <li>
                                        {!! nl2br(e($Strenght)) !!}
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                        <br>
                        <br>
                        {{-- <a href="#weak-modal" class="btn btn-success btn-sm">Edit Weaknesses</a> --}}
                        <span class="underline-strong">Weaknesses of the lesson</span>
                        <ul class="liste-puces-fleches">
                            @foreach ($Tableau[$i]['Weeks'] as $Week)
                                @if ($Week !== null)
                                    <li>
                                        {!! nl2br(str_replace(' ', '&nbsp;', e($Week))) !!}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        {{-- <a href="#WeekConcl-modal" class="btn btn-success btn-sm">Edit conclusion</a> --}}
                        <p>
                            {!! nl2br(e($Rapport->Str_week->Week_conlusion)) !!}
                        </p>
                        <div class="piedDepage">
                            <div class="gauche">
                                <span class="titre">The SUPERVISOR</span>
                                <p>Arouna Pierre OUEDRAOGO<br>
                                    English Inspector</p>
                            </div>
                            <div class="droite">
                                <span class="titre">The TEACHER</span>
                                <p>Name and signature</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $i = $i + 1;
            @endphp
            <br>
        @endforeach

        <button style="background-color:rgb(33, 61, 247); float:right" class="imprimer-pas"
            id="imprimer">Imprimer</button>
        <a href="{{ route('campListe') }}" style="background-color:rgb(255, 0, 0)" id="Retour">Retour à
            l'acceuil</a>

    </div>

    <div class="CorpBilan saut-de-page">
        <div class="info">
            <h1 style="text-align: center">BILAN {{ $Rapport->Campagne->nom }}</h1>
            <h2 style="text-align:left">ENCADREUR: OUEDRAOGO Arouna PIERRE</h2>
            <h2 style="text-align:left">DISCIPLINE : ANGLAIS</h2>
            <table class="BilanTable">
                <thead>
                    <tr class="BilanThead">
                        <td>N°</td>
                        <td>Date</td>
                        <td>Nom & Prénom </td>
                        <td>Matricule</td>
                        <td>Classe</td>
                        <td>Etaablissement</td>
                        <td style="font-size: 12px !important">Observation</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($Rapports as $Rapport)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($Rapport->created_at)) }}
                            </td>
                            <td>
                                {{ $Rapport->Enseignant->Nom . ' ' . $Rapport->Enseignant->Prénom }}
                               
                            </td>
                            <td>
                                {{ $Rapport->Enseignant->Mle }}
                            </td>
                            <td>
                               {{ $Rapport->Level_Class}}
                            </td>
                            <td>
                                {{ $Rapport->Enseignant->Etab }}
                            </td>
                            <td>
                                {{ $Rapport->Observation}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>



            </table>
        </div>
    </div>

    <script>
        document.getElementById('imprimer').addEventListener('click', function() {
            window.print();
            location.reload();
        });
    </script>

    <script src="{{ asset('style/js/html2pdf.bundle.min.js') }}"></script>

</body>

</html>
