<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-4">Nombre</th>
                    <th class="col-md-5">Terminal</th>
                    <th class="col-md-2 text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($areas as $area)
                    <tr data-id="{{ $area->id }}">
                        <td>{{ $area->id }}</td>
                        <td>{{ $area->name }}</td>
                        <td>{{ $area->terminal->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.areas.edit', $area) }}" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>