@extends('layout.index')

@section('title_header') Registro de Visitas @stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div id="redirect-visits" class="counter counter-lg counter-inverse bg-teal-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Visitas</span>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ mix('js/sign-in-visits/index.js') }}"></script>

@stop