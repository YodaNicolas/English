@extends('Layouts.main')
@section('contentMain')
    <div class="row text-center justify-content-center">
        <div class="col-md-12 col-xl-12">
            <div class="card flat-card">
                <div class="row">
                    <div class="col-8 ">
                        <span class="">Teachers</span>

                    </div>
                    <div class="col-4">
                        <div style="display: flex; flex-direction:row">
                            <i class="feather icon-search pt-1"></i>
                            <input style="height: 22px !important" type="text" class="form-control border-2 shadow-2"
                                placeholder="Search with Registration number">
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
@endsection
