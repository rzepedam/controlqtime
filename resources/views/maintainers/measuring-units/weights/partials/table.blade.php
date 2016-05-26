<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-6">Nombre</th>
                        <th class="col-md-3 text-center">Acrónimo</th>
                        <th class="text-center col-md-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($weights as $weight)
                    <tr data-id="{{ $weight->id }}">
                        <td>{{ $weight->id }}</td>
                        <td>{{ $weight->name }}</td>
                        <td class="text-center">{{ $weight->acr }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.measuring-units.weights.edit', $weight) }}" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

