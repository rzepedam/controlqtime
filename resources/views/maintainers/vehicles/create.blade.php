@extends('layout.index')

@section('title_header') Crear Nuevo Vehículo @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.vehicles.index') }}"><i class="fa fa-bus"></i> Vehículos</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <div class="panel">

        {{ Form::open(array('route' => 'maintainers.vehicles.store', 'method' => 'POST')) }}

            <div class="panel-body">

                @include('maintainers.vehicles.partials.fields')

            </div>
            <br />
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('maintainers.vehicles.index') }}">Volver</a>
                        <button type="submit" class="btn btn-squared btn-primary btn-lg waves-effect waves-light pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}

    </div>

@stop

@section('scripts')

    {{ Html::script('me/js/changeMethods/changeTrademarkModel.js') }}
    {{ Html::script('assets/js/config.js') }}

    <script type="text/javascript">



    </script>


@stop