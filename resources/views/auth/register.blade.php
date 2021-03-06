@extends('auth.templates.template')

@section('content-form')
    <form class="form login" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <input id="name" type="text" placeholder="Nome" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" placeholder="Endereço de E-Mail" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <input id="password" type="password" placeholder="Senha" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
                <input id="password-confirm" type="password" placeholder="Confirmar senha" class="form-control" name="password_confirmation" required>
        </div>

        <div class="form-group">
                <button type="submit" class="btn btn-login">
                    Register
                </button>
        </div>
    </form>
@endsection
