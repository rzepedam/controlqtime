@extends('layout.index')

@section('title_header') Información de Planilla @stop

@section('breadcumb')
    <li><a href="javascript:void(0)"><i class="fa fa-map-pin"></i> Operaciones</a></li>
    <li><a href="{{ route('operations.route-sheets.index') }}"><i class="fa fa-map"></i> Planillas de Ruta</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <br />

                    {{-- Table show Hoja de Ruta --}}

                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center info">
                                            <td colspan="6">
                                                Planilla
                                            </td>
                                        </tr>
                                        <tr class="active">
                                            <th class="text-center col-md-1">Nº</th>
                                            <th class="text-center col-md-3">Conductor</th>
                                            <th class="text-center col-md-1">Turno</th>
                                            <th class="text-center col-md-1">Estado</th>
                                            <th class="text-center col-md-4">Observaciones</th>
                                            <th class="text-center col-md-2">Ingresada</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                {{ $route_sheet->num_sheet }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('human-resources/manpowers/' . $route_sheet->manpower->id) }}" style="color: #757575;">{{ $route_sheet->manpower->full_name }}</a>
                                            </td>
                                            <td class="text-center">
                                                {{ $route_sheet->turn }}
                                            </td>

                                            @if ($route_sheet->status == 'open')
                                                <td class="text-center">
                                                    <span class="label label-round label-success">Abierta</span>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <span class="label label-round label-danger">Cerrada</span>
                                                </td>
                                            @endif

                                            @if ($route_sheet->obs)
                                                <td class="text-center">
                                                    {{ $route_sheet->obs }}
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    -
                                                </td>
                                            @endif

                                            <td class="text-center text-capitalize">
                                                {{ Date::parse($route_sheet->created_at)->format('l j F Y H:i:s')  }}
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- ----------------------------- --}}

                    <br />
                    <br />

                    {{-- Table show Recorridos asociados a Hoja de Ruta --}}

                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <td class="text-center warning" colspan="6">
                                            Recorridos
                                        </td>
                                    </tr>
                                    @if (count($route_sheet->rounds) > 0)
                                        <tr class="active">
                                            <th class="text-center col-md-1">#</th>
                                            <th class="text-center col-md-2">Nº</th>
                                            <th class="text-center col-md-3">Vehículo</th>
                                            <th class="text-center col-md-2">Estado</th>
                                            <th class="text-center col-md-2">Salida</th>
                                            <th class="text-center col-md-2">Llegada</th>
                                        </tr>
                                    @endif
                                    </thead>
                                    <tbody>
                                    @if (count($route_sheet->rounds) > 0)
                                        <?php $i = 1; ?>
                                        @foreach($route_sheet->rounds as $round)
                                            <tr>
                                                <td class="text-center">
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

                    {{-- ----------------------------- --}}

                </div>
                <br />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('operations.route-sheets.index') }}">Volver</a>
        </div>
    </div>

@stop