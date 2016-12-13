<div class="row">
    <div class="col-md-12">
        <div class="panel">

            @include('operations.vehicles.partials.show.ribbon-bookmark')

            <div class="panel-body">
                <br />
                <br />
                <div class="table-responsive">
                    <div class="col-md-offset-1 col-md-10">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr class="text-center success">
                                <td class="col-md-12" colspan="2"><i class="fa fa-bus" aria-hidden="true"></i>
                                    Información Vehículo
                                </td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Tipo Vehículo</td>
                                @if ($vehicle->type_vehicle_id == 1)
                                    <td class="text-center"><i class="fa fa-car"></i> {{ $vehicle->typeVehicle->name }}</td>
                                @endif
                                @if ($vehicle->type_vehicle_id == 2)
                                    <td class="text-center"><i class="fa fa-bus"></i> {{ $vehicle->typeVehicle->name }}</td>
                                @endif
                                @if ($vehicle->type_vehicle_id == 3)
                                    <td class="text-center"><i class="fa fa-motorcycle"></i> {{ $vehicle->typeVehicle->name }}</td>
                                @endif

                            </tr>
                            <tr>
                                <td class="col-md-4">Marca</td>
                                <td class="text-center">{{ $vehicle->modelVehicle->trademark->name }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Modelo</td>
                                <td class="text-center"> {{ $vehicle->modelVehicle->name }}</td>
                            </tr>
                            @if ($vehicle->type_vehicle_id == 2)
                                <tr>
                                    <td class="col-md-4">Carrocería</td>
                                    <td class="text-center"> {{ $vehicle->detailVehicle->detailBus->carr }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td class="col-md-4">Empresa</td>
                                <td class="text-center"><i class="fa fa-building"></i> <a href="{{ route('companies.show', $vehicle->company->id) }}" style="color: #757575"> {{ $vehicle->company->firm_name }}</a></td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Estado Vehículo</td>
                                <td class="text-center">{{ $vehicle->stateVehicle->name }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Fecha Adquisición</td>
                                <td class="text-center"><i class="fa fa-calendar"></i> {{ $vehicle->acquisition_date_to_spanish_format }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Fecha Inscripción</td>
                                <td class="text-center"><i class="fa fa-calendar"></i> {{ $vehicle->inscription_date_to_spanish_format }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Año</td>
                                <td class="text-center">{{ $vehicle->year }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Color</td>
                                <td class="text-center">{{ $vehicle->detailVehicle->color }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Patente</td>
                                <td class="text-center">{{ $vehicle->patent }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Combustible</td>
                                <td class="text-center"><i class="md-gas-station font-size-16" aria-hidden="true" ></i> {{ $vehicle->detailVehicle->fuel->name }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Nº Chasis</td>
                                <td class="text-center">{{ $vehicle->detailVehicle->num_chasis }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Nº Motor</td>
                                <td class="text-center">{{ $vehicle->detailVehicle->num_motor }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Kilometraje</td>
                                <td class="text-center">{{ $vehicle->detailVehicle->km }} km</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Cilindraje Motor</td>
                                <td class="text-center">{{ $vehicle->detailVehicle->engine_cubic }} {{ $vehicle->typeVehicle->engineCubic->acr }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Peso</td>
                                <td class="text-center">{{ $vehicle->detailVehicle->weight }} {{ $vehicle->typeVehicle->weight->acr }}</td>
                            </tr>
                            @if ($vehicle->type_vehicle_id == 2)
                                <tr>
                                    <td class="col-md-4">Tag</td>
                                    <td class="text-center">{{ $vehicle->detailVehicle->tag }}</td>
                                </tr>
                            @endif
                            @if ($vehicle->type_vehicle_id == 2)
                                <tr>
                                    <td class="col-md-4">Nº de Plazas</td>
                                    <td class="text-center">{{ $vehicle->detailVehicle->detailBus->num_plazas }}</td>
                                </tr>
                            @endif
                            @if ($vehicle->obs)
                                <tr>
                                    <td class="col-md-4">Observación</td>
                                    <td class="text-center">{{ $vehicle->detailVehicle->obs }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td class="col-md-4">Ingresado</td>
                                <td class="text-center text-capitalize">
                                    {{ $vehicle->created_at_to_spanish_format . ' hrs - ' . $vehicle->user->employee->full_name }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br />
                <div class="table-responsive">
                    <div class="col-md-offset-1 col-md-10">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr class="text-center info">
                                    <td class="col-md-12" colspan="4"><i class="fa fa-folder-open" aria-hidden="true"></i>
                                        Información Documentación
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-4 text-center">
                                        <i class="fa fa-file-text" aria-hidden="true"></i> Documento
                                    </td>
                                    <td class="col-md-4 text-center">
                                        <i class="fa fa-calendar"></i> Fecha Emisión
                                    </td>
                                    <td class="col-md-4 text-center">
                                        <i class="fa fa-calendar"></i> Fecha Expiración
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-4">Padrón</td>
                                    <td class="text-center">
                                        {{ $vehicle->dateDocumentationVehicle->emission_padron }}
                                    </td>
                                    <td class="text-center">
                                        {{ $vehicle->dateDocumentationVehicle->expiration_padron }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-4">Seguro Obligatorio</td>
                                    <td class="text-center">
                                        {{ $vehicle->dateDocumentationVehicle->emission_insurance }}
                                    </td>
                                    <td class="text-center">
                                        {{ $vehicle->dateDocumentationVehicle->expiration_insurance }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-4">Permiso de Circulación</td>
                                    <td class="text-center">
                                        {{ $vehicle->dateDocumentationVehicle->emission_permission }}
                                    </td>
                                    <td class="text-center">
                                        {{ $vehicle->dateDocumentationVehicle->expiration_permission }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>