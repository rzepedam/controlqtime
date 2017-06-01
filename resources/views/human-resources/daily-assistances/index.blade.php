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
        <div class="panel-body">    
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    
                    @include('human-resources.daily-assistances.partials.filters')

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9">
                    
                    @include('human-resources.daily-assistances.partials.table')

                </div>
            </div>
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

    <script type="text/javascript">
        
        $(document).ready(function() {

            $('.date').datepicker().on("change", function (e) 
            {
                var start = $("#startDate").datepicker({ dateFormat: 'dd, mm, yy' });
                console.log(start);
            });

        });

    </script>
@stop