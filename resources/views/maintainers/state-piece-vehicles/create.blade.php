@extends('layout.index')

@section('title_header') Crear Nuevo Estado Pieza Vehículo @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('state-piece-vehicles.index') }}"><i class="fa fa-circle-o-notch"></i> Estado Pieza Vehículos</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::open(array('route' => 'state-piece-vehicles.store', 'method' => 'POST', 'id' => 'form-submit')) }}

            <div class="panel-body">

                @include('maintainers.state-piece-vehicles.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('state-piece-vehicles.index') }}">Volver</a>
                        <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>

@stop

@section('scripts')

    <script src="{{ elixir('js/create-edit-common.js') }}"></script>

@stop