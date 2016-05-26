<div class="row">
    <div class="col-md-12">
        <div class="panel">

            @include('operations.vehicles.partials.show.ribbon-bookmark')

            <div class="panel-body">
                <br />
                <br />
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                <tr>
                                    <td class="col-md-3">Empresa</td>
                                    <td class="text-center"><i class="fa fa-building"></i> <a href="{{ route('administration.companies.show', $vehicle->company->id) }}" style="color: #757575"> {{ $vehicle->company->firm_name }}</a></td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Tipo Vehículo</td>
                                    <td class="text-center"><i class="fa fa-bus"></i> {{ $vehicle->typeVehicle->name }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Marca</td>
                                    <td class="text-center">{{ $vehicle->modelVehicle->trademark->name }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Modelo</td>
                                    <td class="text-center"> {{ $vehicle->modelVehicle->name }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Estado Vehículo</td>
                                    <td class="text-center">{{ $vehicle->stateVehicle->name }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Fecha Adquisición</td>
                                    <td class="text-center"><i class="fa fa-calendar"></i> {{ $vehicle->acquisition_date }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Fecha Inscripción</td>
                                    <td class="text-center"><i class="fa fa-calendar"></i> {{ $vehicle->inscription_date }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Color</td>
                                    <td class="text-center">{{ $vehicle->color }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Año</td>
                                    <td class="text-center">{{ $vehicle->year }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Patente</td>
                                    <td class="text-center">{{ $vehicle->patent }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Combustible</td>
                                    <td class="text-center"><i class="md-gas-station font-size-16" aria-hidden="true" ></i> {{ $vehicle->fuel->name }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Nº Chasis</td>
                                    <td class="text-center">{{ $vehicle->num_chasis }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Nº Motor</td>
                                    <td class="text-center">{{ $vehicle->num_motor }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Kilometraje</td>
                                    <td class="text-center">{{ $vehicle->km }} km</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Cilindraje Motor</td>
                                    <td class="text-center">{{ $vehicle->engine_cubic }} {{ $vehicle->typeVehicle->engineCubic->acr }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Peso</td>
                                    <td class="text-center">{{ $vehicle->weight }} {{ $vehicle->typeVehicle->weight->acr }}</td>
                                </tr>
                                @if ($vehicle->obs)
                                    <tr>
                                        <td class="col-md-3">Observación</td>
                                        <td class="text-center">{{ $vehicle->obs }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="col-md-3">Ingresado</td>
                                    <td class="text-center text-capitalize">{{ Date::parse($vehicle->created_at)->format('l j F Y H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">Actualizado</td>
                                    <td class="text-center text-capitalize">{{ Date::parse($vehicle->updated_at)->format('l j F Y H:i:s') }}</td>
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