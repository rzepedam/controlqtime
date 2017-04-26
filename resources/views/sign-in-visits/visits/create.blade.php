@extends('layout.index')

@section('title_header') Crear Nueva Visita @stop

@section('css')

    <link rel="stylesheet" href="{{ elixir('css/sign-in-visits/visits/create-edit-custom-visits.css') }}">

@stop

@section('breadcumb')
    <li><a href="{{ route('sign-in-visits') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Registro Visitas</a></li>
    <li><a href="{{ route('visits.index') }}"><i class="fa fa-id-card-o" aria-hidden="true"></i> Visitas</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    {{ Form::open(array('route' => 'visits.store', 'method' => 'POST', 'id' => 'form-submit')) }}

        <div class="panel">
            <div class="panel-body">

                @include('sign-in-visits.visits.partials.fields')

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('visits.index') }}">Volver</a>
                <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')

    <script src="{{ elixir('/js/create-edit-common.js') }}"></script>
    <script src="{{ elixir('/js/sign-in-visits/visits/create-edit-custom-visits.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            $('#type_visit_id').on('change', function() {
                if ( $(this).val() == 1 || $(this).val() == 5 )
                {
                    $('#span_date').html('<div class="col-xs-12 col-sm-3 col-md-3 form-group">{{Form::label("start_date", "Fecha Inicio")}}{{Form::text("start_date", null, ["class"=> "form-control"])}}</div><div class="col-xs-12 col-sm-3 col-md-3 form-group">{{Form::label("end_date", "Fecha Fin")}}{{Form::text("end_date", null, ["class"=> "form-control"])}}</div>');
                } else {
                    $('#span_date').html('<div class="col-xs-12 col-sm-3 col-md-3 form-group">{{Form::label("date", "Fecha Visita")}}{{Form::text("date", null, ["class"=> "form-control"])}}</div><div class="col-xs-12 col-sm-3 col-md-3 form-group">{{Form::label("hour", "Hora")}}{{Form::text("hour", null, ["class"=> "form-control"])}}</div>');
                }
            });

        });

    </script>


@stop