@extends('layout.index')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/create-edit-common.css') }}">

@endsection

@section('title_header') Editar Marca: <span class="text-primary">{{ $trademark->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('trademarks.index') }}"><i class="fa fa-trademark"></i> Marca Vehículos</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::model($trademark, array('route' => array('trademarks.update', $trademark), 'method' => 'PUT', 'id' => 'form-submit')) }}

            {{ Form::hidden('entity', 'trademark', ['id' => 'entity'])  }}
            <div class="panel-body">

                @include('maintainers.trademarks.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('trademarks.index') }}">Volver</a>
                        <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.trademarks.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/create-edit-common.js') }}"></script>
    <script src="{{ elixir('js/edit-common.js') }}"></script>

@stop
