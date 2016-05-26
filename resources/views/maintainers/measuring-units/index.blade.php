@extends('layout.index')

@section('title_header') Listado de Unidades de Medida

@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Unidades de Medida</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div id="redirect-weight" class="counter counter-lg counter-inverse bg-indigo-500 vertical-align height-150 margin-bottom-5 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-balance-scale" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Peso</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="redirect-engine-cubic" class="counter counter-lg counter-inverse bg-green-500 vertical-align height-150 pointer">
                <div class="vertical-align-middle">
                    <div class="counter-icon margin-bottom-5">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                    </div>
                    <span class="counter-number">Cilindraje Motor</span>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('me/js/base/maintainers/measuring-units/index.js') }}

@stop