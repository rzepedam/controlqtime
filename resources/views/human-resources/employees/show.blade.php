@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/show-with-image-common.css') }}">

@stop

@section('title_header') Detalle Trabajador : <span class="text-primary">{{ $employee->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li><a href="{{ route('employees.index') }}"><i class="md-accounts font-size-16"></i> Trabajadores</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

<div class="nav-tabs-horizontal">
    <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
        <li class="active" role="presentation"><a data-toggle="tab" href="#tab_1" aria-controls="tab_1" role="tab"><i class="fa fa-pencil"></i> Información Personal</a></li>
        <li role="presentation"><a data-toggle="tab" href="#tab_2" aria-controls="tab_2" role="tab"><i class="fa fa-star"></i> Competencias Laborales</a></li>
        <li role="presentation"><a data-toggle="tab" href="#tab_3" aria-controls="tab_3" role="tab"><i class="fa fa-heartbeat"></i> Información de Salud</a></li>
        <li role="presentation"><a data-toggle="tab" href="#tab_4" aria-controls="tab_4" role="tab"><i class="fa fa-file-text-o"></i> Documentos Adjuntos <span class="badge badge-warning up">{{ $employee->num_total_images }}</span></a></li>
    </ul>
    <div class="tab-content padding-top-20">
        <div class="tab-pane active" id="tab_1" role="tabpanel">

            @include('human-resources.employees.partials.show.personal_information')

        </div>
        <div class="tab-pane" id="tab_2" role="tabpanel">

            @include('human-resources.employees.partials.show.laboral_skills')

        </div>
        <div class="tab-pane" id="tab_3" role="tabpanel">

            @include('human-resources.employees.partials.show.health_information')

        </div>
        <div class="tab-pane" id="tab_4" role="tabpanel">

            @include('human-resources.employees.partials.show.files_attach')

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('employees.index') }}">Volver</a>
    </div>
</div>

@stop

@section('scripts')

    <script src="{{ elixir('js/show-with-image-common.js') }}"></script>

@stop