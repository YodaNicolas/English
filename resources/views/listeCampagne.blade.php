@extends('Layouts.main')
@section('contentMain')

    <div class="row text-center justify-content-center"
        style="height: 80vh !important;height: 75vh !important; overflow:scroll">
        <div class="col-md-12 col-xl-12">

            <div class="card flat-card">
                <div class="row mx-1"
                    style="position:sticky !important; top:1px; z-index:12; background-color:rgb(194, 7, 231);">
                    <div class="col-8 " style=" background-color:; ">
                        <span class="ft-8" style="color: white">Liste des Campagnes</span>

                    </div>
                    <div class="col-4">
                        <div style="display: flex; flex-direction:row; color:white">
                            Rechercher<i class="feather icon-search pt-1"></i>
                            <input id="barreRechercheCampgne" style="height: 25px !important;" type="text"
                                class="form-control p-2 border-2 shadow-2" placeholder="Campagne">
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-hover " style="width: 100% !important; ">

                    <thead class="table-dark" style="position:sticky; top:25px ">
                        <tr>
                            <th scope="col" style="">Nom</th>
                            <th scope="col" style="">Rapports</th>
                            <th scope="col" style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    @if (count($Campagnes) == 0)
                        <h3>Aucune Campagne pour l'instant.</h3>
                    @else
                        <tbody>
                            @foreach ($Campagnes as $Campagne)
                                <tr class="lEns">
                                    <td style="color: black">
                                        {{ $Campagne->nom }}</td>

                                    <td style="color: black">
                                        {{ count($Campagnes) }}
                                    </td>
                                    <td>
                                        <div style="display: flex; flex-direction:row; gap:5px">
                                            <a href="{{ route('ouvertureCampagne', ['id' => $Campagne->id]) }}"
                                                style="height: 25px; display:flex; align-items:center;background-color:rgb(0, 203, 239); justify-content: center; padding:4px !important"
                                                class="btn ">Ouvrir</a>
                                            <a href="{{ route('inspecthome', ['Camp_id' => $Campagne->id]) }}"
                                                style="height: 25px; display:flex; align-items:center;background-color:rgb(18, 139, 7); justify-content: center; color:white; padding:4px !important"
                                                class="btn ">Nouvelle inspection</a>
                                            <a href="" data-bs-toggle="modal"
                                                data-bs-target="#EditCampModal{{ $Campagne->id }}"
                                                style="height: 25px; display:flex; align-items:center;background-color:rgb(239, 231, 0); justify-content: center; padding:4px !important"
                                                class="btn ">Editer</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
    <a href="" style="width: 30%; float:right" data-bs-toggle="modal" data-bs-target="#NewCampModal"
        class="btn btn-info">Ajouter une campagne</a>

    {{-- CAMPAGNE MODAL START --}}
    <div class="modal fade" id="NewCampModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" style="width: 800px !important; height:30vh !important">
                <div class="modal-header text-center mb-3" style="padding: 6px !important">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Nouvelle campagne
                    </h6>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"
                        style="padding:4px; background-color:red ">X</button>
                </div>
                <div class="modal-body m-0 pt-0 pb-0">
                    <section class="section wrapper wrapper-section">
                        <form action="{{ route('ajoutCampagne') }}" method="POST">
                            @csrf
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text labelPading" id="inputGroup-sizing-default">Nom:</span>
                                </div>
                                <input class="form-control" type="text" name="nom">
                            </div>
                            <input type="submit" style="float: right" class="btn btn-success mt-2" value="Ajouter">
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    {{-- TCAMPAGNE MODAL END --}}

    @foreach ($Campagnes as $Campagne)
        {{-- EDIT CAMPAGNE MODAL START --}}
        <div class="modal fade" id="EditCampModal{{ $Campagne->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="width: 800px !important; height:30vh !important">
                    <div class="modal-header text-center mb-3" style="padding: 6px !important">
                        <h6 class="modal-title fs-5" id="exampleModalLabel">Modifier le titre de la campagne
                        </h6>
                        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"
                            style="padding:4px; background-color:red ">X</button>
                    </div>
                    <div class="modal-body m-0 pt-0 pb-0">
                        <section class="section wrapper wrapper-section">
                            <form action="{{ route('editCampagne', ['Camp_id' => $Campagne->id]) }}" method="POST">
                                @csrf
                                <div class="input-group mb-2 col-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text labelPading"
                                            id="inputGroup-sizing-default">Nom:</span>
                                    </div>
                                    <input class="form-control" value="{{ $Campagne->nom }}" type="text"
                                        name="nom">
                                </div>
                                <input type="submit" style="float: right" class="btn btn-success mt-2" value="Valider">
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        {{-- EDIT TCAMPAGNE MODAL END --}}
    @endforeach
    <script src="{{ asset('MesStyles/Jquery.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#barreRechercheCampgne").on("input", function() {
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
