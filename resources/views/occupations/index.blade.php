@extends('layouts.app')

@section('content')
<div class="row">
	  <div class="col-md-3">
                @include('layouts.menu')
      </div>
 <div class="col-md-3 panel panel-warning">
            <div class="panel-heading">
                liste des dernieres occupations 
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
                            <p> <a href=" {{route('occupations.show',$occupation->id)}} " class="btn btn-primary"> Modifier la facure</a> </p>
                            <p> <a href=" {{action('facturecontroller@show',$occupation->id)}} " class="btn btn-primary"> télécharger la facture</a> </p>
               @empty

               @endforelse
            </div>                
                
            </div>            

              <div class="col-md-3 panel panel-info">
			<div class="panel-heading"> liste des chambres/salles de conference libre
             </div>
            <div class="panel-body">
            		@forelse($chambres as $chambre)
            			<h4> Description: {{ $chambre->description }}</h4>
            				<p> Prix:  {{ $chambre->prix }} FCFA</p>
            				<p> code: marco000{{ $chambre->id }}0</p>
            				<p> telephone {{ $chambre->tel_ch }}</p>
            				<p> statut: @if(($chambre->statut ==0))
                            libre
                            @else
                              occupé
                              @endif
                            </p>
            				<hr>
            			@empty
            			vide 
            		@endforelse
            	
            </div>
		    </div> 

<div class="col-md-3 panel panel-default">
             <div class="panel-heading">Enregistrer une occupation 
             </div>

                <div class="panel-body">

                <form class="register" role="form" method="POST" action="{{ route('occupations.store') }}">
    {{ csrf_field() }}
 <div class="row">
    <div class="col-md-12">

        <div class="form-group col-md-12">
            <label for="id_clt" class="control-label">nom du client </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i> </span>

                    <select id="id_clt" class="form-control" name="id_clt" required autofocus>
                    @forelse($clients as $client)
                    	<option value="{{ $client->id }}">{{ $client->nom_clt }} </option>
                    @empty
                    vous devez enregister des clients 
                    @endforelse
                    </select>
                    
                </div>

                @if ($errors->has('id_clt'))
                    <span class="help-block">
                    <strong>{{ $errors->first('id_clt') }}</strong>
                </span>
                @endif
            </div>
        </div>
         <div class="form-group col-md-12">
            <label for="id_ch" class="control-label"> chambre  </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-bed"></i> </span>

                    <select id="id_ch" class="form-control" name="id_ch" required autofocus>
                    @forelse($chambres as $chambre)
                    	<option value="{{$chambre->id}}"> {{$chambre->description}} - {{$chambre->prix}} </option>
                    @empty
                    <option value=""> il ya pas de chambre libre </option>
                   
                    @endforelse
                    </select>
                    
                </div>

                @if ($errors->has('id_ch'))
                    <span class="help-block">
                    <strong>{{ $errors->first('id_ch') }}</strong>
                    </span>
                @endif
            </div>
        </div>
		<div class="form-group col-md-12">
		            <label for="id_type_ch" class="control-label">Nombre de jour </label>
		            <div class="form-group">
		                <div class="input-group">
		                    <span class="input-group-addon" id="basic-addon1"><i class=""> N </i> </span>

		                    <input type="number" id="nbre" name="nbre" class="form-control" required autofocus> 
		                </div>

		                @if ($errors->has('nbre'))
		                    <span class="help-block">
		                    <strong>{{ $errors->first('nbre') }}</strong>
		                </span>
		                @endif
		            </div>
		        </div>
		        <div class="form-group col-md-12">
		            <label for="nbre_pers" class="control-label">Nombre de personne </label>
		            <div class="form-group">
		                <div class="input-group">
		                    <span class="input-group-addon" id="basic-addon1"><i class=""> N </i> </span>

		                    <input type="number" id="nbre_pers" name="nbre_pers" class="form-control" required autofocus> 
		                </div>

		                @if ($errors->has('nbre_pers'))
		                    <span class="help-block">
		                    <strong>{{ $errors->first('nbre_pers') }}</strong>
		                </span>
		                @endif
		            </div>
		        </div>
		        <div class="form-group col-md-12">
		            <label for="mode_payement" class="control-label">mode de payement </label>
		            <div class="form-group">
		                <div class="input-group">
		                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-euro"></i> </span>

		                    <select id="mode_payement" class="form-control" name="mode_payement" required autofocus>
		                   <option value="cheque"> cheque </option>
		                   <option value="espaice"> espaise </option>
		                   <option value="mobile_money"> mobile money </option>
		                    </select>
		                    
		                </div>

		                @if ($errors->has('mode_payement'))
		                    <span class="help-block">
		                    <strong>{{ $errors->first('mode_payement') }}</strong>
		                </span>
		                @endif
		            </div>
		        </div>

        
        <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
                <button type="submit" class="btn btn-primary btn-register">
                    Enregistrer
                </button>
            </div>
        </div>
       </div>
    </div>
</form>   
            
            </div>
            </div>	

           
</div>
@stop