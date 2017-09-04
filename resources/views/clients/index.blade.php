@extends('layouts.app')

@section('content')

 <div class="row">
            <div class="col-md-3">
                @include('layouts.menu')
            </div>
            <div class="col-md-3 panel panel-info">
            <div class="panel-heading"> Liste des clients
             </div>
            <div class="panel-body">
                
                    @forelse($clients as $client)
                            <p> nom du client: {{ $client->nom_clt }}</p>
                            <p> telephne:  {{ $client->telephone }}</p>
                            <p> sexe: {{ $client->sexe }} </p>
                            <p> CNI {{ $client->cni }}</p>
                            <p> nationaliter {{ $client->nationalite }}</p>
                            <form method="POST" action="{{route('clients.destroy', $client->id_clt)}}">
                               {{ csrf_field()}}
                               {{ method_field('DELETE') }}
                               <button type="submit">X</button>
                           </form>
                               
                            <hr>
                        @empty
                        vide 
                    @endforelse
                
            </div>
            </div>
<div class="col-md-5 panel panel-default">
             <div class="panel-heading">Enregister un client</div>

                <div class="panel-body">

                <form class="register" role="form" method="POST" action="{{ route('clients.store') }}">
    <input type="hidden" value="register" name="tab" />
    {{ csrf_field() }}
 <div class="row">
    <div class="col-md-8">

        <div class="form-group col-md-12">
            <label for="nom_clt" class="control-label">Nom</label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o"></i> </span>

                    <input id="nom_clt" type="text" placeholder="nom du client" class="form-control" name="nom_clt" value="{{ old('nom_clt') }}" required autofocus>

                </div>

                @if ($errors->has('nom_clt'))
                    <span class="help-block">
                    <strong>{{ $errors->first('nom_clt') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group col-md-12">
            <label for="date_nais_clt" class="control-label">Date de naissance </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"></i> </span>

                    <input id="date_nais_clt" type="text" class="form-control" placeholder="date de naissance" name="date_nais_clt" value="{{ old('date_nais_clt') }}" required>

                </div>
                @if ($errors->has('date_nais_clt'))
                    <span class="help-block">
                    <strong>{{ $errors->first('date_nais_clt') }}</strong>
                </span>
                @endif
            </div>


        </div>

        <div class="form-group col-md-12">
            <label for="lieux" class="control-label">lieux</label>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i> </span>

                    <input id="lieux" type="text" class="form-control" placeholder="example" name="lieux" value="{{ old('lieux') }}" required>

                </div>
                @if ($errors->has('lieux'))
                    <span class="help-block">
                    <strong>{{ $errors->first('lieux') }}</strong>
                </span>
                @endif
            </div>
        </div>
         <div class="form-group col-md-12">
            <label for="sexe" class="control-label">sexe</label>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i> </span>
                    <select id="sexe"  class="form-control" name="sexe"  required>
                        <option value="masculin">masculin</option>
                        <option value="feminin">feminin</option>
                    </select>
                   

                </div>
                @if ($errors->has('sexe'))
                    <span class="help-block">
                    <strong>{{ $errors->first('sexe') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group col-md-12">
            <label for="nationalite" class="control-label"> nationalité </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="nationalite" type="text" placeholder="nationalite" class="form-control" name="nationalite" required>

                </div>
                @if ($errors->has('nationalite'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nationalite') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group  col-md-12">
            <label for="pays_resi" class="control-label"> pays_residence </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="pays_resi" type="text" placeholder="pays de residence" class="form-control" name="pays_resi" required>
                </div>
            </div>
        </div>
        <div class="form-group  col-md-12">
            <label for="telephone" class="control-label"> telephone </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="telephone" type="text" placeholder="telephone" class="form-control" name="telephone" required>
                </div>
            </div>
        </div>
        <div class="form-group  col-md-12">
            <label for="profession" class="control-label"> profession </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="profession" type="text" placeholder="profession" class="form-control" name="profession" required>
                </div>
            </div>
        </div>
         <div class="form-group  col-md-12">
            <label for="from" class="control-label"> venant de: </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="from" type="text" placeholder="venant de " class="form-control" name="from" required>
                </div>
            </div>
        </div>
        <div class="form-group  col-md-12">
            <label for="to" class="control-label"> se rendent à: </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="to" type="text" placeholder="se rendent à" class="form-control" name="to" required>
                </div>
            </div>
        </div>
        <div class="form-group  col-md-12">
            <label for="cni" class="control-label"> carte national / passport </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="cni" type="text" placeholder="carte d'identité" class="form-control" name="cni" required>
                </div>
            </div>
        </div>
        <div class="form-group  col-md-12">
            <label for="deliver" class="control-label"> date de delivrance </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="deliver" type="text" placeholder="date de delivrance" class="form-control" name="deliver" required>
                </div>
            </div>
        </div>
        <div class="form-group  col-md-12">
            <label for="transport" class="control-label"> moyen de transport</label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="transport" type="text" placeholder="moyen de transport" class="form-control" name="transport" required>
                </div>
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