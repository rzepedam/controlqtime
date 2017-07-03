@extends('layout.index')

@section('title_header') Gráficas @stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div id="redirect-graphics" class="counter counter-lg counter-inverse bg-indigo-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-area-chart" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Asistencia</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />

@stop

@section('scripts')
    <script src="{{ mix('js/graphics/index.js') }}"></script>
@stop