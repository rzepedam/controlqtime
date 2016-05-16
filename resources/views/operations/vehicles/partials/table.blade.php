<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-1 text-center">ID</th>
                        <th class="col-md-2 text-center">Patente</th>
                        <th class="col-md-2 text-center">Tipo</th>
                        <th class="col-md-4 text-center">Modelo</th>
                        <th class="col-md-1 text-center">Estado</th>
                        <th class="text-center col-md-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicles as $vehicle)

                        <tr data-id="{{ $vehicle->id }}">
                            <td class="text-center">{{ $vehicle->id }}</td>
                            <td class="text-center">{{ $vehicle->patent }}</td>
                            <td class="text-center">{{ $vehicle->typeVehicle->name }}</td>
                            <td class="text-center">{{ $vehicle->modelVehicle->name }}</td>
                            @if ($vehicle->state == 'unavailable')
                                <td class="text-center"><a href="{{ route('operations.vehicles.attachFiles', $vehicle) }}" class="label label-round label-danger">Activar</a></td>
                            @else
                                <td></td>
                            @endif
                            <td class="text-center">
                                <a href="{{ route('operations.vehicles.show', $vehicle) }}" class="btn btn-squared btn-info waves-effect waves-light tooltip-info" data-toggle="tooltip" data-original-title="Ver"><i class="fa fa-search"></i> </a>
                                <a href="{{ route('operations.vehicles.edit', $vehicle) }}" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>
                                <a href="{{ route('operations.vehicles.attachFiles', $vehicle) }}" class="btn btn-squared btn-primary waves-effect waves-light tooltip-primary" data-toggle="tooltip" data-original-title="Adjuntar Archivos"><i class="fa fa-cloud-upload"></i></a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>