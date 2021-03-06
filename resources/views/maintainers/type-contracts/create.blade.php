@extends('layout.index')

@section('title_header') Crear Nuevo Tipo de Contrato @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('type-contracts.index') }}"><i class="fa fa-file-text"></i> Tipos de Contratos</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::open(array('route' => 'type-contracts.store', 'method' => 'POST', 'id' => 'form-submit')) }}

        <div class="panel-body">
                <span class="content_info_type_contract">

                    @include('maintainers.type-contracts.partials.fields')

                </span>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('type-contracts.index') }}">Volver</a>
                    <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
            </div>
        </div>

        {{ Form::close() }}

    </div>

@stop

@section('scripts')
    <script src="{{ mix('js/create-edit-common.js') }}"></script>
    <script src="{{ mix('js/maintainers/type-contracts/create-edit.js') }}"></script>
@stop