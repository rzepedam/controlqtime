@extends('layout.index')

@section('title_header') Editar Enfermedad: <span class="text-primary">{{ $type_disease->id }}</span> @stop

@section('css')

    <link rel="stylesheet" href="{{ asset('css/create-edit-common.css') }}">

@endsection

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('type-diseases.index') }}"><i class="fa fa-bed"></i> Enfermedades</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::model($type_disease, array('route' => array('type-diseases.update', $type_disease), 'method' => 'PUT', 'id' => 'form-submit')) }}

            {{ Form::hidden('entity', 'typeDisease', ['id' => 'entity'])  }}
            <div class="panel-body">

                @include('maintainers.type-diseases.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('type-diseases.index') }}">Volver</a>
                        <button id="btnSubmit" type="submit" class="btn btn-squared btn-primary waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.type-diseases.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/create-edit-common.js') }}"></script>
    <script src="{{ elixir('js/edit-common.js') }}"></script>

@stop
