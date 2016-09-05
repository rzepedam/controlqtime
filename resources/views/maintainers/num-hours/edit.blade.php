@extends('layout.index')

@section('title_header') Editar Nº Hora: <span class="text-primary">{{ $numHour->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.num-hours.index') }}"><i class="fa fa-clock-o"></i> Nº de Horas</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($numHour, array('route' => array('maintainers.num-hours.update', $numHour), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('maintainers.num-hours.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.num-hours.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.num-hours.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/edit-common.js') }}"></script>

@stop
