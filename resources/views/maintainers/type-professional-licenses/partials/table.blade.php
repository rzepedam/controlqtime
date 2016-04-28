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
                @foreach($type_professional_licenses as $type_professional_license)
                    <tr data-id="{{ $type_professional_license->id }}">
                        <td>{{ $type_professional_license->id }}</td>
                        <td>{{ $type_professional_license->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('maintainers.type-professional-licenses.edit', $type_professional_license) }}" class="btn btn-squared btn-warning waves-effect waves-light mitooltip" title="Editar"><i class="fa fa-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>