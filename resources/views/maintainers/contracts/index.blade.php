@extends('layout.index')

@section('title_header') Listado de Utilidades de Contrato

@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Contratos</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div id="redirect-num-hours" class="counter counter-lg counter-inverse bg-indigo-500 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="icon md-check-all" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Nº de Horas</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div id="redirect-periodicity" class="counter counter-lg counter-inverse bg-green-500 vertical-align height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-repeat" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Periocidad</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div id="redirect-day-trip" class="counter counter-lg counter-inverse bg-orange-500 vertical-align height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Jornada Laboral</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div id="redirect-schedule" class="counter counter-lg counter-inverse bg-brown-500 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Horarios</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('me/js/base/maintainers/contracts/index.js') }}

@stop