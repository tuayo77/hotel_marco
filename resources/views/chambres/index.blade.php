@extends('layouts.app')

@section('content')
<div>
	<div class="row">
	 <div class="col-md-3">
                @include('layouts.menu')
      </div>
      <div class="col-md-3 panel panel-info">
			<div class="panel-heading"> liste des chambres/salles de conference
             </div>
            <div class="panel-body">
            	
            		@forelse($chambres as $chambre)
            			<h4> Description: {{ $chambre->description }}</h4>
            				<p> Prix:  {{ $chambre->prix }} FCFA</p>
            				<p> code: marco000{{ $chambre->id_ch }}0</p>
            				<p> telephone {{ $chambre->tel_ch }}</p>
            				<hr>
            			@empty
            			vide 
            		@endforelse
            	
            </div>
		    </div> 
		<div class="col-md-4 panel panel-default">
             <div class="panel-heading">Ajouter une chambre/salle de conference
             </div>

                <div class="panel-body">

                <form class="register" role="form" method="POST" action="{{ route('chambres.store') }}">
   
    {{ csrf_field() }}
 <div class="row">
    <div class="col-md-12">

        <div class="form-group col-md-12">
            <label for="id_type_ch" class="control-label">description </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-bed"></i> </span>

                    <select id="id_type_ch" class="form-control" name="id_type_ch" required autofocus>
                    @forelse($type_chambres as $type_chambre)
                    	<option value="{{ $type_chambre->id_type_ch }}">{{ $type_chambre->description }} - {{ $type_chambre->prix }} </option>
                    @empty
                    vous devez ajouter des categories de chambres
                    @endforelse
                    </select>
                    
                </div>

                @if ($errors->has('description'))
                    <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group col-md-12">
            <label for="tel_ch" class="control-label"> telephone chambre </label>

            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><i class=""> +237 </i> </span>  

                    <input id="tel_ch" type="numeric" class="form-control" placeholder="telephone chambre" name="tel_ch" value="{{ old('tel_ch') }}" required>
<span class="input-group-addon" id="basic-addon1"><i class=""> </i> </span>
                </div>
                @if ($errors->has('tel_ch'))
                    <span class="help-block">
                    <strong>{{ $errors->first('tel_ch') }}</strong>
                </span>
                @endif
            </div>
        </div>
         <div class="form-group col-md-12">
            <label for="description" class="control-label"> description </label>

            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-bed"> </i> </span>  

                    <input id="description" type="text" class="form-control" placeholder="description" name="description" value="{{ old('description') }}">
<span class="input-group-addon" id="basic-addon1"><i class=""> </i> </span>
                </div>
                @if ($errors->has('description'))
                    <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
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
	
	
</div>

@stop