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
                @foreach($engine_cubics as $engine_cubic)
                    <tr data-id="{{ $engine_cubic->id }}">
                        <td>{{ $engine_cubic->id }}</td>
                        <td>{{ $engine_cubic->name }}</td>
                        <td class="text-center">{{ $engine_cubic->acr }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.measuring-units.engine-cubics.edit', $engine_cubic) }}" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

