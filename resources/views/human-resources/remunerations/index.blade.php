@extends('layout.index')

@section('title_header') Remuneraciones @stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li class="active">Remuneraciones</li>
@stop

@section('content')

    <div class="panel panel-bordered">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="fa fa-line-chart text-success"></i> Detalle Pago Remuneraciones
            </h3>
        </div>
        <div class="panel-body">

            <div class="row">
                {{-- Trabajador Select Field --}}
                <div class="col-xs-12 col-sm-6 col-md-4 form-group">
                    {{ Form::label('employee_id', 'Seleccione Trabajador') }}
                    {{ Form::select('employee_id', $employees, $employee->id, ['class' => 'form-control']) }}
                </div>
            </div>
            <br />
            <div class="row">
                <div class="table-responsive">
                    <div class="col-md-offset-1 col-md-10">

                        @include('human-resources.remunerations.partials.total_imponible')

                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="table-responsive">
                    <div class="col-md-offset-1 col-md-10">

                        @include('human-resources.remunerations.partials.total_haber')

                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="table-responsive">
                    <div class="col-md-offset-1 col-md-10">

                        @include('human-resources.remunerations.partials.base_tributable')

                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="table-responsive">
                    <div class="col-md-offset-1 col-md-10">

                        @include('human-resources.remunerations.partials.sueldo_liquido')

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-6">
            <a href="{{ route('contracts.index') }}">Volver</a>
        </div>
    </div>

@endsection