@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/toastr.css') }}

@stop

@section('title_header') Listado de Tipos de Institución
    <br>
    <a href="{{ route('maintainers.type-institutions.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Tipo de Institución</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li class="active">Tipos de Institución</li>
@stop

@section('form_search')
    <div class="box-tools breadcrumb2">
        {!! Form::open(['route' => 'maintainers.type-institutions.index', 'method' => 'GET']) !!}
        <div class="input-group input-group-sm" style="width: 250px;">
            {{ Form::text('table_search', null, ['class' => 'form-control pull-right', 'placeholder' => 'Buscar...', 'autofocus']) }}
            <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('content')

    @if($type_institutions->count())
        @include('maintainers.type-institutions.partials.table')
    @else
        <h3 class="text-center">No se han encontrado Tipos de Institución</h3>
    @endif

    {{ $type_institutions->links() }}

@stop

@section('scripts')

    {{ Html::script('assets/js/toastr.js') }}
    {{ Html::script('assets/js/components/toastr.js') }}

    <script>

        $(document).ready(function(){


            /**************************************************
             ************** Initialize components **************
             **************************************************/

            $('.mitooltip').tooltip();



        });

    </script>

@stop
