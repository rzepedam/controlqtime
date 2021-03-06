@extends('layout.index')

@section('title_header') Detalle Vehículo: <span class="text-primary">{{ $vehicle->id }}</span> @stop

@section('css')

    <link rel="stylesheet" href="{{ mix('css/show-with-image-common.css') }}">

@stop

@section('breadcumb')
    <li><a href="{{ route('operations') }}"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('vehicles.index') }}"><i class="fa fa-bus"></i> Vehículos</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

    <div class="nav-tabs-horizontal">
        <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
            <li class="active" role="data_vehicle"><a data-toggle="tab" href="#tab_1" aria-controls="tab_1" role="tab"><i class="fa fa-bus" aria-hidden="true"></i> Información Vehículo</a></li>
            <li role="files_attach"><a data-toggle="tab" href="#tab_2" aria-controls="tab_2" role="tab"><i class="fa fa-file-text-o" aria-hidden="true"></i> Documentos Adjuntos <span class="badge badge-warning up">{{ $vehicle->num_total_images }}</span></a></li>
        </ul>
        <div class="tab-content padding-top-20">
            <div class="tab-pane active" id="tab_1" role="tabpanel">

                @include('operations.vehicles.partials.show.data_vehicle')

            </div>
            <div class="tab-pane" id="tab_2" role="tabpanel">

                @include('operations.vehicles.partials.show.files_attach')

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('vehicles.index') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ mix('js/show-with-image-common.js') }}"></script>

@stop