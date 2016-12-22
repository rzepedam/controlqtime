@extends('layout.index')

@section('css')



@stop

@section('title_header') Editar Tipo Contrato: <span class="text-primary">{{ $typeContract->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('type-contracts.index') }}"><i class="fa fa-file-text"></i> Tipos de Contratos</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::model($typeContract, array('route' => array('type-contracts.update', $typeContract), 'method' => 'PUT', 'id' => 'form-submit')) }}

            <div class="panel-body">
                <span class="content_info_type_contract">

                    @include('maintainers.type-contracts.partials.fields')

                </span>
            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('type-contracts.index') }}">Volver</a>
                        <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.type-contracts.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/edit-common.js') }}"></script>
    <script src="{{ elixir('js/maintainers/type-contracts/create-edit-custom-type-contracts.js') }}"></script>

@stop
