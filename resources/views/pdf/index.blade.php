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
             <div class="panel-heading">liste des occupation classée par ordre croissant
             </div>

                <div class="panel-body">
                  @forelse($occupations as $occupation)
                    <h4> Description: {{ $occupation->description }}</h4>
                            <p> Prix:  {{ $occupation->prix }} FCFA</p>
                             <p> nombre de jour(s):  {{ $occupation->nbre_jours }} jour(s)</p>
                            <p> code: marco000{{ $occupation->id }}0</p>
                            <p> telephone {{ $occupation->tel_ch }}</p>
                            <p> nom du client: {{ $occupation->nom_clt }}</p>
                            <p> telephne:  {{ $occupation->telephone }}</p>
                            <p> date d'entré:  {{ $occupation->date_debut }}</p>
                            <p> date de liberation:  {{ $occupation->date_fin }}</p>
                         <hr>  
               @empty

               @endforelse
            </div>
             <div class="panel-footer">
               <p>  {{$occupations->links()}} </p>
            	<a href=" {{route('pdf.show','occupations')}} " class="btn btn-block btn-primary">imprimer</a>
            </div>
            </div>
             <div class="col-md-3 panel panel-success">
             <div class="panel-heading">date</div>

                <div class="panel-body">
                    <h1 class="text-center">
   <div class='input-group date'>
<input type='text' class="form-control" value="0" data-provide="datepicker" />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span></div>
           </h1>
            </div>
             <div class="panel-footer">
            	<a href="">imprimer</a>
            </div>
            </div>

</div>


@stop