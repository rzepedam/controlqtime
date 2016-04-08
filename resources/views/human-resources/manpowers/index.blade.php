@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/toastr.css') }}
    {{ Html::style('assets/css/sweet-alert.css') }}

@stop

@section('title_header') Listado de Trabajadores
    <br>
    @if (\Session::get('step1'))
        <a href="{{ route('human-resources.manpowers.create') }}" class="btn btn-primary waves-effect waves-light" id="modalSessionConfirmation"><i class="fa fa-plus"></i> Crear Nuevo Trabajador</a>
    @else
        <a href="{{ route('human-resources.manpowers.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> Crear Nuevo Trabajador</a>
    @endif
@stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-street-view"></i> RR.HH</a></li>
    <li class="active">Trabajadores</li>
@stop

@section('content')

    @if($manpowers->count())

        @include('human-resources.manpowers.partials.table')

    @else

        <h3 class="text-center">No se han encontrado Trabajadores</h3>

    @endif

    {{ $manpowers->links() }}

@stop

@section('scripts')

    {{ Html::script('assets/js/toastr.js') }}
    {{ Html::script('assets/js/sweet-alert.js') }}
    {{ Html::script('assets/js/components/toastr.js') }}

    <script>

        $(document).ready(function(){


            /**************************************************
             ************** Initialize components **************
             **************************************************/

            $('.mitooltip').tooltip();


            $('#modalSessionConfirmation').on("click", function(event) {

                event.preventDefault();

                swal({
                    title: "Continuar con registro de usuario?",
                    text: "Existen datos en sesión asociados a un trabajador que no ha sido registrado. Si confirma, estos datos se cargarán en el formulario. De lo contrario, se presentará un formulario nuevo.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Confirmar',
                    closeOnConfirm: false,
                },
                function(isConfirm) {
                    if (isConfirm) {
                        swal({
                            title: "Datos Cargados!",
                            text: "Puede continuar con el formulario.",
                            type: "success"
                        }, function() {
                            window.location.href = "{{ route('human-resources.manpowers.create')  }}";
                        });
                    }
                    else {

                        /*
                        * Call ajax for destroy Session data
                        */

                        $.ajax({
                                url: "/destroySessionData",
                                type: "GET"

                            }).done(function() {
                                swal({
                                    title: "Datos eliminados satisfactoriamente",
                                    text: "Puede continuar con el ingreso de un nuevo Trabajador",
                                    type: "success"
                                }, function() {
                                    window.location.href = "{{ route('human-resources.manpowers.create')  }}";
                                });
                        });
                    }
                });
            });

        });

    </script>

@stop