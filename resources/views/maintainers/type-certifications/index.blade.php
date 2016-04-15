@extends('layout.index')

@section('title_header') Listado de Certificaciones
    <br>
    <a href="{{ route('maintainers.type-certifications.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Certificación</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Certificaciones</li>
@stop

@section('form_search')
    <div class="box-tools breadcrumb2">
        {{ Form::open(['route' => 'maintainers.type-certifications.index', 'method' => 'GET']) }}
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

    @if($type_certifications->count())
        @include('maintainers.type-certifications.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Certificaciones</h3>
    @endif

    {{ $type_certifications->links() }}

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