@extends('layout.index')

@section('title_header') Administración @stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div id="redirect-companies" class="counter counter-lg counter-inverse bg-deep-orange-400 vertical-align waves-effect waves-block waves-light height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon">
                        <i class="fa fa-building-o" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Empresas</span>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/administrations/index.js') }}"></script>

@stop