@extends('layouts.app')

@section('content')

 <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.menu')
            </div>
           
            <div class="col-md-3 panel panel-default">
             <div class="panel-heading">Nombre de client enregistrer</div>

                <div class="panel-body">
                <h1 class="text-center">
                  {{$clients}}
                  </h1>
            </div>
            </div>
             <div class="col-md-3 panel panel-info">
             <div class="panel-heading">nombre de chambre occupé </div>

                <div class="panel-body">
                <h1 class="text-center">
                  {{$chambres_prise}}
                </h1>
            </div>
            </div>
             <div class="col-md-3 panel panel-success">
             <div class="panel-heading">nombre de chambre libre</div>

                <div class="panel-body">
                    <h1 class="text-center">
                   {{$chambres_libre}}
                   </h1>
            </div>
            </div>
        </div>
    </div>

@endsection
