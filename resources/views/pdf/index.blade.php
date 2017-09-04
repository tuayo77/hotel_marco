@extends('layouts.app')
@section('content')
<div class="row">
	 <div class="col-md-3">
                @include('layouts.menu')
     </div>

     <div class="col-md-3 panel panel-default">
             <div class="panel-heading">Nombre de client enregistrer</div>

                <div class="panel-body">
                  @forelse($clients as $client)
                            <p> nom du client: {{ $client->nom_clt }}</p>
                            <p> telephne:  {{ $client->telephone }}</p>
                            <p> sexe: {{ $client->sexe }} </p>
                            <p> CNI {{ $client->cni }}</p>
                            <p> nationaliter {{ $client->nationalite }}</p>       
                            <hr>
                        @empty
                        vide 
                    @endforelse
            </div>
            <div class="panel-footer">
            <p>  {{$clients->links()}} </p>
            	<a href=" {{route('pdf.show','clients')}} "  class="btn btn-block btn-primary">imprimer</a>
            </div>
            </div>
             <div class="col-md-3 panel panel-info">
             <div class="panel-heading">liste des reservation classée par ordre croissant
             </div>

                <div class="panel-body">
                  @forelse($reservations as $reservation)
                    <h4> Description: {{ $reservation->description }}</h4>
                            <p> Prix:  {{ $reservation->prix }} FCFA</p>
                            <p> code: marco000{{ $reservation->id }}0</p>
                            <p> telephone {{ $reservation->tel_ch }}</p>
                            <p> nom du client: {{ $reservation->nom_clt }}</p>
                            <p> telephne:  {{ $reservation->telephone }}</p>
                            <p> date d'entré:  {{ $reservation->date_debut }}</p>
                            <p> date de liberation:  {{ $reservation->date_fin }}</p>
                         <hr>  
               @empty

               @endforelse
            </div>
             <div class="panel-footer">
               <p>  {{$reservations->links()}} </p>
            	<a href=" {{route('pdf.show','reservations')}} " class="btn btn-block btn-primary">imprimer</a>
            </div>
            </div>
            {{--  <div class="col-md-3 panel panel-success">
             <div class="panel-heading">nombre de chambre libre</div>

                <div class="panel-body">
                    <h1 class="text-center">
                  
                   </h1>
            </div>
             <div class="panel-footer">
            	<a href="">imprimer</a>
            </div>
            </div> --}}

</div>


@stop