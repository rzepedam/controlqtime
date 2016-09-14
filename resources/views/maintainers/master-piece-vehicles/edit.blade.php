@extends('layout.index')

@section('title_header') Editar Pieza Maestro de Vehículos: <span class="text-primary">{{ $masterPieceVehicle->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('master-piece-vehicles.index') }}"><i class="fa fa-wrench"></i> Maestro Piezas de Vehículo</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::model($masterPieceVehicle, array('route' => array('master-piece-vehicles.update', $masterPieceVehicle), 'method' => 'PUT', 'id' => 'form-submit')) }}

            <div class="panel-body">

                @include('maintainers.master-piece-vehicles.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('master-piece-vehicles.index') }}">Volver</a>
                        <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.master-piece-vehicles.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/create-edit-common.js') }}"></script>
    <script src="{{ elixir('js/edit-common.js') }}"></script>

@stop
