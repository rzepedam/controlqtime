@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/sweetalert.css') }}

@stop

@section('title_header') Listado de Trabajadores
    <br />
    @if (Session::get('step1'))
        <a href="{{ route('human-resources.employees.create') }}" class="btn btn-primary waves-effect waves-light" id="modalSessionConfirmation"><i class="fa fa-plus"></i> Crear Nuevo Trabajador</a>
    @else
        <a href="{{ route('human-resources.employees.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Trabajador</a>
    @endif
@stop

@section('breadcumb')
    <li><a href="{{ route('human-resources') }}"><i class="fa fa-street-view"></i> Recursos Humanos</a></li>
    <li class="active">Trabajadores</li>
@stop

@section('content')

    @if($employees->count())

        @include('human-resources.employees.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Trabajadores</h3>

    @endif

    <div class="row">
        <div class="col-md-12">
            <a class="pull-left margin-top-30" href="{{ route('human-resources') }}">Volver</a>
            <span class="pull-right">{{ $employees->links() }}</span>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/sweetalert.min.js') }}
    {{ Html::script('assets/js/config.js') }}

    <script>

        $(document).ready(function(){

            /*
             * Delete Data in Session Storage
             */

            $('#modalSessionConfirmation').on("click", function(event) {

                event.preventDefault();

                swal({
                    title: "Continuar con registro de usuario?",
                    text: "Existen datos en sesión asociados a un trabajador que no ha sido registrado. Si confirma, estos datos se cargarán en el formulario. De lo contrario, se presentará un formulario nuevo.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    closeOnConfirm: false,
                },
                function(isConfirm) {
                    if (isConfirm) {
                        swal({
                            title: "Datos Cargados!",
                            text: "Puede continuar con el formulario.",
                            type: "success"
                        }, function() {
                            window.location.href = "{{ route('human-resources.employees.create')  }}";
                        });
                    }
                    else {

                        /*
                        * Call ajax for destroy Session data
                        */

                        $.ajax({
                                url: "{{ route('destroyEmployeeData') }}",
                                type: "GET"

                            }).done(function() {
                                swal({
                                    title: "Datos eliminados satisfactoriamente",
                                    text: "Puede continuar con el ingreso de un nuevo Trabajador",
                                    type: "success"
                                }, function() {
                                    window.location.href = "{{ route('human-resources.employees.create')  }}";
                                });
                        });
                    }
                });
            });

            /*
             * Start Daily Assistance
             */

            $('.btnStartDailyAssistance').click(function(){

                var id = $(this).data('id');

                swal({
                    title: "Confirma Iniciar la Jornada Laboral del Trabajador con ID: <span style='color:#3F51B5'>" + id + "</span>",
                    text: "Al iniciar, el Trabajador comenzará inmediatamente su jornada laboral.",
                    type: "info",
                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                    closeOnConfirm: false,
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    html: true,
                },
                function(isConfirm){
                    if(isConfirm) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('human-resources.employees.startDailyAssistance') }}',
                            data: "manpower_id=" + id,
                            dataType: 'json',
                            success: function (response) {
                                swal({
                                    title: "<span style='color:#A5DC86'>" + response[0].name + "</span> <br />inició su jornada laboral satisfactoriamente",
                                    text: "Puede continuar con el ingreso de un nuevo Trabajador",
                                    type: "success",
                                    html: true,
                                }, function(isConfirm) {
                                    window.location.href = response[0].url;
                                });
                            },
                        });
                    }
                });

            });

            /*
             * Stop Daily Assistance
             */

            $('.btnUpdateDailyAssistance').click(function(){

                var id = $(this).data('id');

                swal({
                    title: "Desea finalizar la Jornada Laboral del Trabajador con ID: <span style='color:#3F51B5'>" + id + "</span>",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    html: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Finalizar',
                    cancelButtonText: 'Cancelar',
                    closeOnConfirm: false,
                }, function(isConfirm) {
                    if(isConfirm) {
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('human-resources.employees.updateDailyAssistance') }}",
                            data: $('#form-assistance-update').serialize(),
                            dataType: 'json',
                            success: function (response) {
                                alert('...');
                                /*swal({
                                    title: "<span style='color:#A5DC86'>" + response[0].name + "</span> <br />inició su jornada laboral satisfactoriamente",
                                    text: "Puede continuar con el ingreso de un nuevo Trabajador",
                                    type: "success",
                                    html: true,
                                }, function(isConfirm) {
                                    window.location.href = response[0].url;
                                });*/
                            },
                        });
                    }
                })
            });
        });

    </script>

@stop