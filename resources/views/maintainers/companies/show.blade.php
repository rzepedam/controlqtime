@extends('layout.index')

@section('title_header') Detalle Empresa <span class="text-success">#{{ $company->id }}</span> @stop

@section('breadcumb')
    <li><a href="#"><i class="fa fa-cogs"></i> Mantenedores</a></li>
    <li><a href="{{ route('maintainers.companies.index') }}"><i class="fa fa-building-o"></i> Empresas</a></li>
    <li class="active">Ver</li>
@stop

@section('content')

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><i class="fa fa-building"></i> Datos Empresa</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-gavel"></i> Representante Legal</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"><i class="fa fa-cubes"></i> Sucursales</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <br />
                <table class="table table-bordered table-striped dataTable" role="grid">
                    <tbody>
                        <tr>
                            <td><b>Razón Social</b></td>
                            <td class="text-center"><i class="fa fa-building-o"></i> {{ $company->firm_name }}</td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td class="text-center"><i class="fa fa-envelope"></i> {{ Html::mailto($company->email) }}</td>
                        </tr>
                        <tr>
                            <td><b>Teléfono 1</b></td>
                            <td class="text-center"><i class="fa fa-phone"></i> {{ $company->phone1 }}</td>
                        </tr>
                        <tr>
                            <td><b>Dirección</b></td>
                            <td class="text-center"><i class="fa fa-map-marker"></i> {{ $company->address . " " . $company->num . ". " . $company->commune->name . ", " . $company->commune->province->name . ". " . $company->commune->province->region->name }}</td>
                        </tr>
                        <tr>
                            <td class="col-md-2"><b>Rut</b></td>
                            <td class="text-center">{{ $company->rut }}</td>
                        </tr>
                        <tr>
                            <td><b>Giro</b></td>
                            <td class="text-center">{{ $company->gyre }}</td>
                        </tr>
                        <tr>
                            <td><b>Inicio Actividad</b></td>
                            <td class="text-center">{{ $company->start_act }}</td>
                        </tr>
                        @if($company->lot)
                            <tr>
                                <td><b>Lote</b></td>
                                <td class="text-center">{{ $company->lot }}</td>
                            </tr>
                        @endif
                        @if($company->floor)
                            <tr>
                                <td><b>Piso</b></td>
                                <td class="text-center">{{ $company->floor }}</td>
                            </tr>
                        @endif
                        @if($company->ofi)
                            <tr>
                                <td><b>Oficina</b></td>
                                <td class="text-center">{{ $company->ofi }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td><b>Patente Municipal</b></td>
                            <td class="text-center">{{ $company->muni_license }}</td>
                        </tr>
                        @if($company->phone2)
                            <tr>
                                <td><b>Teléfono 2</b></td>
                                <td class="text-center">{{ $company->phone2 }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <br />
            </div>

            <div class="tab-pane" id="tab_2">
                <?php $i = 1 ?>
                @foreach($company->legalRepresentatives as $legal)
                    <h3 class="text-green">Representante Legal #{{ $i }}</h3>
                    <table class="table table-bordered table-striped dataTable" role="grid">
                        <tbody>
                            <tr>
                                <td><b>Nombre</b></td>
                                <td class="text-center"> {{ $legal->full_name }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-2"><b>Rut</b></td>
                                <td class="text-center">{{ $company->rut }}</td>
                            </tr>
                            <tr>
                                <td><b>Fecha Nacimiento</b></td>
                                <td class="text-center">{{ $legal->birthday }}</td>
                            </tr>
                            <tr>
                                <td><b>Edad</b></td>
                                <td class="text-center">{{ $legal->age . " años" }}</td>
                            </tr>
                            <tr>
                                <td><b>Nacionalidad</b></td>
                                <td class="text-center">{{ $legal->nationality->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td class="text-center"><i class="fa fa-envelope"></i> {{ Html::mailto($legal->email) }}</td>
                            </tr>
                            <tr>
                                <td><b>Teléfono 1</b></td>
                                <td class="text-center"><i class="fa fa-phone"></i> {{ $legal->phone1 }}</td>
                            </tr>
                            @if($legal->phone2)
                                <tr>
                                    <td><b>Teléfono 2</b></td>
                                    <td class="text-center"> {{ $legal->phone2 }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <hr />
                    <?php $i++; ?>
                @endforeach
                <br />
            </div>

            <div class="tab-pane" id="tab_3">
                @if($company->num_subsidiary > 0)
                    <?php $i = 1 ?>
                    @foreach($company->subsidiaries as $subsidiary)
                        <h3 class="text-yellow">Sucursal #{{ $i }}</h3>
                        <table class="table table-bordered table-striped dataTable" role="grid">
                            <tbody>
                                <tr>
                                    <td><b>Dirección</b></td>
                                    <td class="text-center"><i class="fa fa-map-marker"></i> {{ $subsidiary->address . " " . $subsidiary->num . ". " . $subsidiary->commune->name . ", " . $subsidiary->commune->province->name . ". " . $subsidiary->commune->province->region->name }}</td>
                                </tr>
                                @if($subsidiary->lot)
                                    <tr>
                                        <td><b>Lote</b></td>
                                        <td class="text-center">{{ $subsidiary->lot }}</td>
                                    </tr>
                                @endif
                                @if($subsidiary->floor)
                                    <tr>
                                        <td><b>Piso</b></td>
                                        <td class="text-center">{{ $subsidiary->floor }}</td>
                                    </tr>
                                @endif
                                @if($subsidiary->ofi)
                                    <tr>
                                        <td><b>Oficina</b></td>
                                        <td class="text-center">{{ $subsidiary->ofi }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td><b>Patente Municipal</b></td>
                                    <td class="text-center">{{ $subsidiary->muni_license }}</td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td class="text-center">{{ $subsidiary->email }}</td>
                                </tr>
                                <tr>
                                    <td><b>Teléfono 1</b></td>
                                    <td class="text-center">{{ $subsidiary->phone1 }}</td>
                                </tr>
                                @if($subsidiary->phone2)
                                    <tr>
                                        <td><b>Teléfono 2</b></td>
                                        <td class="text-center">{{ $subsidiary->phone2 }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <hr />
                        <?php $i++; ?>
                    @endforeach
                @else


                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('maintainers.companies.index') }}">Volver</a>
        </div>
    </div>

@stop