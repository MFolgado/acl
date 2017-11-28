@extends('auth.templates.template')

@section('content-form')
    <form class="login form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="col-md-12 ">
                <button type="submit" class="btn btn-login">
                    Login
                </button>
                <div class="form-group text-right">
                    <a class="recuperar" href="{{ route('password.request') }}">
                        Recuperar senha?
                    </a>
                </div>
            </div>
        </div>

    </form>
    <div class="clearfix"></div>
@endsection
