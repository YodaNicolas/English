<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Officiel</title>
    <link rel="stylesheet" href="{{ asset('MesStyles/styleRapport.css') }}">
    <script src="asset('MesStyles/html2pdf.js')"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    {{-- <link rel="stylesheet" href="{{ asset("boostrap/css/bootstrap.min.css") }}"> --}}
    <style>
        @media print {
            @page {
                size: A4 portrait;
                /* Spécifie l'orientation portrait */
                margin: 15mm;
                /* Ajuste les marges si nécessaire */
            }

            .saut-de-page {
                page-break-before: always;
                /* Imposer un saut de page avant cette section */
            }

            /* Cacher le bouton d'impression lors de l'impression */
            #imprimer {
                display: none;
            }

            #Retour {
                display: none;
            }

            a {
                display: none;
            }
        }
    </style>
</head>

<body id="Rapportpdf">
    <div class="document" id="corpRapport">
        <a href="#header-modal" class="btn btn-success btn-sm">Edit header</a>
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
                <a href="#info-modal" class="btn btn-success btn-sm">Edit informations</a>

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
                            <strong> Pre-service training: </strong> {{ $Rapport->Enseignant->Pre_service_training }}
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
                        <td><strong> Teaching experience: </strong> {{ $Rapport->Enseignant->Teaching_experience }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong> Size of the
                                class:{{ $Rapport->boys + $Rapport->girls . ' students  boys:' . $Rapport->boys . '   Girls:' . $Rapport->girls }}
                            </strong></td>
                        <td><strong> In-service training: </strong> {{ $Rapport->Enseignant->In_service_training }}
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
                <a href="#Aim-modal" class="btn btn-success btn-sm">Edit Aim</a>
                <p>
                    {!! nl2br(e($Rapport->Aim)) !!}
                </p>

                <a href="#Objectifs-modal" class="btn btn-success btn-sm">Edit Objectives</a>
                <ol>
                    @foreach ($Objectifs as $Objectif)
                        @if ($Objectif !== null)
                            <li>
                                {!! nl2br(e($Objectif)) !!}
                            </li>
                        @endif
                    @endforeach
                </ol>

                <a href="#Descrip-modal" class="btn btn-success btn-sm">Edit Description</a>
                <p>
                    {!! nl2br(e($Rapport->Description)) !!}
                </p>


                <a href="#Streng-modal" class="btn btn-success btn-sm">Edit Strengths</a>
                <span class="underline-strong">Strengths of the lesson</span>

                <ul class="liste-puces-fleches">
                    @foreach ($Strenghts as $Strenght)
                        @if ($Strenght !== null)
                            <li>
                                {!! nl2br(e($Strenght)) !!}
                            </li>
                        @endif
                    @endforeach
                </ul>

                <br>
                <br>
                <a href="#weak-modal" class="btn btn-success btn-sm">Edit Weaknesses</a>
                <span class="underline-strong">Weaknesses of the lesson</span>
                <ul class="liste-puces-fleches">
                    @foreach ($Weeks as $Week)
                        @if ($Week !== null)
                            <li>
                                {!! nl2br(str_replace(' ', '&nbsp;', e($Week))) !!}
                            </li>
                        @endif
                    @endforeach
                </ul>
                <a href="#WeekConcl-modal" class="btn btn-success btn-sm">Edit conclusion</a>
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
        <div style="display: flex; justify-content:space-between">
            <a href="#observation-modal" style="background-color:rgb(30, 255, 0)">Observation</a>

            <button style="background-color:rgb(33, 61, 247)" class="imprimer-pas" id="imprimer">Imprimer</button>

            <a href="{{ route('ouvertureCampagne', ['id' => $Rapport->Campagne->id]) }}"
                style="background-color:rgb(255, 0, 0)">Retour à l'acceuil</a>
        </div>

    </div>
    
    <div id="Objectifs-modal" class="modal">
        <div class="modal__content">
            <span>Objectifs Editing</span>
            <a href="#" class="modal__close">&times;Close</a>

            <form action="{{ route('EditRapport', ['val' => 4]) }}" method="POST">
                @csrf
                <input type="number" name="Rap_id" hidden value="{{ $Rapport->id }}">
                <div class="editForm">
                    <label for="ob1">Objectif 1:</label>
                    <textarea name="ob1" id="ob1" cols="98" rows="3">
                      {{ $Objectifs[0] }}
                    </textarea>

                    <label for="ob2">Objectif 2:</label>
                    <textarea name="ob2" id="ob2" cols="98" rows="3">
                        {{ $Objectifs[1] }}
                      </textarea>
                    <label for="ob3">Objectif 3:</label>
                    <textarea name="ob3" id="ob3" cols="98" rows="3">
                        {{ $Objectifs[2] }}
                      </textarea>
                    <label for="ob4">Objectif 4:</label>
                    <textarea name="ob4" id="ob4" cols="98" rows="3">
                        {{ $Objectifs[3] }}
                      </textarea>
                    <label for="ob5">Objectif 5:</label>
                    <textarea name="ob5" id="ob5" cols="98" rows="3">
                        {{ $Objectifs[4] }}
                      </textarea>
                </div>
                <input class="boutonSub" type="submit" value="Save Objectifs">
            </form>
        </div>
    </div>
    <div id="header-modal" class="modal">
        <div class="modal__content">
            <span>Header Editing</span>
            <a href="#" class="modal__close">&times;Close</a>

            <form action="{{ route('EditRapport', ['val' => 8]) }}" method="POST">
                @csrf
                <input type="number" name="Rap_id" hidden value="{{ $Rapport->id }}">
                <div class="editForm">
                    <label for="reg">Région: </label>
                    <textarea name="entet_reg" id="reg" cols="98" rows="3">
                        {{ $Rapport->Regional_direct->entet_reg }}
                    </textarea>

                    <label for="dir">Direction Provinciale des Enseignements
                        Post Primaires et Secondaires:</label>
                    <textarea name="entet_dir" id="dir" cols="98" rows="3">
                         {{ $Rapport->Regional_direct->entet_dir }}
                      </textarea>
                </div>

                <input class="boutonSub" type="submit" value="Save header">
            </form>
        </div>
    </div>
    <div id="observation-modal" class="modal">
        <div class="modal__content">
            <span>Observation Editing</span>
            <a href="#" class="modal__close">&times;Close</a>

            <form action="{{ route('EditRapport', ['val' => 9]) }}" method="POST">
                @csrf
                <input type="number" name="Rap_id" hidden value="{{ $Rapport->id }}">
                <div class="editForm">
                    <label for="observation">Observation: </label>
                    <textarea name="observation" id="observation" cols="98" rows="10">
                        {{ $Rapport->Observation }} 
                    </textarea>
                </div>
                <input class="boutonSub" type="submit" value="Save header">
            </form>
        </div>
    </div>
    <div id="info-modal" class="modal">
        <div class="modal__content">
            <strong>
                <span style="font-size: 22px; text-align:center">Informations Editing</span>
            </strong>
            <a href="#" class="modal__close">&times;Close</a>

            <form action="{{ route('EditRapport', ['val' => 7]) }}" method="POST">
                @csrf
                <br>
                <input type="number" name="Rap_id" hidden value="{{ $Rapport->id }}">

                <table style="font-size: 20px">

                    <tr>
                        <td>
                            <strong>
                                <label for="">Date of visit:</label>
                            </strong>
                            <input style="width: 65%" type="text" value="{{ $Rapport->date_visite }}"
                                name="date">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <strong>
                                <label for="">Level of the class:</label>
                            </strong>
                            <input type="text" value="{{ $Rapport->Level_Class }}" name="level">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                <label for="">Size of the class:</label>
                            </strong>
                            <input type="number" value="{{ $Rapport->boys }}" placeholder="Boys" name="boys">
                            <input type="number" value="{{ $Rapport->girls }}" placeholder="Girls" name="girls">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                <label for="">Nature of lesson:</label>
                            </strong>
                            <select style="width: 65%" name="lesson_nature" id="">
                                @if ($Rapport->lesson_nature !== null)
                                    <option value="{{ $Rapport->lesson_nature }}" selected>
                                        {{ $Rapport->lesson_nature }}</option>
                                @else
                                    <option value="" selected disabled>Chose nature of the lesson</option>
                                @endif
                                <option value="Reading Comprehension ">Reading Comprehension </option>
                                <option value="Picture Talk">Picture Talk</option>
                                <option value="">opti</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                <label>Title of the lesson:</label>
                            </strong>
                            <input style="width: 66%" value="{{ $Rapport->lesson }}" type="text"
                                name="title_lesson">
                        </td>
                    </tr>
                </table>
                <input class="boutonSub" type="submit" value="Save informations">
            </form>
        </div>
    </div>
    <div id="Aim-modal" class="modal">
        <div class="modal__content">
            <span>Aim Editing</span>
            <a href="#" class="modal__close">&times;Close</a>

            <form action="{{ route('EditRapport', ['val' => 1]) }}" method="POST">
                @csrf
                <input type="number" name="Rap_id" hidden value="{{ $Rapport->id }}">
                <textarea name="aim" style="font-size: 16px" id="" cols="83" rows="20"
                    style="text-align:inherit">
                    {{ $Rapport->Aim }} 
                </textarea>

                <input class="boutonSub" type="submit" value="Save Objectifs">
            </form>
        </div>
    </div>
    <div id="Descrip-modal" class="modal">
        <div class="modal__content">
            <span>Description Editing</span>
            <a href="#" class="modal__close">&times;Close</a>
            <form action="{{ route('EditRapport', ['val' => 2]) }}" method="POST">
                @csrf
                <input type="number" name="Rap_id" hidden value="{{ $Rapport->id }}">
                <textarea name="description" style="font-size: 16px" id="" cols="83" rows="20">
                    {{ $Rapport->Description }} 
                </textarea>

                <input class="boutonSub" type="submit" value="Save Objectifs">
            </form>
        </div>
    </div>
    <div id="WeekConcl-modal" class="modal">
        <div class="modal__content">
            <span>Weeknesses conclusion Editing</span>
            <a href="#" class="modal__close">&times;Close</a>
            <form action="{{ route('EditRapport', ['val' => 3]) }}" method="POST">
                @csrf
                <input type="number" name="Rap_id" hidden value="{{ $Rapport->id }}">
                <textarea name="conclusion" style="font-size: 16px" id="" cols="83" rows="20">
                    {{ $Rapport->Str_week->Week_conlusion }}
                </textarea>

                <input class="boutonSub" type="submit" value="Save conclusion">
            </form>
        </div>
    </div>
    <div id="Streng-modal" class="modal">
        <div class="modal__content">
            <span>Strengths of the lesson Editing</span>
            <a href="#" class="modal__close">&times;Close</a>

            <form action="{{ route('EditRapport', ['val' => 6]) }}" method="POST">
                @csrf
                <input type="number" name="Rap_id" hidden value="{{ $Rapport->id }}">
                <div class="editForm">
                    <label for="str1">Strength 1:</label>
                    <textarea name="str1" id="str1" cols="98" rows="3">
                        {{ $Strenghts[0] }}
                    </textarea>
                    <label for="str2">Strength 2:</label>
                    <textarea name="str2" id="str2" cols="98" rows="3">
                        {{ $Strenghts[1] }}
                    </textarea>
                    <label for="str3">Strength 3:</label>
                    <textarea name="str3" id="str3" cols="98" rows="3">
                        {{ $Strenghts[2] }}
                    </textarea>
                    <label for="str4">Strength 4:</label>
                    <textarea name="str4" id="str4" cols="98" rows="3">
                        {{ $Strenghts[3] }}
                    </textarea>
                    <label for="str5">Strength 5:</label>
                    <textarea name="str5" id="str5" cols="98" rows="3">
                        {{ $Strenghts[4] }}
                    </textarea>
                    <label for="str6">Strength 6:</label>
                    <textarea name="str6" id="str6" cols="98" rows="3">
                        {{ $Strenghts[5] }}
                    </textarea>
                </div>
                <input class="boutonSub" type="submit" value="Save Strengths">
            </form>
        </div>
    </div>
    <div id="weak-modal" class="modal mt-5" style="overflow: scroll">
        <br><br><br>
        <div class="modal__content ">
            <span>Weaknesses of the lesson Editing</span>
            <a href="#" class="modal__close">&times;Close</a>

            <form action="{{ route('EditRapport', ['val' => 5]) }}" method="POST">
                @csrf
                <input type="number" name="Rap_id" hidden value="{{ $Rapport->id }}">
                <div class="editForm">
                    <label for="wkn1">Weakness 1:</label>
                    <textarea name="wk1" id="wkn1" cols="98" rows="3">
                        {{ $Weeks[0] }}
                    </textarea>

                    <label for="wkn2">Weakness 2:</label>
                    <textarea name="wk2" id="wkn2" cols="98" rows="3">
                        {{ $Weeks[1] }}
                    </textarea>
                    <label for="wkn3">Weakness 3:</label>
                    <textarea name="wk3" id="wkn3" cols="98" rows="3">
                        {{ $Weeks[2] }}
                    </textarea>
                    <label for="wkn4">Weakness 4:</label>
                    <textarea name="wk4" id="wkn4" cols="98" rows="3">
                        {{ $Weeks[3] }}
                    </textarea>
                    <label for="wkn5">Weakness 5:</label>
                    <textarea name="wk5" id="wkn5" cols="98" rows="3">
                        {{ $Weeks[4] }}
                    </textarea>
                    <label for="wkn6">Weakness 6:</label>
                    <textarea name="wk6" id="wkn6" cols="98" rows="3">
                        {{ $Weeks[5] }}
                    </textarea>
                </div>
                <input class="boutonSub" type="submit" value="Save Weaknesses">
            </form>
        </div>
    </div>
    <script>
        document.getElementById('imprimer').addEventListener('click', function() {
            const element = document.getElementById('corpRapport');
            element.classList.remove('document');
            window.print();
            location.reload();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('style/js/html2pdf.bundle.min.js') }}"></script>
    <script>
        // Fonction pour formater la date en MM/DD/YYYY
        function formatDate(date) {
            let day = String(date.getDate()).padStart(2, '0');
            let month = String(date.getMonth() + 1).padStart(2, '0'); // Les mois commencent à 0
            let year = date.getFullYear();
            return `${month}/${day}/${year}`;
        }

        // Initialisation d'un date picker et forçage du format
        document.getElementById('appointment').addEventListener('focus', function() {
            this.type = 'date'; // Afficher le date picker à l'utilisateur
        });

        document.getElementById('appointment').addEventListener('blur', function() {
            let dateValue = new Date(this.value); // Récupérer la valeur entrée
            if (!isNaN(dateValue)) {
                this.type = 'text'; // Revenir à l'input text après sélection
                this.value = formatDate(dateValue); // Formater la date
            }
        });
    </script>
</body>

</html>
