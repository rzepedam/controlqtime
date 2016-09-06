@extends('layout.index')

@section('title_header') Crear Nueva Gratificación @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('gratifications.index') }}"><i class="fa fa-diamond"></i> Gratificaciones</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    @include('layout.messages.errors-js')

    <div class="panel">

        {{ Form::open(array('route' => 'gratifications.store', 'method' => 'POST', 'id' => 'form-submit')) }}

            <div class="panel-body">

                @include('maintainers.gratifications.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('gratifications.index') }}">Volver</a>
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