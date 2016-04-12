@extends('layout.index')

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-street-view"></i> RR.HH</a></li>
    <li><a href="{{ route('human-resources.manpowers.index') }}"><i class="fa fa-users"></i> Trabajadores</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

<div class="nav-tabs-horizontal">
    <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
        <li class="active" role="presentation"><a data-toggle="tab" href="#tab_1" aria-controls="tab_1" role="tab"><i class="fa fa-pencil"></i> Información Personal</a></li>
        <li role="presentation"><a data-toggle="tab" href="#tab_2" aria-controls="tab_2" role="tab"><i class="fa fa-star"></i> Competencias Laborales</a></li>
        <li role="presentation"><a data-toggle="tab" href="#tab_3" aria-controls="tab_3" role="tab"><i class="fa fa-heartbeat"></i> Información de Salud</a></li>
    </ul>
    <div class="tab-content padding-top-20">
        <div class="tab-pane active" id="tab_1" role="tabpanel">

            @include('human-resources.manpowers.partials.show.personal_information')

        </div>
        <div class="tab-pane" id="tab_2" role="tabpanel">

            @include('human-resources.manpowers.partials.show.laboral_skills')

        </div>
        <div class="tab-pane" id="tab_3" role="tabpanel">

            @include('human-resources.manpowers.partials.show.health_information')

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('human-resources.manpowers.index') }}">Volver</a>
    </div>
</div>



@stop