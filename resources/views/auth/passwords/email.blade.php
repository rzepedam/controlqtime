@extends('layout.login')

@section('title') Recuperar Contraseña @stop

@section('content')
    <div class="page animsition vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content vertical-align-middle">

            {{ Form::open(array("url" => "/password/email", "method" => "POST", "autocomplete" => "off")) }}

                {!! csrf_field() !!}

                <div class="panel">
                    <div class="panel-body">
                        <div class="brand">
                            <img class="brand-img" src="{{ asset('me/img/logo.png') }}" alt="...">
                            <h2 class="brand-text font-size-18">ControlQTime</h2>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} form-material floating">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus />
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{!! $errors->first('email') !!}</strong>
                                    </span>
                                @endif
                                <label class="floating-label">E-Mail</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg margin-top-40">
                                        <i class="fa fa-btn fa-envelope"></i> Enviar E-mail
                                    </button>
                                </div>
                            </div>

                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('home') }}" ><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                            </div>
                        </div>
                    </div>
                </div>

            {{ Form::close() }}

        </div>
    </div>

@endsection
