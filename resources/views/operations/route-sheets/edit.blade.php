@extends('layout.index')

@section('css')

    {{ Html::style('assets/css/sweetalert.css') }}

@stop

@section('title_header') Editar Registro @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('operations.route-sheets.index') }}"><i class="fa fa-map"></i> Planilla de Rutas</a></li>
    <li class="active">Editar</li>
@stop

@section('content')

    <div class="panel">

        {{ Form::model($route_sheet, array('route' => ['operations.route-sheets.update', $route_sheet], 'method' => 'PUT' )) }}

            <div class="panel-body">

                @include('operations.route-sheets.partials.fields')

                <br />
                <br />

            </div>

        {{ Form::close() }}

        <div class="table-responsive">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <table id="tblContentRounds" class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center warning" colspan="7">
                                Recorridos
                            </td>
                        </tr>
                        @if (count($route_sheet->rounds) > 0)
                            <tr class="active">
                                <th class="text-center col-md-1">#</th>
                                <th class="text-center col-md-2">Nº</th>
                                <th class="text-center col-md-2">Vehículo</th>
                                <th class="text-center col-md-2">Estado</th>
                                <th class="text-center col-md-2">Salida</th>
                                <th class="text-center col-md-2">Llegada</th>
                                <th class="text-center col-md-2"></th>
                            </tr>
                        @endif
                        </thead>
                        <tbody>
                        @if (count($route_sheet->rounds) > 0)
                            <?php $i = 1; ?>
                            @foreach($route_sheet->rounds as $round)
                                <tr>
                                    <td class="text-center number">
                                        {{ $i }}
                                    </td>
                                    <td class="text-center">
                                        {{ $round->route->name }}
                                    </td>
                                    <td class="text-center">
                                        {{ $round->vehicle->patent }}
                                    </td>

                                    @if ($round->status == 'open')
                                        <td class="text-center"><span class="label label-dark">En recorrido</span></td>
                                    @else
                                        <td class="text-center"><span class="label label-primary">Completado</span></td>
                                    @endif

                                    <td class="text-center">
                                        {{ Date::parse($round->created_at)->format('H:i:s') }}
                                    </td>

                                    @if ($round->updated_at != $round->created_at)
                                        <td class="text-center">
                                            {{ Date::parse($round->updated_at)->format('H:i:s') }}
                                        </td>
                                    @else
                                        <td class="text-center"> - </td>
                                    @endif

                                    <td class="text-center">
                                        {{ Form::open(['route' => ['operations.rounds.destroy', $round->id], 'method' => 'DELETE', 'id' => 'form-delete' . $round->id, 'style' => 'display: inline-block']) }}

                                            <a class="btnEliminarRound animation-example animation-hover hover animation-shake waves-effect waves-light font-size-18 vertical-align-middle" data-id="{{ $round->id }}"><i class="fa fa-trash text-danger"></i> </a>

                                        {{ Form::close() }}
                                    </td>

                                </tr>

                                <?php $i++; ?>

                            @endforeach
                        @else
                            <tr>
                                <td colspan="" style="border-bottom: hidden; background-color: #FAFAFA"></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-center font-size-18" style="background-color: #FAFAFA">
                                    No existen Recorridos Asociados
                                </td>
                            </tr>
                            <tr>
                                <td style="border-top: hidden; background-color: #FAFAFA"></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br />
        <br />
        <br />
        <br />
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('operations.route-sheets.index') }}">Volver</a><button type="submit" class="btn btn-squared btn-success btn-lg waves-effect waves-light pull-right"><i class="fa fa-refresh"></i> Actualizar</button>
                </div>
            </div>
        </div>

    </div>
    <br />
    <br />
    <br />

    @include('operations.route-sheets.partials.delete')

    <br />
    <br />

@stop

@section('scripts')

    {{ Html::script('assets/js/config.js') }}
    {{ Html::script('me/js/delete.js') }}
    {{ Html::script('assets/js/animation.js') }}
    {{ Html::script('assets/js/sweetalert.min.js') }}

    <script type="text/javascript">

        $(document).ready(function(){

            $('.btnEliminarRound').click(function(){

                var id  = $(this).data('id');
                var row = $(this).parents('tr');
                var num = $(this).parents('tr').find('.number').html();9

                swal({
                    title: "Desea eliminar el recorrido <span style='color:#F8BB86'>#" + num + "</span>",
                    text: "Recuerde que el recorrido será eliminado de la Planilla de Ruta actual",
                    type: "warning",
                    showCancelButton: true,
                    html: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    closeOnConfirm: false,
                }, function() {
                    $.ajax({
                        type: 'DELETE',
                        url: $('#form-delete' + id).attr('action'),
                        dataType: 'json',
                    }).done(function(response) {
                            if(response[0].success) {
                                swal.close();
                                row.fadeOut('800');
                            }

                    });
                });

            });

        });

    </script>

@stop
