@extends('layout.index')

@section('title_header') Detalle Terminal : <span class="text-primary">{{ $terminal->id }}</span> @stop

@section('breadcumb')
    <li><a href="{{ route('maintainers') }}"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('terminals.index') }}"><i class="fa fa-road"></i> Terminales</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-3">Nombre</td>
                                            <td class="text-center">
                                                {{ $terminal->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3">Dirección</td>
                                            <td class="text-center">
                                                <i class="fa fa-map-pin"></i> {{ $terminal->address . ", " . $terminal->commune->name . ". " . $terminal->commune->province->name . ". " . $terminal->commune->province->region->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3">Ingresado</td>
                                            <td class="text-center text-capitalize">{{ Date::parse($terminal->created_at)->format('l j F Y H:i:s') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('terminals.index') }}">Volver</a>
        </div>
    </div>

@stop