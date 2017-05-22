@extends('layout.index')

@section('css')



@endsection

@section('title_header') Editar Modelo de Vehículo: <span class="text-primary">{{ $modelVehicle->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('model-vehicles.index') }}"><i class="fa fa-car"></i> Modelo Vehículos</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::model($modelVehicle, array('route' => array('model-vehicles.update', $modelVehicle), 'method' => 'PUT', 'id' => 'form-submit')) }}

            <div class="panel-body">

                @include('maintainers.model-vehicles.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('model-vehicles.index') }}">Volver</a>
                        <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.model-vehicles.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ mix('js/create-edit-common.js') }}"></script>
    <script src="{{ mix('js/edit-common.js') }}"></script>

@stop
