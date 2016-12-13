@extends('layout.index')

@section('title_header') Detalle Contrato: <span class="text-primary">{{ $contract->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li><a href="{{ route('contracts.index') }}"><i class="md-assignment"></i> Contratos</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

    <div class="nav-tabs-horizontal">
        <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
            <li class="active" role="presentation"><a data-toggle="tab" href="#tab_1" aria-controls="tab_1" role="tab"><i class="md-assignment"></i> Información Laboral</a></li>
            <li role="presentation"><a data-toggle="tab" href="#tab_2" aria-controls="tab_2" role="tab"><i class="md-lock-open"></i> Cláusulas y Obligaciones</a></li>
        </ul>
        <div class="tab-content padding-top-20">
            <div class="tab-pane active" id="tab_1" role="tabpanel">

                @include('human-resources.contracts.partials.show.labor_information')

            </div>
            <div class="tab-pane" id="tab_2" role="tabpanel">

                @include('human-resources.contracts.partials.show.terms_and_obligatories')

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('contracts.index') }}">Volver</a>
        </div>
    </div>

@stop