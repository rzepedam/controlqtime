@extends('layout.index')

@section('title_header') Detalle Visita @stop

@section('breadcumb')
    <li><a href="{{ route('sign-in-visits') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Registro Visitas</a></li>
    <li><a href="{{ route('visits.index') }}"><i class="fa fa-id-card-o" aria-hidden="true"></i> Visitas</a></li>
    <li class="active">Detalle</li>
@stop

@section('content')

    <div class="nav-tabs-horizontal">
        <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
            <li class="active" role="presentation"><a data-toggle="tab" href="#tab_1" aria-controls="tab_1" role="tab"><i class="fa fa-pencil"></i> Información General</a></li>
            <li role="presentation"><a data-toggle="tab" href="#tab_2" aria-controls="tab_2" role="tab"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> Documentación</a></li>
        </ul>
        <div class="tab-content padding-top-20">
            <div class="tab-pane active" id="tab_1" role="tabpanel">
                <div class="panel">
                    <div class="panel-body">

                        @include('sign-in-visits.visits.show.info_personal')

                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_2" role="tabpanel">   
                <div class="panel">
                    <div class="panel-body">
                        
                        @include('sign-in-visits.visits.show.images')
                    
                    </div>
                </div>
            </div>
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