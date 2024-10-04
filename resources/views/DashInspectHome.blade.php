@extends('Layouts.main')
@section('contentMain')
    @if (count($Enseignants) !== 0)
        <h6> Campagne: {{ $Campagne->nom }}.</h6>
        <div class="row text-center justify-content-center"
            style="height: 80vh !important;height: 75vh !important; overflow:scroll">
            <div class="col-md-12 col-xl-12">
                <div class="card flat-card">
                    <div class="row mx-1"
                        style="position:sticky !important; top:1px; z-index:12; background-color:rgb(12, 5, 51);">
                        <div class="col-8 " style=" background-color:; ">
                            <span class="ft-8" style="color: white">Enseignants</span>

                        </div>
                        <div class="col-4">
                            <div style="display: flex; flex-direction:row; color:white">
                                Recherche<i class="feather icon-search pt-1"></i>
                                <input id="barreRecherche" style="height: 25px !important;" type="text"
                                    class="form-control p-2 border-2 shadow-2" placeholder="Matricule ou nom">
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover " style="width: 100% !important; ">

                        <thead class="table-dark" style="position:sticky; top:25px ">
                            <tr>
                                <th scope="col" style="width: 8%;">N°</th>
                                <th scope="col" style="">Nom & Prenom(s)</th>
                                <th scope="col" style="">Matricule</th>
                                <th scope="col" style="width: 10%;">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Enseignants as $Enseignant)
                                <tr class="lEns">
                                    <th scope="row">1</th>
                                    <td style="color: black">{{ $Enseignant->Nom . ' ' . $Enseignant->Prénom }}</td>

                                    <td style="color: black">
                                        @if ($Enseignant->Mle)
                                            {{ $Enseignant->Mle }}
                                        @else
                                            Pas renseigné
                                        @endif
                                    </td>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#teacherInfoModal{{ $Enseignant->id }}"
                                            href=""
                                            style="height: 25px; display:flex; align-items:center;background-color:rgb(0, 203, 239); justify-content: center; padding:4px !important"
                                            class="btn ">Inspect</a>
                                    </td>
                                </tr>

                                {{-- TEACHER INFO MODAL START --}}
                                <div class="modal fade" id="teacherInfoModal{{ $Enseignant->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content" style="width: 800px !important; height:80vh !important">
                                            <div class="modal-header text-center mb-3" style="padding: 6px !important">
                                                <h6 class="modal-title fs-5" id="exampleModalLabel">Information de l'enseignant
                                                </h6>
                                                <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                    aria-label="Close" style="padding:4px; background-color:red ">X</button>
                                            </div>
                                            <div class="modal-body m-0 pt-0 pb-0">

                                                <section class="section wrapper wrapper-section">
                                                    <div class="input-group ">
                                                        <form name="countries" class="form " id="form">

                                                            <div class="input-group mb-2 col-12">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Teacher:</span>
                                                                </div>
                                                                <span
                                                                    class="form-control">{{ $Enseignant->Nom . ' ' . $Enseignant->Prénom }}
                                                                </span>

                                                            </div>
                                                            <div class="input-group mb-2 col-4">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Catégorie:</span>
                                                                </div>
                                                                <span class="form-control"> {{ $Enseignant->Categorie }}
                                                                </span>
                                                            </div>
                                                            <div class="input-group mb-2 col-8">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Town/City:</span>
                                                                </div>
                                                                <span class="form-control"> {{ $Enseignant->Commune }}
                                                                </span>
                                                            </div>
                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Registration
                                                                        number:</span>
                                                                </div>
                                                                <span class="form-control">{{ $Enseignant->Mle }} </span>
                                                            </div>
                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Highest academic
                                                                        degree:</span>
                                                                </div>
                                                                <span
                                                                    class="form-control">{{ $Enseignant->Highest_academic_degree }}
                                                                </span>
                                                            </div>
                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Pre-service
                                                                        training:</span>
                                                                </div>
                                                                <span
                                                                    class="form-control">{{ $Enseignant->Pre_service_training }}
                                                                </span>
                                                            </div>

                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading labelPading"
                                                                        id="inputGroup-sizing-default ">Professional
                                                                        qualification:</span>
                                                                </div>
                                                                <span
                                                                    class="form-control">{{ $Enseignant->Professional_qualification }}
                                                                </span>
                                                            </div>

                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Teaching
                                                                        experience:</span>
                                                                </div>
                                                                <span
                                                                    class="form-control">{{ $Enseignant->Teaching_experience }}
                                                                </span>
                                                            </div>
                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">In-service
                                                                        training:</span>
                                                                </div>
                                                                <span
                                                                    class="form-control">{{ $Enseignant->In_service_training }}
                                                                </span>
                                                            </div>

                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Number of previous
                                                                        visits:</span>
                                                                </div>
                                                                <span
                                                                    class="form-control">{{ $Enseignant->Number_previous_visits }}
                                                                </span>
                                                            </div>
                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Contact:</span>
                                                                </div>
                                                                <span class="form-control">{{ $Enseignant->Contact }}
                                                                </span>
                                                            </div>
                                                            <div class="input-group mb-2 col-12">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">School:</span>
                                                                </div>
                                                                <span class="form-control">{{ $Enseignant->Etab }} </span>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </section>

                                            </div>
                                            <div class="modal-footer"
                                                style="display: flex; justify-content:space-between; height:18px !important">
                                                <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#teachereditInfoModal{{ $Enseignant->id }}"
                                                    style="height:25px; display:flex; align-items:center; color:white; justify-content: center; background-color:rgb(3, 156, 36)"
                                                    class="btn">Mettre à jour les infos</a>
                                                <a data-bs-toggle="modal" data-bs-target="#RegionalDirModal"
                                                    href="" onclick="collectDataAndSubmit({{ $Enseignant->id }})"
                                                    style="height: 25px; display:flex; align-items:center; justify-content: center; "
                                                    class="btn btn-primary">Suivant</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- TEACHER INFO MODAL END --}}
                                {{-- TEACHER Edit INFO MODAL START --}}
                                <div class="modal fade" id="teachereditInfoModal{{ $Enseignant->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content"
                                            style="width: 800px !important; height:80vh !important">
                                            <form action="{{ route("EditEns", ['Ens_id' => $Enseignant->id]) }}" method="POST">
                                                @csrf
                                                <div class="modal-header text-center mb-3"
                                                    style="padding: 6px !important">
                                                    <h6 class="modal-title fs-5" id="exampleModalLabel">Mise à jour des informations de l'enseignant
                                                    </h6>
                                                    <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                        style="padding:4px; background-color:red ">X</button>
                                                </div>
                                                <div class="modal-body m-0 pt-0 pb-0">

                                                    <section class="section wrapper wrapper-section">
                                                        <div class="input-group ">
                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Firstname:</span>
                                                                </div>
                                                                <input type="text" name="nom"
                                                                    value="{{ $Enseignant->Nom }}" 
                                                                    class="form-control">
                                                            </div>
                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Lastname:</span>
                                                                </div>
                                                                <input type="text" name="prenom"
                                                                    value="{{ $Enseignant->Prénom }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="input-group mb-2 col-4">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Catégorie:</span>
                                                                </div>
                                                                <input type="text" name="cate"
                                                                    value="{{ $Enseignant->Categorie }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="input-group mb-2 col-8">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Town/City:</span>
                                                                </div>
                                                                <input type="text" name="commune" value="{{ $Enseignant->Commune }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Registration
                                                                        number:</span>
                                                                </div>
                                                                <input type="text" name="mtle" value="{{ $Enseignant->Mle }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Highest academic
                                                                        degree:</span>
                                                                </div>
                                                                <input type="text" name="acadeg"
                                                                    value="{{ $Enseignant->Highest_academic_degree }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Pre-service
                                                                        training:</span>
                                                                </div>
                                                                <input type="text" name="preserv"
                                                                    value="{{ $Enseignant->Pre_service_training }}"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading labelPading"
                                                                        id="inputGroup-sizing-default ">Professional
                                                                        qualification:</span>
                                                                </div>
                                                                <input type="text" name="procalif"
                                                                    value="{{ $Enseignant->Professional_qualification }}"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Teaching
                                                                        experience:</span>
                                                                </div>
                                                                <input type="text" name="experi"
                                                                    value="{{ $Enseignant->Teaching_experience }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">In-service
                                                                        training:</span>
                                                                </div>
                                                                <input type="text" name="Inserv"
                                                                    value="{{ $Enseignant->In_service_training }}"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Number of previous
                                                                        visits:</span>
                                                                </div>
                                                                <input type="text" name="numVis"
                                                                    value="{{ $Enseignant->Number_previous_visits }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="input-group mb-2 col-6">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">Contact:</span>
                                                                </div>
                                                                <input type="text" name="contact" value="{{ $Enseignant->Contact }}"
                                                                    class="form-control">
                                                                
                                                            </div>
                                                            <div class="input-group mb-2 col-12">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text labelPading"
                                                                        id="inputGroup-sizing-default">School:</span>
                                                                </div>
                                                                <input type="text" name="Etab" value="{{ $Enseignant->Etab }}"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </section>

                                                </div>
                                                <div class="modal-footer"
                                                    style="display: flex; justify-content:space-between; height:18px !important">
                                                    <a href="" type="button" data-bs-dismiss="modal"
                                                        style="height:25px; display:flex; align-items:center; color:white; justify-content: center; background-color:rgb(240, 108, 6)"
                                                        class="btn">Anuler</a>
                                                        <input type="submit" value="Valider" style=" display:flex; align-items:center; justify-content: center;"
                                                        class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- TEACHER Edit INFO MODAL END --}}
                            @endforeach
                        </tbody>
                    </table>


                    {{-- REGIONAL DIR MODAL START --}}
                    <div class="modal fade" id="RegionalDirModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content" style="width: 800px !important; height:80vh !important">
                                <div class="modal-header text-center mb-2" style="padding: 6px !important">
                                    <h6 class="modal-title fs-5" id="exampleModalLabel">REGIONAL DIRECTION
                                        SELECTION </h6>
                                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"
                                        style="padding:4px; background-color:red ">X</button>
                                </div>
                                <div class="modal-body m-0 pt-0 pb-0">
                                    <div class="card flat-card">
                                        <div class="row mx-1"
                                            style="position:sticky !important; top:1px; z-index:12; background-color:rgb(12, 5, 51);">
                                            <div class="col-8 " style=" background-color:; ">
                                                <span class="ft-8" style="color: white">REGIONAL DIRECTION SELECT
                                                </span>
                                            </div>
                                            <div class="col-4">
                                                <div style="display: flex; flex-direction:row; color:white">
                                                    Search<i class="feather icon-search pt-1"></i>
                                                    <input style="height: 25px !important;" type="text"
                                                        id="barreRecherche{{ $Enseignant->id }}"
                                                        class="form-control p-2 border-2 shadow-2"
                                                        placeholder="Name or city">
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover " style="width: 100% !important; ">
                                            <thead class="table-dark" style="position:sticky; top:25px ">
                                                <tr>
                                                    <th scope="col" style="width: 8% ;">N°</th>
                                                    <th scope="col" style="">Nom</th>
                                                    <th scope="col" style="">Provine</th>
                                                    <th scope="col" style="width: 10%;">Action</th>
                                                </tr>
                                            </thead>
                                            @if (count($Regional_dirs) !== 0)
                                                <tbody>
                                                    @foreach ($Regional_dirs as $Regional_dir)
                                                        <tr class="lReg">
                                                            <th scope="row" style="width: 8% ;">1</th>
                                                            <td style="color: black">
                                                                {{ $Regional_dir->nom }} </td>

                                                            <td style="color: black">
                                                                {{ $Regional_dir->province }}
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('RapportRed') }}" method="POST">
                                                                    @csrf
                                                                    <input type="number" name="Reg_dir_id"
                                                                        value="{{ $Regional_dir->id }}" hidden>

                                                                    <input type="number" name="Camp_id"
                                                                        value="{{ $Campagne->id }}" hidden>

                                                                    <input type="number" name="Ens_id"
                                                                        id="{{ $Regional_dir->id }}" hidden>

                                                                    <button type="submit"
                                                                        style="height: 25px; display:flex; align-items:center;background-color:rgb(0, 203, 239); justify-content: center; padding:4px !important"
                                                                        class="btn ">Selection</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            @else
                                                <h3>Pas de direction regional dans la base de données.</h3>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- REGIONAL DIR MODAL END --}}


                </div>
            </div>
        </div>
        <a style="float: right" class="btn btn-secondary" id="retour">Retour</a>
        <script src="{{ asset('MesStyles/Jquery.js') }}"></script>
        <script>
            function collectDataAndSubmit(id) {
                // Collecte des données des modales
                for (let j = 1; j <= {{ count($Regional_dirs) }}; j++) {
                    document.getElementById(j).value = id;
                }
            }
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modals = document.querySelectorAll('.modal');

                modals.forEach(function(modalElement) {
                    var modal = new bootstrap.Modal(modalElement, {
                        backdrop: 'static', // Empêcher la fermeture en cliquant à l'extérieur
                        keyboard: false // Empêcher la fermeture avec la touche ESC
                    });
                });
                // Ouvrir automatiquement le modal après le chargement de la page
                var myModal = new bootstrap.Modal(document.getElementById('{{ $modalId }}'), {
                    backdrop: 'static', // Empêcher la fermeture en cliquant à l'extérieur
                    keyboard: false // Empêcher la fermeture avec la touche ESC
                });
                myModal.show();
            });

            $(document).ready(function() {
                $("#barreRecherche").on("input", function() {
                    var valeurRecherche = $(this).val().toLowerCase();
                    $("table tbody .lEns").each(function() {
                        var texteLigne = $(this).text().toLowerCase();
                        if (texteLigne.indexOf(valeurRecherche) === -1) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        }
                    });
                });
            });

            for (let i = 0; i <= {{ count($Enseignants) }}; i++) {

                $(document).ready(function() {
                    let val = "#barreRecherche" + i
                    $(val).on("input", function() {
                        var valeurRecherche2 = $(this).val().toLowerCase();
                        $("table tbody .lReg").each(function() {
                            var texteLigne = $(this).text().toLowerCase();
                            if (texteLigne.indexOf(valeurRecherche2) === -1) {
                                $(this).hide();
                            } else {
                                $(this).show();
                            }
                        });
                    });
                });
            }
        </script>
    @else
        <h1> Aucun enseignant dans la base de données</h1>
    @endif
@endsection
