@extends('layout.index')

@section('title_header') Operaciones @stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div id="redirect-vehicles" class="counter counter-lg counter-inverse bg-indigo-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-bus" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Vehículos</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div id="redirect-master-form-piece-vehicles" class="counter counter-lg counter-inverse bg-red-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="icon md-assignment" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Maestro Formulario Pieza Vehículos</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-xs margin-bottom-20"></div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div id="redirect-check-vehicle-forms" class="counter counter-lg counter-inverse bg-green-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Formulario Chequeo Vehículo</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />

@stop

@section('scripts')

    <script src="{{ mix('js/operations/index.js') }}"></script>

@stop