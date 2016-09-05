@extends('layout.index')

@section('title_header') Editar Jornada Laboral: <span class="text-primary">{{ $dayTrip->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.day-trips.index') }}"><i class="fa fa-tasks"></i> Jornadas Laborales</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($dayTrip, array('route' => array('maintainers.day-trips.update', $dayTrip), 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('maintainers.day-trips.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.day-trips.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.day-trips.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/edit-common.js') }}"></script>

@stop
