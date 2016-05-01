<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-9">Nombre</th>
                    <th class="text-center col-md-2">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($type_institutions as $type_institution)
                    <tr data-id="{{ $type_institution->id }}">
                        <td>{{ $type_institution->id }}</td>
                        <td>{{ $type_institution->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.type-institutions.edit', $type_institution) }}" class="btn btn-squared btn-warning waves-effect waves-light tooltip-warning" data-toggle="tooltip" data-original-title="Editar"><i class="fa fa-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>