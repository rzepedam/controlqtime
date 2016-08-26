@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/bootstrap-table.css') }}

@stop

@section('title_header') Listado de Estados Civiles
    <br />
    <a href="{{ route('maintainers.marital-statuses.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Estado Civil</a>
@stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Estados Civiles</li>
@stop

@section('content')

    @include('maintainers.marital-statuses.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/bootstrap-table.js') }}
    {{ Html::script('assets/js/bootstrap-table-mobile.js') }}
    {{ Html::script('assets/js/bootstrap-table-es-ES.js') }}
    <script src="{{ elixir('js/maintainers/marital-statuses/index-marital-status.js') }}"></script>

@stop