@extends('layout.index')

@section('title_header') Detalle Visita @stop

@section('breadcumb')
    <li><a href="{{ route('sign-in-visits') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Registro Visitas</a></li>
    <li><a href="{{ route('visits.index') }}"><i class="fa fa-id-card-o" aria-hidden="true"></i> Visitas</a></li>
    <li class="active">Detalle</li>
@stop

@section('content')

    <div class="panel panel-bordered panel-info">
        <div class="panel-heading">
            &nbsp;
        </div>
        <div class="panel-body">

            @include('sign-in-visits.visits.show.info_personal')

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('visits.index') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ mix('js/sign-in-visits/visits/show.js') }}"></script>
@stop