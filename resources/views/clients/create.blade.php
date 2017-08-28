@extends('layouts.app')

@section('content')
 <div class="row">
            <div class="col-md-3">
                @include('layouts.menu')
            </div>
<div class="col-md-6 panel panel-default">
             <div class="panel-heading">Enregister un client</div>

                <div class="panel-body">

                <form class="register" role="form" method="POST" action="{{ route('register') }}">
    <input type="hidden" value="register" name="tab" />
    {{ csrf_field() }}
 <div class="row">
    <div class="col-md-6">

        <div class="form-group col-md-12">
            <label for="name" class="control-label">Nom</label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o"></i> </span>

                    <input id="name" type="text" placeholder="nom du client" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                </div>

                @if ($errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group col-md-12">
            <label for="email" class="control-label">Address E-Mail </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"></i> </span>

                    <input id="email" type="email" class="form-control" placeholder="email@example.com" name="email" value="{{ old('email') }}" required>

                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>


        </div>

        <div class="form-group col-md-12">
            <label for="username" class="control-label">Pseudo</label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i> </span>

                    <input id="username" type="text" class="form-control" placeholder="example" name="username" value="{{ old('username') }}" required>

                </div>
                @if ($errors->has('username'))
                    <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
            </div>


        </div>

        <div class="form-group col-md-12">
            <label for="password" class="control-label">Mot de passe</label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="password" type="password" placeholder="********" class="form-control" name="password" required>

                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group  col-md-12">
            <label for="password-confirm" class="control-label">Confirmez le mot de passe</label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="password-confirm" type="password" placeholder="********" class="form-control" name="password_confirmation" required>
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