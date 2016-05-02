<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-5">Nombre</th>
                        <th class="col-md-4">Tipo Institución</th>
                        <th class="text-center col-md-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($institutions as $institution)
                    <tr data-id="{{ $institution->id }}">
                        <td>{{ $institution->id }}</td>
                        <td>{{ $institution->name }}</td>
                        <td>{{ $institution->typeInstitution->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.institutions.edit', $institution) }}" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>