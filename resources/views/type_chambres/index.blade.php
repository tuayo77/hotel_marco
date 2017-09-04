@extends('layouts.app')

@section('content')
<div>
	<div class="row">
	 <div class="col-md-3">
                @include('layouts.menu')
      </div>
      <div class="col-md-3 panel panel-info">
			<div class="panel-heading"> liste des types de chambres
             </div>
            <div class="panel-body">
            	
            		@forelse($type_chambres as $type_chambre)
            			<h3> Description: {{ $type_chambre->description }}</h3>
            				<p> Prix:  {{ $type_chambre->prix }} FCFA</p>
            				<p> code: marco000{{ $type_chambre->id_type_ch }}0</p>
                             <p>
                           <form method="POST" action="{{route('type_chambres.destroy', $type_chambre->id_type_ch)}}">
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
             <div class="panel-heading">Ajouter un type de chambre/salle de conference
             </div>

                <div class="panel-body">

                <form class="register" role="form" method="POST" action="{{ route('type_chambres.store') }}">
   
    {{ csrf_field() }}
 <div class="row">
    <div class="col-md-12">

        <div class="form-group col-md-12">
            <label for="description" class="control-label">description </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-bed"></i> </span>

                    <select id="description" class="form-control" name="description" required autofocus>
                    	<option value="chambre simple"> chambre simple </option>
                    	<option value="chambre vip"> chambre vip </option>

                    	<option value="salle de conference"> salle de conference </option>
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
            <label for="prix" class="control-label"> Prix </label>

            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-euro"> </i> </span>  

                    <input id="prix" type="numeric" class="form-control" placeholder="prix" name="prix" value="{{ old('prix') }}" required>
<span class="input-group-addon" id="basic-addon1"><i class=""> FCFA</i> </span>
                </div>
                @if ($errors->has('prix'))
                    <span class="help-block">
                    <strong>{{ $errors->first('prix') }}</strong>
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