@extends('layout.index')

@section('css')



@endsection

@section('title_header') Editar Estado Pieza Vehículo: <span class="text-primary">{{ $statePieceVehicle->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('state-piece-vehicles.index') }}"><i class="fa fa-circle-o-notch"></i> Estado Pieza Vehículos</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::model($statePieceVehicle, array('route' => ['state-piece-vehicles.update', $statePieceVehicle], 'method' => 'PUT', 'id' => 'form-submit')) }}

            <div class="panel-body">

                @include('maintainers.state-piece-vehicles.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('state-piece-vehicles.index') }}">Volver</a>
                        <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.state-piece-vehicles.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ mix('js/create-edit-common.js') }}"></script>
    <script src="{{ mix('js/edit-common.js') }}"></script>

@stop
