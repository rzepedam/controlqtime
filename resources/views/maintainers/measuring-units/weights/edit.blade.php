@extends('layout.index')

@section('title_header') Editar Unidad de Medida: <span class="text-primary">{{ $weight->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.measuring-units') }}"><i class="fa fa-sort-amount-asc"></i> Unidades de Medida</a></li>
    <li><a href="{{ route('weights.index') }}"><i class="fa fa-balance-scale"></i> Peso</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::model($weight, array('route' => array('weights.update', $weight), 'method' => 'PUT', 'id' => 'form-submit')) }}

            <div class="panel-body">

                @include('maintainers.measuring-units.weights.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('weights.index') }}">Volver</a>
                        <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.measuring-units.weights.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ mix('js/create-edit-common.js') }}"></script>
    <script src="{{ mix('js/edit-common.js') }}"></script>

@stop
