@extends('layout.index')

@section('title_header') Operaciones @stop

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div id="redirect-vehicles" class="counter counter-lg counter-inverse bg-indigo-400 vertical-align height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-bus" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Vehículos</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="redirect-master-form-check-vehicles" class="counter counter-lg counter-inverse bg-red-400 vertical-align height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-files-o" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Maestro Formulario Chequeo Vehículo</span>
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