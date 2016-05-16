@extends('layout.login')

@section('title') Login @stop

@section('content')

    <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
         data-animsition-out="fade-out">>
        <div class="page-content vertical-align-middle">
            <div class="panel">
                <div class="panel-body">
                    <div class="brand">
                        <img class="brand-img" src="{{ asset('me/img/logo.png') }}" alt="...">
                        <h2 class="brand-text font-size-18">ControlQTime</h2>
                    </div>
                    {{ Form::open(array("url" => "login", "method" => "POST", "autocomplete" => "off")) }}
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} form-material floating">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" />

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{!! $errors->first('email') !!}</strong>
                                </span>
                            @endif

                            <label class="floating-label">Email</label>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-material floating">
                            <input type="password" class="form-control" name="password" />

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{!! $errors->first('password') !!}</strong>
                                    </span>
                            @endif

                            <label class="floating-label">Password</label>
                        </div>
                        <div class="form-group clearfix">
                            <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg pull-left">
                                <input type="checkbox" id="inputCheckbox" name="remember">
                                <label for="inputCheckbox">Recuérdame</label>
                            </div>
                            <a class="pull-right" href="{{ url('/password/reset') }}">Olvidó Contraseña?</a>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg margin-top-40">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
