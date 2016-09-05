@extends('layout.index')

@section('title_header') Crear Nueva Unidad de Medida @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.measuring-units') }}"><i class="fa fa-sort-amount-asc"></i> Unidades de Medida</a></li>
    <li><a href="{{ route('maintainers.measuring-units.engine-cubics.index') }}"><i class="fa fa-tachometer"></i> Cilindraje Motor</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::open(array('route' => 'maintainers.measuring-units.engine-cubics.store', 'method' => 'POST', 'id' => 'form-submit')) }}

            <div class="panel-body">

                @include('maintainers.measuring-units.engine-cubics.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.measuring-units.engine-cubics.index') }}">Volver</a>
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