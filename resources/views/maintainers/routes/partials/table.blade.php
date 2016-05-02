<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-4">Nombre</th>
                        <th class="col-md-5">Terminal</th>
                        <th class="text-center col-md-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($routes as $route)
                    <tr data-id="{{ $route->id }}">
                        <td>{{ $route->id }}</td>
                        <td>{{ $route->name }}</td>
                        <td>{{ $route->terminal->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.routes.edit', $route) }}" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>