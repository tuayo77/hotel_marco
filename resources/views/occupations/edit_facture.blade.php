@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-3">
                @include('layouts.menu')
      </div>
      <div class="col-md-3 panel panel-warning">
            <div class="panel-heading">
                ajouter des Menus/boissons à cette occupations 
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
                            <p> <a href=" {{action('facturecontroller@show',$occupation->id)}} " class="btn btn-primary"> télécharger la facture</a> </p>

                            <form method="POST" action=" {{route('')}} " class="form-inline">
                            {{ csrf_field() }}
                            <select name="id_menu">
                            <option value="">   </option>
                            </select> <br>
                             <select name="id_boisson">
                            <option value="">   </option>
                            </select> <br>
                            <button type="submit" class="btn btn-warning btn-block"> Enregistrer</button>

                            	
                            </form>
               @empty

               @endforelse
            </div>                
                
            </div>  
</div>


@stop