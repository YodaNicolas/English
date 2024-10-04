@extends('Layouts.main')
@section('contentMain')
    @if (count($Rapports) !== 0)
        <div class="row text-center justify-content-center"
            style="height: 80vh !important;height: 75vh !important; overflow:scroll">
            <div class="col-md-12 col-xl-12">

                <div class="card flat-card">
                    <div class="row mx-1"
                        style="position:sticky !important; top:1px; z-index:12; background-color:rgb(34, 146, 12);">
                        <div class="col-8 " style=" background-color:; ">
                            <span class="ft-8" style="color: white">
                                @if ($Campagne == null)
                                    Tous mes rapports
                                @else
                                    Rapports de la campagne: {{ $Campagne->nom }}
                                @endif
                            </span>
                        </div>
                        <div class="col-4">
                         <div style="display: flex; flex-direction:row; color:white">
                                Rechercher<i class="feather icon-search pt-1"></i>
                                <input id="barreRechercheRapport" style="height: 25px !important;" type="text"
                                    class="form-control p-2 border-2 shadow-2" placeholder="Nom ou établissement">
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover " style="width: 100% !important; ">

                        <thead class="table-dark" style="position:sticky; top:25px ">
                            <tr>
                                <th scope="col" style="width: 8%;">N°</th>
                                <th scope="col" style="">Enseignant</th>
                                <th scope="col" style="">Etablissement</th>
                                <th scope="col" style="width: 10%;">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Rapports as $Rapport)
                                <tr class="lEns">
                                    <th scope="row">1</th>
                                    <td style="color: black">
                                        {{ $Rapport->Enseignant->Nom . ' ' . $Rapport->Enseignant->Prénom }}</td>

                                    <td style="color: black">
                                        {{ $Rapport->Enseignant->Etab }}
                                    </td>
                                    <td>
                                        <a href="{{ route('ouvertureRapport', ['id' => $Rapport->id]) }}"
                                            style="height: 25px; display:flex; align-items:center;background-color:rgb(0, 203, 239); justify-content: center; padding:4px !important"
                                            class="btn ">Voir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if ($Capm_id == 0)
            <a style="float: right" class="btn btn-secondary mt-1" id="retour">liste des campagnes</a>
        @else
            <a href="{{ route('Bilan', ['Camp_id' => $Capm_id]) }}" style="float: left"
                class="btn btn-success mt-1">Bilan</a>
            <a href="{{ route('campListe') }}" style="float: right" class="btn btn-secondary mt-1">Retour</a>
        @endif
    @else
        @if ($Capm_id == 0)
            <h3>Aucun rapport pour l'instant</h3>
        @else
            <h3>Aucun rapport pour la campagne: {{ $Campagne->nom }}.</h3>
        @endif
        <br>
        <a style="float: right" class="btn btn-secondary" id="retour">Retour</a>
        <script>
            document.getElementById('retour').addEventListener('click', function() {
                window.history.back();
            });
        </script>
        
    @endif
    <script src="{{ asset('MesStyles/Jquery.js') }}"></script>
        <script>
            $(document).ready(function() {
                $("#barreRechercheRapport").on("input", function() {
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
        </script>
@endsection
