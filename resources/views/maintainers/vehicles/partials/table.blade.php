<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-2">Patente</th>
                    <th class="col-md-4">Marca</th>
                    <th class="col-md-3">Modelo</th>
                    <th class="text-center col-md-2">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($vehicles as $vehicle)

                        <tr data-id="{{ $vehicle->id }}">
                            <td>{{ $vehicle->id }}</td>
                            <td>{{ $vehicle->patent }}</td>
                            <td>{{ $vehicle->modelVehicle->trademark->name }}</td>
                            <td>{{ $vehicle->modelVehicle->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('maintainers.vehicles.show', $vehicle) }}" class="btn btn-squared btn-info waves-effect waves-light mitooltip" title="Ver"><i class="fa fa-search"></i> </a>
                                <a href="{{ route('maintainers.vehicles.edit', $vehicle) }}" class="btn btn-squared btn-success waves-effect waves-light mitooltip" title="Editar"><i class="fa fa-pencil"></i> </a>
                                <a href="javascript:void(0)" class="btn btn-squared btn-primary waves-effect waves-light mitooltip" title="Adjuntar Imágenes"><i class="fa fa-cloud-upload"></i></a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>