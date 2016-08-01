@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/sweetalert.css') }}
    {{ Html::style('assets/css/bootstrap-table.css') }}

@stop

@section('title_header') Listado de Trabajadores
    <br/>
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

    @include('human-resources.employees.partials.table')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('human-resources') }}">Volver</a>
        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/sweetalert.min.js') }}
    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('assets/js/bootstrap-table.js') }}
    {{ Html::script('assets/js/bootstrap-table-mobile.js') }}
    {{ Html::script('assets/js/bootstrap-table-es-ES.js') }}
    {{ Html::script('me/js/base/human-resources/employees/config_bootstrap_table.js') }}

    <script type="text/javascript">

        $(document).ready(function () {

            /*
             * Delete Data in Session Storage
             */

            $('#modalSessionConfirmation').on("click", function (event) {

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
                    function (isConfirm) {
                        if (isConfirm) {
                            swal({
                                title: "Datos Cargados!",
                                text: "Puede continuar con el formulario.",
                                type: "success"
                            }, function () {
                                window.location.href = "{{ route('human-resources.employees.create')  }}";
                            });
                        }
                        else {

                            /*
                             * Call ajax for destroy Session data
                             */

                            $.ajax({
                                url: "{{ route('destroySessionStoreEmployee') }}",
                                type: "GET"

                            }).done(function () {
                                swal({
                                    title: "Datos eliminados satisfactoriamente",
                                    text: "Puede continuar con el ingreso de un nuevo Trabajador",
                                    type: "success"
                                }, function () {
                                    window.location.href = "{{ route('human-resources.employees.create')  }}";
                                });
                            });
                        }
                    }
                );
            });
        });

    </script>

@stop