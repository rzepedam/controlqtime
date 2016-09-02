@extends('layout.index')

@section('title_header') Operaciones @stop

@section('content')

    <div class="row">
        <div class="col-md-4 waves-effect waves-light">
            <div id="redirect-route-sheets" class="counter counter-lg counter-inverse bg-deep-purple-400 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Planilla de Ruta</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 waves-effect waves-light">
            <div id="redirect-vehicles" class="counter counter-lg counter-inverse bg-indigo-400 vertical-align height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-bus" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Vehículos</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/operations/index.js') }}"></script>

@stop