@extends('layout.index')

@section('title_header') Recursos Humanos @stop

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div id="redirect-employees" class="counter counter-lg counter-inverse bg-brown-400 vertical-align waves-effect waves-block waves-light height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="icon md-accounts" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Trabajadores</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div id="redirect-access-controls" class="counter counter-lg counter-inverse bg-teal-400 vertical-align waves-effect waves-block waves-light height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-key" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Control de Acceso</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div id="redirect-contracts" class="counter counter-lg counter-inverse bg-indigo-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="icon md-assignment" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Contratos Laborales</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div id="redirect-daily-assistances" class="counter counter-lg counter-inverse bg-deep-orange-400 vertical-align waves-effect waves-block waves-light height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Asistencia Diaria</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/human-resources/index.js') }}"></script>

@stop