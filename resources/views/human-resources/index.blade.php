@extends('layout.index')

@section('title_header') Recursos Humanos @stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div id="redirect-daily-assistances" class="counter counter-lg counter-inverse bg-teal-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Asistencia Diaria</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div id="redirect-contracts" class="counter counter-lg counter-inverse bg-indigo-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="icon md-assignment" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Contratos Laborales</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div id="redirect-employees" class="counter counter-lg counter-inverse bg-blue-grey-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="icon md-accounts" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Trabajadores</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div id="redirect-remunerations" class="counter counter-lg counter-inverse bg-orange-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Remuneraciones</span>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')

    <script src="{{ elixir('js/human-resources/index.js') }}"></script>

@stop