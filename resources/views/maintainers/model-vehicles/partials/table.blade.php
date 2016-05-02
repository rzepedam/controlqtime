<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-5">Modelo</th>
                        <th class="col-md-4">Marca</th>
                        <th class="text-center col-md-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($model_vehicles as $model_vehicle)

                        <tr data-id="{{ $model_vehicle->id }}">
                            <td>{{ $model_vehicle->id }}</td>
                            <td>{{ $model_vehicle->name }}</td>
                            <td>{{ $model_vehicle->trademark->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('maintainers.model-vehicles.edit', $model_vehicle) }}" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>