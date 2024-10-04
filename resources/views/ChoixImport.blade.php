@extends('Layouts.main')
@section('contentMain')
    <div class="row text-center justify-content-center">
        <div class="col-md-12 col-xl-12">
            <div class="card flat-card">
                <form method="POST" action="{{ route('ImportationDonnees') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <h5 class="mt-3">Import {{ $titre }}</h5>
                        <hr>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Fichier:</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="excelFile" class="custom-file-input"
                                    id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Cliquer ici pour choisir le fichier excel des {{ $titre }}</label>
                            </div>
                            <input type="number" name="source" value="{{ $val }}" hidden>
                        </div>
                        <input type="submit" value="Charger" class="btn btn-success mb-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
