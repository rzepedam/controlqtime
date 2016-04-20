@extends('layout.index')

@section('title_header') Listado de Recorridos
<br>
<a href="{{ route('maintainers.routes.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Recorrido</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Recorridos</li>
@stop

@section('form_search')
    <div class="box-tools breadcrumb2">
        {{ Form::open(['route' => 'maintainers.routes.index', 'method' => 'GET']) }}

            <div class="input-group input-group-sm" style="width: 250px;">
                {{ Form::text('table_search', null, ['class' => 'form-control pull-right', 'placeholder' => 'Buscar...', 'autofocus']) }}
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>

        {{ Form::close() }}
    </div>
@stop

@section('content')

    @if($routes->count())

        @include('maintainers.routes.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Recorridos</h3>

    @endif

    {{ $routes->links() }}

@stop

@section('scripts')

    <script>

        $(document).ready(function(){


            /**************************************************
             ************** Initialize components **************
             **************************************************/

            $('.mitooltip').tooltip();



        });

    </script>

@stop