@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-3">
                @include('layouts.menu')
      </div>
        <div class="col-md-3 panel panel-info">
			<div class="panel-heading"> liste des boissons
             </div>
            <div class="panel-body">
            	
            		@forelse($boissons as $boisson)
            			<h3> nom: {{ $boisson->nom_boisson }}</h3>
            				<p> Prix:  {{ $boisson->prix_boisson }} FCFA</p>
            				<p> code: {{ $boisson->id }} </p>
                             <p>
                           <form method="POST" action="{{route('boissons.destroy', $boisson->id)}}">
                               {{ csrf_field()}}
                               {{ method_field('DELETE') }}
                               <button type="submit">X</button>
                           </form>
                               
                           </p>
            				<hr>
            			@empty
            			vide 
            		@endforelse
            	
            </div>
		    </div>

		    <div class="col-md-4 panel panel-default">
             <div class="panel-heading">Ajouter une nouvelle boisson
             </div>

                <div class="panel-body">

                <form class="register" role="form" method="POST" action="{{ route('boissons.store') }}">
   
    {{ csrf_field() }}
 <div class="row">
    <div class="col-md-12">

        <div class="form-group col-md-12">
            <label for="description" class="control-label"> Nom  </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-cap"></i> </span>
                    <input type="text" name="nom_boisson" value="{{ old('prix_boisson') }}" class="form-control" required autofocus> 
                </div>

                @if ($errors->has('nom_boisson'))
                    <span class="help-block">
                    <strong>{{ $errors->first('nom_boisson') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group col-md-12">
            <label for="prix_boisson" class="control-label"> Prix </label>

            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-euro"> </i> </span>  

                    <input id="prix_boisson" type="numeric" class="form-control" placeholder="prix" name="prix_boisson" value="{{ old('prix_boisson') }}" required>
<span class="input-group-addon" id="basic-addon1"><i class=""> FCFA</i> </span>
                </div>
                @if ($errors->has('prix_boisson'))
                    <span class="help-block">
                    <strong>{{ $errors->first('prix_boisson') }}</strong>
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