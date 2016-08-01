@extends('layout.index')

@section('title_header') Recursos Humanos @stop

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div id="redirect-employees" class="counter counter-lg counter-inverse bg-brown-400 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="icon md-accounts" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Trabajadores</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="redirect-access-control" class="counter counter-lg counter-inverse bg-teal-400 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-key" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Control de Acceso</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />

@stop

@section('scripts')

    {{ Html::script('me/js/base/human-resources/index.js') }}

@stop