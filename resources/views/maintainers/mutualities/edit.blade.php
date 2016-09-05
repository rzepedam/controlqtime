@extends('layout.index')

@section('title_header') Editar Mutualidad: <span class="text-primary">{{ $mutuality->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.mutualities.index') }}"><i class="fa fa-ambulance"></i> Mutualidades</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    @include('layout.messages.errors')

    <div class="panel">

        {{ Form::model($mutuality, array('route' => array('maintainers.mutualities.update', $mutuality), 'method' => 'PUT' )) }}

                <div class="panel-body">

                    @include('maintainers.mutualities.partials.fields')

                </div>
                <br />
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('maintainers.mutualities.index') }}">Volver</a>
                            <button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                        </div>
                    </div>
                </div>

        {{ Form::close() }}

    </div>
    <br />
    <br />
    <br />

    @include('maintainers.mutualities.partials.delete')
    <br />

@stop

@section('scripts')

    <script src="{{ elixir('js/edit-common.js') }}"></script>

@stop
