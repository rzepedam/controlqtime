@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ mix('css/index-common.css') }}">
    <link rel="stylesheet" href="{{ mix('css/human-resources/daily-assistances/index-custom-daily-assistances.css') }}">

@stop

@section('title_header')
    Control Asistencia <span class="text-capitalize text-primary">{{ Date::parse(\Carbon\Carbon::now())->format('l j F') }}</span>
@stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li class="active">Asistencia Diaria</li>
@stop

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <br>
            <br>
            @include('human-resources.daily-assistances.partials.heading')

        </div>
        <br>
        <div class="panel-body">

            @include('human-resources.daily-assistances.partials.access')

            <br>
            <br>
            <br>
            <br>

            @include('human-resources.daily-assistances.partials.assistances')

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('human-resources') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ mix('js/index-common.js') }}"></script>
    <script src="{{ mix('js/human-resources/daily-assistances/index-custom-daily-assistances.js') }}"></script>

@stop