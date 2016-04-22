@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/sweetalert.css') }}

@stop

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

    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('assets/js/sweetalert.min.js') }}

    <script>

        $(document).ready(function(){

            var id      = 0;

            $('.mitooltip').tooltip();

            $("#btnAssignRoute").click(function(){

                id = $(this).data('id');

            });

            $('#btnSaveRoute').click(function(e){

                e.preventDefault();

                var round   = $('#route_id option:selected').text();
                var vehicle = $('#vehicle_id option:selected').text();

                $.ajax({
                    type: 'POST',
                    url: '{{ route("operations.rounds.store") }}',
                    data: $('#form-assign-route').serialize() + "&route_sheet_id=" + id,
                    dataType: 'json',
                }).done(function(response) {
                    swal({
                        title: "Operación Exitosa",
                        text: "El recorrido " + round + " y el bus con patente " + vehicle + " fueron asociados satisfactoriamente",
                        type: "success",
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Listo',
                        closeOnConfirm: true
                    }, function() {
                        window.location.href = response[0].url;
                    });
                });
            });

            $('.btnConfirmFinishedRoute').click(function(){

                id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: '/loadRouteAndVehicleSelectedInRound',
                    data: "id=" + id,
                    dataType: 'json',
                    success: function(response) {
                        swal({
                            title: "Desea finalizar el recorrido <br /><span style='color:#16a085'>" + response.route.name + "</span> asociado al bus <span style='color:#16a085'>" + response.vehicle.patent + "</span>",
                            text: "Recuerde que una vez finalizado, podrá ver el detalle en la actual Planilla de Ruta.",
                            type: "warning",
                            showCancelButton: true,
                            html: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Finalizar',
                            cancelButtonText: 'Cancelar',
                            closeOnConfirm: false,
                        }, function() {
                            $.ajax({
                                type: "PUT",
                                url: $('#form-round-update').attr('action'),
                                dataType: 'json',
                            }).done(function(response) {
                                swal({
                                    title: "Operación Exitosa",
                                    text: "El recorrido ha sido finalizado satisfactoriamente",
                                    type: "success",
                                    confirmButtonColor: '#DD6B55',
                                    confirmButtonText: 'Listo',
                                    closeOnConfirm: true
                                }, function() {
                                    window.location.href = response[0].url;
                                });
                            });
                        });
                    },

                    error: function () {
                        alert('error');
                    }
                });
            });

            $('.btnFinishedRouteSheet').click(function(){

                id = $(this).data('id');
                var numRouteSheet = $(this).parents('tr').find('.numRouteSheet').html();

                swal({
                    title: "Autorización",
                    text: "Debe ingresar su código de autorización para finalizar la Planilla de Ruta Nº <span style='color:#3F51B5'>" + numRouteSheet + "</span>",
                    type: "input",
                    inputType: "password",
                    html: true,
                    inputPlaceholder: "Introduzca su código aquí",
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                    confirmButtonText: 'Finalizar',
                    confirmButtonColor: '#3F51B5',
                    cancelButtonText: 'Cancelar',
                    closeOnConfirm: false
                }, function(typedPassword) {
                    if (typedPassword === "") {
                        swal.showInputError("Es necesario el código para continuar");
                        return false;
                    }else {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('operations.route-sheets.changeStateRoundSheet') }}',
                            data: "id=" + id + "&code=" + typedPassword,
                            dataType: 'json'
                        }).done(function(response) {
                            swal({
                                title: "Operación Exitosa",
                                text: "La Planilla de Ruta ha sido finalizada satisfactoriamente",
                                type: "success",
                                confirmButtonColor: '#3F51B5',
                                confirmButtonText: 'Listo',
                                closeOnConfirm: true
                            }, function() {
                                window.location.href = response[0].url;
                            });
                        });
                    }
                });

            });

        });

    </script>

@stop