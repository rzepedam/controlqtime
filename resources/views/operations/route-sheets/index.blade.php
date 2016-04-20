@extends('layout.index')

@section('title_header') Listado de Planillas de Ruta
    <br />
    <a href="{{ route('operations.route-sheets.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nueva Planilla de Ruta</a>
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li class="active">Planillas de Ruta</li>
@stop

@section('form_search')
    <div class="box-tools breadcrumb2">
        {{ Form::open(['route' => 'operations.route-sheets.index', 'method' => 'GET']) }}

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

    @if($route_sheets->count())

        @include('operations.route-sheets.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Planillas de Ruta</h3>

    @endif

    {{ $route_sheets->links() }}

@stop

@section('scripts')

    <script>

        $(document).ready(function(){

            var id = 0;

            /**************************************************
             ************** Initialize components **************
             **************************************************/

            $('.mitooltip').tooltip();

            $("#btnAssignRoute").click(function(){

                id = $(this).data('id');

            });

            $('#btnSaveRoute').click(function(e){

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{ route("operations.rounds.store") }}',
                    data: $('#form-assign-route').serialize() + "&route_sheet_id=" + id,
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        /*
                         * Redirección a Home
                         */

                        window.location.href = response[0].url;
                    },

                    error: function (data) {
                        alert('error');
                    }

                });

            });


        });

    </script>

@stop